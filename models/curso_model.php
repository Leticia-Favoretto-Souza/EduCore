<?php

class CursoModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarCursos() {
        $sql = "SELECT * FROM tb_curso ORDER BY nome ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tb_curso WHERE id_curso = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criarCurso($dados) {
        $sql = "INSERT INTO tb_curso (nome, ementa, carga_horaria, ativo) 
                VALUES (:nome, :ementa, :carga_horaria, :ativo)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($dados);
    }

    public function atualizarCurso($id, $dados) {
        $sql = "UPDATE tb_curso 
                SET nome = :nome, ementa = :ementa, carga_horaria = :carga_horaria, ativo = :ativo
                WHERE id_curso = :id";
        $dados['id'] = $id;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($dados);
    }

    public function excluirCurso($id) {
        $sql = "DELETE FROM tb_curso WHERE id_curso = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function contarCursosAtivos() {
        $sql = "SELECT COUNT(*) AS cursos_ativos FROM tb_curso WHERE ativo = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['cursos_ativos'] ?? 0;
    }
}
