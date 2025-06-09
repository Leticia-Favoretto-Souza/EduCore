<?php

class ProfessorModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function salvar($dados) {
        $sql = "INSERT INTO tb_professor (
                    nome, cpf, rg, email, telefone, especializacao,
                    formacao, data_contratacao, status
                ) VALUES (
                    :nome, :cpf, :rg, :email, :telefone, :especializacao,
                    :formacao, :data_contratacao, :status
                )";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nome' => $dados['nome'],
            'cpf' => $dados['cpf'],
            'rg' => $dados['rg'],
            'email' => $dados['email'],
            'telefone' => $dados['telefone'],
            'especializacao' => $dados['especializacao'],
            'formacao' => $dados['formacao'],
            'data_contratacao' => $dados['data_contratacao'],
            'status' => $dados['status']
        ]);
    }

    // Listar todos os professores com filtros opcionais
    public function listarTodosComFiltro(array $filtros = []): array {
        $sql = "SELECT * FROM tb_professor WHERE 1=1";
        $params = [];

        if (!empty($filtros['nome'])) {
            $sql .= " AND nome LIKE :nome";
            $params[':nome'] = '%' . $filtros['nome'] . '%';
        }

        if (!empty($filtros['status'])) {
            $sql .= " AND status = :status";
            $params[':status'] = $filtros['status'];
        }

        $sql .= " ORDER BY nome ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar($dados) {
        $sql = "UPDATE tb_professor SET
                    nome = :nome,
                    cpf = :cpf,
                    rg = :rg,
                    email = :email,
                    telefone = :telefone,
                    especializacao = :especializacao,
                    formacao = :formacao,
                    data_contratacao = :data_contratacao,
                    status = :status
                WHERE id_professor = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nome' => $dados['nome'],
            'cpf' => $dados['cpf'],
            'rg' => $dados['rg'],
            'email' => $dados['email'],
            'telefone' => $dados['telefone'],
            'especializacao' => $dados['especializacao'],
            'formacao' => $dados['formacao'],
            'data_contratacao' => $dados['data_contratacao'],
            'status' => $dados['status'],
            'id' => $dados['id']
        ]);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tb_professor WHERE id_professor = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function contarProfessoresAtivos() {
        $sql = "SELECT COUNT(*) AS professores_ativos FROM tb_professor WHERE status = 'ativo'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['professores_ativos'] ?? 0;
    }


}
