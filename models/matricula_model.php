<?php

class MatriculaModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Cria uma matrícula a partir de inscrição e turma
     */
    public function criarMatricula($idInscricao, $idTurma) {
        $numeroMatricula = $this->gerarNumeroMatricula();
        $dataMatricula = date('Y-m-d H:i:s');

        $sql = "INSERT INTO tb_matricula (
                    id_turma, id_inscricao, numero_matricula, data_matricula, status
                ) VALUES (
                    :id_turma, :id_inscricao, :numero_matricula, :data_matricula, 'ativa'
                )";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id_turma' => $idTurma,
            'id_inscricao' => $idInscricao,
            'numero_matricula' => $numeroMatricula,
            'data_matricula' => $dataMatricula
        ]);
    }

    /**
     * Gera um número de matrícula único (formato livre: ex. MAT-20250602-001)
     */
    private function gerarNumeroMatricula() {
        $data = date('Ymd');
        $random = mt_rand(100, 999);  // Pode ser trocado por sequência futura
        return "MAT-$data-$random";
    }

    /**
     * Cancela uma matrícula
     */
    public function cancelarMatricula($idMatricula, $motivo) {
        $sql = "UPDATE tb_matricula 
                SET status = 'cancelada', 
                    data_cancelamento = NOW(), 
                    motivo_cancelamento = :motivo 
                WHERE id_matricula = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $idMatricula,
            'motivo' => $motivo
        ]);
    }

    /**
     * Verifica se uma inscrição já está matriculada
     */
    public function jaMatriculado($idInscricao) {
        $sql = "SELECT COUNT(*) as total FROM tb_matricula 
                WHERE id_inscricao = :id AND status = 'ativa'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $idInscricao]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] > 0;
    }

    /**
     * Retorna dados da matrícula por inscrição
     */
    public function buscarPorInscricao($idInscricao) {
        $sql = "SELECT * FROM tb_matricula WHERE id_inscricao = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $idInscricao]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        /**
     * Lista todos os alunos com matrícula ativa e dados de inscrição, curso e turma
     */
    public function buscarAlunosMatriculados() {
        $sql = "
            SELECT 
                m.id_matricula,
                m.numero_matricula,
                m.data_matricula,
                m.status,
                i.nome,
                i.cpf,
                i.email,
                t.codigo_turma,
                c.nome AS curso
            FROM tb_matricula m
            INNER JOIN tb_inscricao i ON m.id_inscricao = i.id_inscricao
            INNER JOIN tb_turma t ON m.id_turma = t.id_turma
            INNER JOIN tb_curso c ON t.id_curso = c.id_curso
            WHERE m.status IN ('ativa', 'cancelada')
            ORDER BY m.data_matricula DESC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Em MatriculaModel.php
    public function buscarAlunosComFiltro($filtros = []) {
        $sql = "
            SELECT 
                m.id_matricula,
                m.numero_matricula,
                m.data_matricula,
                m.status,
                i.nome,
                i.cpf,
                i.email,
                t.codigo_turma,
                c.nome AS curso
            FROM tb_matricula m
            INNER JOIN tb_inscricao i ON m.id_inscricao = i.id_inscricao
            INNER JOIN tb_turma t ON m.id_turma = t.id_turma
            INNER JOIN tb_curso c ON t.id_curso = c.id_curso
            WHERE 1 = 1
        ";

        $params = [];

        if (!empty($filtros['nome'])) {
            $sql .= " AND i.nome LIKE :nome";
            $params[':nome'] = '%' . $filtros['nome'] . '%';
        }

        if (!empty($filtros['curso'])) {
            $sql .= " AND c.id_curso = :curso";
            $params[':curso'] = $filtros['curso'];
        }

        if (!empty($filtros['status'])) {
            $sql .= " AND m.status = :status";
            $params[':status'] = $filtros['status'];
        }

        $sql .= " ORDER BY m.data_matricula DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}
