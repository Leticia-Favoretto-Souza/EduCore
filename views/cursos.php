<?php
require_once __DIR__ . '/../controllers/lista_cursos.php';

$controller = new CursoController($conexao);
$cursos = $controller->listarCursos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cursos Cadastrados - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <?php require_once 'components/sidebar_secretaria.php'; ?>
    
    <div class="main-content">
        <div class="top-bar">
            <button class="btn btn-outline-primary d-lg-none" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <div class="user-info">
                <div class="user-avatar">S</div>
                <div><div class="fw-bold">Secretaria</div></div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Cursos Cadastrados</h4>
                <a href="curso_cadastrar.php" class="btn btn-outline-primary">
                    <i class="bi bi-person-plus me-2"></i> Cadastrar Curso
                </a>
            </div>

            <div class="dashboard-card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Nome</th> 
                            <th>Carga Horária</th> 
                            <th>Status</th> 
                            <th>Ementa</th> 
                            <th>Ações</th> 
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cursos as $curso): ?>
                                <tr>
                                    <td><?= htmlspecialchars($curso['nome']) ?></td>
                                    <td><?= $curso['carga_horaria'] ?> horas</td>
                                    <td><?= $curso['ativo'] ? 'Ativo' : 'Inativo' ?></td>
                                    <td><?= htmlspecialchars($curso['ementa']) ?></td>
                                    <td class="text-end">
                                        <a href="curso_editar.php?id=<?= $curso['id_curso'] ?>" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
