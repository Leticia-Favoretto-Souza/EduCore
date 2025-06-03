<?php

require_once __DIR__ . '/../config/conexao.php'; // seu arquivo de conexão
require_once __DIR__ . '/../models/InscricaoModel.php';

if (!isset($_GET['id'])) {
    die("ID da inscrição não fornecido.");
}

$id = (int) $_GET['id'];

$model = new InscricaoModel($conexao);
$inscricao = $model->buscarPorId($id);

if (!$inscricao) {
    die("Inscrição não encontrada.");
}

// Agora passamos $inscricao para a view
require_once __DIR__ . '/../views/detalhes_inscricao.php';
