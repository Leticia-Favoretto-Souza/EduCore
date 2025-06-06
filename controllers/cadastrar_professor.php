<?php
require_once '../database/conexao-banco.php';
require_once '../models/professor_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = new ProfessorModel($conexao);

    $dados = [
        'nome' => $_POST['nome'],
        'cpf' => $_POST['cpf'],
        'rg' => $_POST['rg'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'especializacao' => $_POST['especializacao'],
        'formacao' => $_POST['formacao'],
        'data_contratacao' => $_POST['data_contratacao'],
        'status' => $_POST['status']
    ];

    if ($model->salvar($dados)) {
        header('Location: ../views/sucesso.php?msg=Professor cadastrado com sucesso');
        exit;
    } else {
        echo "Erro ao salvar professor.";
    }
}
