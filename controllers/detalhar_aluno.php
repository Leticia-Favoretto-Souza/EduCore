<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../models/matricula_model.php';
require_once __DIR__ . '/../models/turma_model.php';

$pdo = $conexao ?? null;
$inscricaoModel = new InscricaoModel($pdo);
$matriculaModel = new MatriculaModel($pdo);
$turmaModel = new TurmaModel($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID da matrícula não fornecido!";
    exit;
}

$matricula = $matriculaModel->buscarPorId($id); 
if (!$matricula) {
    echo "Matrícula não encontrada!";
    exit;
}

$inscricao = $inscricaoModel->buscarPorId($matricula['id_inscricao']); 
if (!$inscricao) {
    echo "Inscrição vinculada não encontrada!";
    exit;
}