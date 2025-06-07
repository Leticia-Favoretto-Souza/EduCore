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

    // Buscar a turma
    $turma = $turmaModel->buscarPorId($idTurma);
    if (!$turma) {
        die('Turma não encontrada.');
    }

    $vagasDisponiveis = (int) $turma['vagas_disponiveis'];

    if ($vagasDisponiveis > 0) {
        // Criar a matrícula e atualizar status
        $sucesso = $matriculaModel->criarMatricula($idInscricao, $idTurma);

        if ($sucesso) {
            $inscricaoModel->atualizarStatus($idInscricao, 'aprovada');
            $turmaModel->reduzirVaga($idTurma);

            session_start();
            $_SESSION['flash_mensagem'] = 'Matrícula realizada com sucesso!';
            $_SESSION['flash_tipo'] = 'success';
            header("Location: ../views/dashboard_secretaria.php");
            exit;
        } else {
            die('Erro ao criar matrícula.');
        }
    } else {
        // Atualiza apenas o status da inscrição para espera
        $inscricaoModel->atualizarStatus($idInscricao, 'espera');

        session_start();
        $_SESSION['flash_mensagem'] = 'Aluno inserido na lista de espera.';
        $_SESSION['flash_tipo'] = 'warning';
        header("Location: ../views/dashboard_secretaria.php");
        exit;
    }
