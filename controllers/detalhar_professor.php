<?php

require_once '../database/conexao-banco.php';
require_once '../models/professor_model.php';

$pdo = $conexao ?? null;
$professorModel = new ProfessorModel($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID do professor não fornecido!";
    exit;
}

$professor = $professorModel->buscarPorId($id);
if (!$professor) {
    echo "Professor não encontrado!";
    exit;
}