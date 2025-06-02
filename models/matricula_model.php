<?php
require_once __DIR__ . '/../database/conexao-banco.php';

class InscricaoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Salva uma nova inscrição no banco de dados
     * @param array $dados Dados do formulário (incluindo o caminho da foto)
     * @return int|false ID da inscrição ou false em caso de erro
     */
    public function salvarInscricao(array $dados) {
        // Validação dos campos obrigatórios incluindo a foto
        $camposObrigatorios = [
            'nome', 'data_nascimento', 'cpf', 'email', 
            'telefone', 'nivel_ensino', 'foto'
        ];
        
        foreach ($camposObrigatorios as $campo) {
            if (empty($dados[$campo])) {
                throw new InvalidArgumentException("O campo {$campo} é obrigatório");
            }
        }

        // Mapeamento dos campos do formulário para o banco de dados
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
            'foto' => $dados['foto'], // Adicione isso se ainda não estiver
            'data_inscricao' => date('Y-m-d H:i:s'),
            'status' => 'pendente'
        ];

        // Campos opcionais do responsável (para menores de idade)
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
            
            // Verifica se CPF já existe
            if ($this->cpfExistente($dadosBanco['cpf'])) {
                throw new RuntimeException("CPF já cadastrado");
            }

            // Filtra apenas as colunas que existem na tabela
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
            throw $e; // Re-lança a exceção para ser tratada no controller
        }
    }

    /**
     * Obtém as colunas da tabela tb_inscricao
     */
    private function getColunasTabela() {
        $stmt = $this->pdo->query("DESCRIBE tb_inscricao");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Valida se um CPF já está cadastrado
     */
    public function cpfExistente($cpf) {
        $sql = "SELECT COUNT(*) FROM tb_inscricao WHERE cpf = :cpf";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['cpf' => $cpf]);
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Formata data para o padrão do banco (YYYY-MM-DD)
     */
    private function formatarData($data) {
        return date('Y-m-d', strtotime(str_replace('/', '-', $data)));
    }

    /**
     * Busca inscrição por ID
     */
    public function buscarPorId($id) {
        $sql = "SELECT * FROM tb_inscricao WHERE id_inscricao = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Atualiza o status de uma inscrição
     */
    public function atualizarStatus($id, $status) {
        $sql = "UPDATE tb_inscricao SET status = :status WHERE id_inscricao = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id, 'status' => $status]);
    }
}