<?php
// curso_cadastrar.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Curso - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Cadastrar Novo Curso</h3>
        <form action="../controllers/cadastrar_curso.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Curso</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ementa" class="form-label">Ementa</label>
                <textarea name="ementa" id="ementa" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="carga_horaria" class="form-label">Carga Horária (em horas)</label>
                <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ativo" class="form-label">Status</label>
                <select name="ativo" id="ativo" class="form-select">
                    <option value="1" selected>Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Curso</button>
            <a href="cursos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
