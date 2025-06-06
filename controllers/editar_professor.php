<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/professor_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['professor'])) {
    $dados = $_POST['professor'];

    // Verifica se o ID do professor foi enviado
    if (!isset($dados['id'])) {
        die("ID do professor não fornecido.");
    }

    $professorModel = new ProfessorModel($conexao);

    // Atualiza os dados
    $atualizado = $professorModel->atualizar($dados);

    if ($atualizado) {
        header("Location: ../views/listar_professores.php?sucesso=1");
        exit;
    } else {
        die("Erro ao atualizar os dados do professor.");
    }
} else {
    die("Requisição inválida.");
}
