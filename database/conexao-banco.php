<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "educore";

try {
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$nomeBanco",
        $usuario,
        $senha
    );
} catch (PDOException $excecao) {
    throw new PDOException($excecao->getMessage(), (int) $excecao->getCode());
}
