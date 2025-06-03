<?php
require_once __DIR__ . '/../models/matricula_model.php';
require_once __DIR__ . '/../models/curso_model.php';
require_once __DIR__ . '/../models/turma_model.php';
require_once __DIR__ . '/../database/conexao-banco.php';

class AlunoController {
    private $pdo;
    private $matriculaModel;
    private $cursoModel;
    private $turmaModel;

    public function __construct($conexao) {
        $this->pdo = $conexao;
        $this->matriculaModel = new MatriculaModel($conexao);
        $this->cursoModel = new CursoModel($conexao);
        $this->turmaModel = new TurmaModel($conexao);
    }

    /**
     * Lista alunos com ou sem filtros
     */
    public function listarAlunosMatriculados($filtros = []) {
        if (empty($filtros)) {
            return $this->matriculaModel->buscarAlunosMatriculados();
        }
        return $this->matriculaModel->buscarAlunosComFiltro($filtros);
    }

    public function getCursos() {
        return $this->cursoModel->listarCursos();
    }

    public function getTurmas() {
        return $this->turmaModel->listarTurmasAtivas();
    }
}
