<?php

class TurmaModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarTurmasAtivas() {
        $sql = "SELECT id_turma, codigo_turma, vagas_disponiveis 
                FROM tb_turma 
                WHERE ativo = 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    /**
     * Verifica se ainda há vagas disponíveis
     */
    public function temVagaDisponivel($idTurma) {
        $sql = "SELECT vagas_disponiveis FROM tb_turma WHERE id_turma = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $idTurma]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dados && $dados['vagas_disponiveis'] > 0;
    }

    /**
     * Cria uma nova turma (exemplo)
     */
    public function criarTurma($dados) {
        $sql = "INSERT INTO tb_turma (
                    id_curso, id_semestre, codigo_turma, 
                    numero_vagas, vagas_disponiveis, 
                    data_inicio, data_fim, horario_aula, local_aula, ativo
                ) VALUES (
                    :id_curso, :id_semestre, :codigo_turma, 
                    :numero_vagas, :vagas_disponiveis, 
                    :data_inicio, :data_fim, :horario_aula, :local_aula, 1
                )";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id_curso' => $dados['id_curso'],
            'id_semestre' => $dados['id_semestre'],
            'codigo_turma' => $dados['codigo_turma'],
            'numero_vagas' => $dados['numero_vagas'],
            'vagas_disponiveis' => $dados['vagas_disponiveis'],
            'data_inicio' => $dados['data_inicio'],
            'data_fim' => $dados['data_fim'],
            'horario_aula' => $dados['horario_aula'] ?? null,
            'local_aula' => $dados['local_aula'] ?? null
        ]);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tb_turma WHERE id_turma = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function reduzirVaga($idTurma) {
        $sql = "UPDATE tb_turma SET vagas_disponiveis = vagas_disponiveis - 1 
                WHERE id_turma = :id AND vagas_disponiveis > 0";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $idTurma]);
    }

    public function aumentarVaga($idTurma) {
        $sql = "UPDATE tb_turma SET vagas_disponiveis = vagas_disponiveis + 1 
                WHERE id_turma = :id AND vagas_disponiveis < numero_vagas";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $idTurma]);
    }

    public function buscarTodas() {
        $sql = "SELECT * FROM tb_turma";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
