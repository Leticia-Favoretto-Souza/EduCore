<?php
require_once __DIR__ . '/../controllers/lista_cursos.php';
session_start();

$controller = new cursoessorController($conexao);
$filtros = [
    'nome' => $_GET['nome'] ?? null,
    'status' => $_GET['status'] ?? null
];
$cursoessores = $controller->listarcursoessores($filtros);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>cursoessores Cadastrados - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <?php require_once 'components/sidebar.php'; ?>
    
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
                                <th>Curso</th>
                                <th>Carga Horária</th>
                                <th>Ementa</th>
                                <th>Ativo</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($cursos)): ?>
                                <?php foreach ($cursos as $curso): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($curso['nome']) ?></td>
                                        <td><?= htmlspecialchars($curso['carga_horaria']) ?></td>
                                        <td><?= htmlspecialchars($curso['ementa']) ?></td>
                                        <td><?= htmlspecialchars($curso['ativo']) ?></td>
                                        <td>
                                            <span class="badge 
                                                <?= match (strtolower($curso['status'])) {
                                                    '1' => 'bg-success',
                                                    '0' => 'bg-warning',
                                                    default => 'bg-primary'
                                                } ?>">
                                                <?= ucfirst($curso['ativo']) ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm">
                                                <a href="cursoessor_detalhes.php?id=<?= $curso['id_curso'] ?>" class="btn btn-outline-primary" title="Detalhes" data-bs-toggle="tooltip">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="cursoessor_editar.php?id=<?= $curso['id_curso'] ?>" class="btn btn-outline-secondary" title="Editar" data-bs-toggle="tooltip">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-person-x display-6"></i>
                                            <p class="mt-2 mb-0">Nenhum curso encontrado</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
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
