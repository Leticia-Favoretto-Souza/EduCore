<?php
require_once __DIR__ . '/../models/curso_model.php';
require_once __DIR__ . '/../database/conexao-banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome' => $_POST['nome'],
        'ementa' => $_POST['ementa'],
        'carga_horaria' => $_POST['carga_horaria'],
        'ativo' => $_POST['ativo']
    ];

    $cursoModel = new CursoModel($conexao);
    $sucesso = $cursoModel->criarCurso($dados);

    if ($sucesso) {
        header('Location: ../views/cursos.php?sucesso=1');
        exit;
    } else {
        header('Location: curso_cadastrar.php?erro=1');
        exit;
    }
} else {
    // Redireciona caso a requisição não seja POST
    header('Location: curso_cadastrar.php');
    exit;
}
