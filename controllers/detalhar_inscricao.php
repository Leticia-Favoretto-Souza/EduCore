<?php

require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../models/turma_model.php'; 

$pdo = $conexao ?? null;
$inscricaoModel = new InscricaoModel($pdo);
$turmaModel = new TurmaModel($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID não fornecido!";
    exit;
}

$inscricao = $inscricaoModel->buscarPorId($id);
if (!$inscricao) {
    echo "Inscrição não encontrada!";
    exit;
}

$dataNascimento = new DateTime($inscricao['data_nascimento']);
$hoje = new DateTime();
$idade = $hoje->diff($dataNascimento)->y;

$turmasDisponiveis = $turmaModel->listarTurmasAtivas();