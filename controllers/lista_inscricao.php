<?php
require_once __DIR__ . '/../models/inscricao_model.php';

class InscricaoController {
    private $model;

    public function __construct(PDO $pdo) {
        $this->model = new InscricaoModel($pdo);
    }

    public function listarInscricoes() {
        return $this->model->buscarTodas();
    }
}
