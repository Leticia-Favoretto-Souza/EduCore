<?php
require_once __DIR__ . '/../controllers/lista_alunos.php';
session_start();

$controller = new AlunoController($conexao);
$alunos = $controller->listarAlunosMatriculados();

// Pega os filtros enviados via GET
$filtros = [
    'nome' => $_GET['nome'] ?? null,
    'curso' => $_GET['curso'] ?? null,
    'status' => $_GET['status'] ?? null
];


$alunos = $controller->listarAlunosMatriculados($filtros);

$cursos = $controller->getCursos();
$turmas = $controller->getTurmas();


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Matriculados - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <?php require_once 'components/sidebar.php'; ?>
    
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <button class="btn btn-outline-primary d-lg-none" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <div class="user-info">
                <div class="user-avatar">S</div>
                <div>
                    <div class="fw-bold">Secretaria</div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Alunos Matriculados</h4>
            </div>

            <!-- Filtros -->
            <div class="dashboard-card mb-4">
                <form class="row g-3" method="GET">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="nome" placeholder="Pesquisar por nome..." value="<?= htmlspecialchars($_GET['nome'] ?? '') ?>">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="curso">
                            <option value="">Todos os cursos</option>
                            <?php foreach ($cursos as $curso): ?>
                                <option value="<?= $curso['id_curso'] ?>">
                                    <?= htmlspecialchars($curso['nome']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="form-select" name="status">
                            <option value="">Todos os status</option>
                            <option value="ativa" <?= ($_GET['status'] ?? '') === 'ativa' ? 'selected' : '' ?>>Ativa</option>
                            <option value="cancelada" <?= ($_GET['status'] ?? '') === 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-funnel me-1"></i> Filtrar
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabela de Alunos -->
            <div class="dashboard-card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Turma</th>
                                <th>Matrícula</th>
                                <th>Status</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($alunos)): ?>
                                <?php foreach ($alunos as $aluno): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($aluno['nome']) ?></td>
                                        <td><?= htmlspecialchars($aluno['curso']) ?></td>
                                        <td><?= htmlspecialchars($aluno['codigo_turma']) ?></td>
                                        <td><?= htmlspecialchars($aluno['numero_matricula']) ?></td>
                                        <td>
                                            <span class="badge <?= 
                                                match (strtolower($aluno['status'])) {
                                                    'cancelada' => 'bg-danger',
                                                    'ativa'     => 'bg-success',
                                                    default     => 'bg-primary'
                                                }
                                            ?>">
                                                <?= ucfirst($aluno['status']) ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm">
                                                <a href="detalhes_aluno.php?id=<?= $aluno['id_matricula'] ?>" 
                                                   class="btn btn-outline-primary" 
                                                   title="Detalhes"
                                                   data-bs-toggle="tooltip">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="editar_aluno.php?id=<?= $aluno['id_matricula'] ?>" 
                                                   class="btn btn-outline-secondary" 
                                                   title="Editar"
                                                   data-bs-toggle="tooltip">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-people display-6"></i>
                                            <p class="mt-2 mb-0">Nenhum aluno matriculado encontrado</p>
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
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
        
        // Ativar tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>