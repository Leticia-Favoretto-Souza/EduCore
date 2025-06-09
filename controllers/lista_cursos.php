<?php
require_once __DIR__ . '/../models/curso_model.php';
require_once __DIR__ . '/../database/conexao-banco.php';

class CursoController {
    private $model;

    public function __construct(PDO $conexao) {
        $this->model = new CursoModel($conexao);
    }

    public function listarCursos(): array {
        return $this->model->listarCursos();
    }
}
