<?php
require_once __DIR__ . '/../models/curso_model.php';
require_once __DIR__ . '/../database/conexao-banco.php';

if (!isset($_GET['id'])) {
    header('Location: lista_cursos.php');
    exit;
}

$id = $_GET['id'];
$model = new CursoModel($conexao);
$curso = $model->buscarPorId($id);

if (!$curso) {
    header('Location: lista_cursos.php?erro=CursoNaoEncontrado');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Editar Curso</h3>
        <form action="../controllers/editar_curso.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($curso['id_curso']) ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Curso</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="<?= htmlspecialchars($curso['nome']) ?>">
            </div>

            <div class="mb-3">
                <label for="ementa" class="form-label">Ementa</label>
                <textarea name="ementa" id="ementa" class="form-control" rows="5" required><?= htmlspecialchars($curso['ementa']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="carga_horaria" class="form-label">Carga Horária</label>
                <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" required value="<?= htmlspecialchars($curso['carga_horaria']) ?>">
            </div>

            <div class="mb-3">
                <label for="ativo" class="form-label">Status</label>
                <select name="ativo" id="ativo" class="form-select">
                    <option value="1" <?= $curso['ativo'] ? 'selected' : '' ?>>Ativo</option>
                    <option value="0" <?= !$curso['ativo'] ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Curso</button>
            <a href="lista_cursos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
