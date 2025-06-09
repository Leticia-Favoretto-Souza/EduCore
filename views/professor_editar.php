<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/professor_model.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID do professor não informado.");
}

$professorModel = new ProfessorModel($conexao);
$professor = $professorModel->buscarPorId($id);

if (!$professor) {
    die("Professor não encontrado.");
}
?>

<h2>Editar Professor</h2>

<form method="POST" action="../controllers/editar_professor.php">
    <input type="hidden" name="professor[id]" value="<?= $professor['id_professor'] ?>">

    <label>Nome:
        <input type="text" name="professor[nome]" value="<?= htmlspecialchars($professor['nome']) ?>">
    </label><br>

    <label>CPF:
        <input type="text" name="professor[cpf]" value="<?= $professor['cpf'] ?>">
    </label><br>

    <label>RG:
        <input type="text" name="professor[rg]" value="<?= $professor['rg'] ?>">
    </label><br>

    <label>Email:
        <input type="email" name="professor[email]" value="<?= $professor['email'] ?>">
    </label><br>

    <label>Telefone:
        <input type="text" name="professor[telefone]" value="<?= $professor['telefone'] ?>">
    </label><br>

    <label>Especialização:
        <input type="text" name="professor[especializacao]" value="<?= $professor['especializacao'] ?>">
    </label><br>

    <label>Formação:
        <input type="text" name="professor[formacao]" value="<?= $professor['formacao'] ?>">
    </label><br>

    <label>Data de Contratação:
        <input type="date" name="professor[data_contratacao]" value="<?= $professor['data_contratacao'] ?>">
    </label><br>

    <label>Status:
        <select name="professor[status]">
            <option value="ativo" <?= $professor['status'] === 'ativo' ? 'selected' : '' ?>>Ativo</option>
            <option value="inativo" <?= $professor['status'] === 'inativo' ? 'selected' : '' ?>>Inativo</option>
            <option value="afastado" <?= $professor['status'] === 'afastado' ? 'selected' : '' ?>>Afastado</option>
        </select>
    </label><br>

    <button type="submit">Salvar Alterações</button>
</form>
