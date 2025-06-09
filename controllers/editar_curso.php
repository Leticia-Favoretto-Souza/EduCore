<?php
require_once __DIR__ . '/../models/curso_model.php';
require_once __DIR__ . '/../database/conexao-banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $dados = [
        'nome' => $_POST['nome'],
        'ementa' => $_POST['ementa'],
        'carga_horaria' => $_POST['carga_horaria'],
        'ativo' => $_POST['ativo']
    ];

    $model = new CursoModel($conexao);
    $sucesso = $model->atualizarCurso($id, $dados);

    if ($sucesso) {
        header('Location: lista_cursos.php?atualizado=1');
        exit;
    } else {
        header("Location: curso_editar.php?id=$id&erro=1");
        exit;
    }
} else {
    header('Location: lista_cursos.php');
    exit;
}
