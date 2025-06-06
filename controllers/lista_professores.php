<?php
require_once __DIR__ . '/../models/professor_model.php';
require_once __DIR__ . '/../database/conexao-banco.php';

class ProfessorController {
    private $model;

    public function __construct(PDO $conexao) {
        $this->model = new ProfessorModel($conexao);
    }

    public function listarProfessores(array $filtros = []): array {
        return $this->model->listarTodosComFiltro($filtros);
    }
}
