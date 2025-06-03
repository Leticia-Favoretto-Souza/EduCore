<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/turma_model.php';

header('Content-Type: application/json');

$pdo = $conexao ?? null;
$turmaModel = new TurmaModel($pdo);

$idTurma = $_GET['id_turma'] ?? null;

if (!$idTurma) {
    echo json_encode(['erro' => 'ID da turma não fornecido']);
    exit;
}

$turma = $turmaModel->buscarPorId($idTurma);

if (!$turma) {
    echo json_encode(['erro' => 'Turma não encontrada']);
    exit;
}

echo json_encode([
    'vagas_disponiveis' => $turma['vagas_disponiveis'] ?? 0
]);
