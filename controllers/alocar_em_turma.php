<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/matricula_model.php';
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../models/turma_model.php';

$pdo = $conexao ?? null;

$matriculaModel = new MatriculaModel($pdo);
$inscricaoModel = new InscricaoModel($pdo);
$turmaModel = new TurmaModel($pdo);

// Dados do POST
$idInscricao = $_POST['id_inscricao'] ?? null;
$idTurma = $_POST['id_turma'] ?? null;

// Validação básica
if (!$idInscricao || !$idTurma) {
    die('Dados insuficientes.');
}

// Verificar se inscrição já está matriculada
if ($matriculaModel->jaMatriculado($idInscricao)) {
    die('Esta inscrição já está matriculada em uma turma.');
}

// Verificar se a turma tem vagas
$turma = $turmaModel->buscarPorId($idTurma);
if (!$turma || $turma['vagas_disponiveis'] <= 0) {
    die('Não há vagas disponíveis nesta turma.');
}

// Criar a matrícula
$sucesso = $matriculaModel->criarMatricula($idInscricao, $idTurma);

if ($sucesso) {
    // Atualizar status da inscrição para "aprovada"
    $inscricaoModel->atualizarStatus($idInscricao, 'aprovada');

    // Reduzir vagas disponíveis na turma
    $turmaModel->reduzirVaga($idTurma);

    // Redirecionar para o dashboard com mensagem flash
    session_start();
    $_SESSION['flash_mensagem'] = 'Matrícula realizada com sucesso!';
    $_SESSION['flash_tipo'] = 'success'; // Opcional: para personalizar estilo
    header("Location: ../views/dashboard_secretaria.php");
    exit;

}

