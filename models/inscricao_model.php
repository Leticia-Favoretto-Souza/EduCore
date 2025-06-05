<?php
require_once __DIR__ . '/../database/conexao-banco.php';

class InscricaoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function salvarInscricao(array $dados) {
        $camposObrigatorios = [
            'nome', 'data_nascimento', 'cpf', 'email', 
            'telefone', 'nivel_ensino', 'foto'
        ];

        foreach ($camposObrigatorios as $campo) {
            if (empty($dados[$campo])) {
                throw new InvalidArgumentException("O campo {$campo} é obrigatório");
            }
        }

        $dadosBanco = [
            'nome' => $dados['nome'],
            'data_nascimento' => $this->formatarData($dados['data_nascimento']),
            'cpf' => preg_replace('/[^0-9]/', '', $dados['cpf']),
            'rg' => $dados['rg'] ?? null,
            'email' => $dados['email'],
            'telefone' => preg_replace('/[^0-9]/', '', $dados['telefone']),
            'cep' => preg_replace('/[^0-9]/', '', $dados['cep'] ?? ''),
            'logradouro' => $dados['logradouro'] ?? null,
            'numero' => $dados['numero'] ?? null,
            'cidade' => $dados['cidade'] ?? null,
            'bairro' => $dados['bairro'] ?? null,
            'estado' => $dados['estado'] ?? null,
            'complemento' => $dados['complemento'] ?? null,
            'nivel_ensino' => $dados['nivel_ensino'],
            'ano_escolar' => $dados['ano_escolar'] ?? null,
            'curso_desejado' => $dados['curso_desejado'] ?? null,
            'foto' => $dados['foto'],
            'data_inscricao' => date('Y-m-d H:i:s'),
            'status' => 'pendente'
        ];

        if (!empty($dados['nome_responsavel'])) {
            $dadosBanco['nome_responsavel'] = $dados['nome_responsavel'];
            $dadosBanco['cpf_responsavel'] = preg_replace('/[^0-9]/', '', $dados['cpf_responsavel'] ?? '');
            $dadosBanco['rg_responsavel'] = $dados['rg_responsavel'] ?? null;
            $dadosBanco['parentesco'] = $dados['parentesco'] ?? null;
            $dadosBanco['telefone_responsavel'] = preg_replace('/[^0-9]/', '', $dados['telefone_responsavel'] ?? '');
            $dadosBanco['email_responsavel'] = $dados['email_responsavel'] ?? null;
        }

        try {
            $this->pdo->beginTransaction();

            if ($this->cpfExistente($dadosBanco['cpf'])) {
                throw new RuntimeException("CPF já cadastrado");
            }

            $colunasTabela = $this->getColunasTabela();
            $dadosBanco = array_intersect_key($dadosBanco, array_flip($colunasTabela));

            $campos = implode(', ', array_keys($dadosBanco));
            $placeholders = ':' . implode(', :', array_keys($dadosBanco));

            $sql = "INSERT INTO tb_inscricao ($campos) VALUES ($placeholders)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($dadosBanco);

            $id = $this->pdo->lastInsertId();
            $this->pdo->commit();

            return $id;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            error_log("Erro ao salvar inscrição: " . $e->getMessage());
            throw $e;
        }
    }

    private function getColunasTabela() {
        $stmt = $this->pdo->query("DESCRIBE tb_inscricao");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function cpfExistente($cpf) {
        $sql = "SELECT COUNT(*) FROM tb_inscricao WHERE cpf = :cpf";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['cpf' => $cpf]);
        return $stmt->fetchColumn() > 0;
    }

    private function formatarData($data) {
        return date('Y-m-d', strtotime(str_replace('/', '-', $data)));
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tb_inscricao WHERE id_inscricao = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarTodas() {
        $sql = "SELECT id_inscricao, nome, curso_desejado, data_inscricao, status 
                FROM tb_inscricao 
                WHERE status = 'pendente' 
                ORDER BY data_inscricao ASC 
                LIMIT 5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarStatus($idInscricao, $status) {
        $sql = "UPDATE tb_inscricao SET status = :status WHERE id_inscricao = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'status' => $status,
            'id' => $idInscricao
        ]);
    }

    public function atualizarInscricao($id, $dados) {
        $sql = "UPDATE tb_inscricao SET
                    nome = :nome,
                    data_nascimento = :data_nascimento,
                    cpf = :cpf,
                    rg = :rg,
                    email = :email,
                    telefone = :telefone,
                    curso_desejado = :curso_desejado,
                    nivel_ensino = :nivel_ensino,
                    cep = :cep,
                    logradouro = :logradouro,
                    numero = :numero,
                    bairro = :bairro,
                    cidade = :cidade,
                    estado = :estado,
                    complemento = :complemento,
                    nome_responsavel = :nome_responsavel,
                    cpf_responsavel = :cpf_responsavel,
                    rg_responsavel = :rg_responsavel,
                    parentesco = :parentesco,
                    telefone_responsavel = :telefone_responsavel,
                    email_responsavel = :email_responsavel
                WHERE id_inscricao = :id";

        $stmt = $this->pdo->prepare($sql);  // Aqui estava o erro
        $dados['id'] = $id;
        $stmt->execute($dados);
    }



}