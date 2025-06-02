<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="https://via.placeholder.com/40" alt="Logo">
            <h5 class="mb-0">Acadêmico</h5>
        </div>
        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-people"></i>
                        Alunos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-book"></i>
                        Cursos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-building"></i>
                        Turmas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person-badge"></i>
                        Professores
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-calendar-event"></i>
                        Aulas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-file-earmark-text"></i>
                        Relatórios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-gear"></i>
                        Configurações
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
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

        <!-- Dashboard Content -->
        <div class="container-fluid">
            <h4 class="mb-4">Dashboard</h4>
            
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Total de Alunos</h5>
                        <div class="card-value">1,248</div>
                        <div class="small text-success mt-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <h5 class="card-title">Cursos Ativos</h5>
                        <div class="card-value">24</div>
                        <div class="small text-success mt-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h5 class="card-title">Turmas Ativas</h5>
                        <div class="card-value">48</div>
                        <div class="small text-success mt-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <h5 class="card-title">Professores</h5>
                        <div class="card-value">36</div>
                        <div class="small text-muted mt-2">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    require_once __DIR__ . '/../controllers/lista_inscricao.php';
                    require_once __DIR__ . '/../database/conexao-banco.php';

                    $controller = new InscricaoController($conexao);
                    $inscricoes = $controller->listarInscricoes();

                    function formatarStatus($status) {
                        return match ($status) {
                            'ativa'     => 'bg-success',
                            'pendente'  => 'bg-warning text-dark',
                            'cancelada' => 'bg-danger',
                            default     => 'bg-secondary',
                        };
                    }
                    ?>

                    <!-- Conteúdo da tabela de inscrições -->
                    <div class="dashboard-card">
                        <h5 class="mb-4">Inscrições Recentes</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Aluno</th>
                                        <th>Curso</th>
                                        <th>Data</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($inscricoes)): ?>
                                        <?php foreach ($inscricoes as $i): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($i['nome']) ?></td>
                                                <td>
                                                    <?= $i['curso_desejado'] === 'preVestibulinho' ? 'Pré-Vestibulinho' : ($i['curso_desejado'] === 'preVestibular' ? 'Pré-Vestibular' : 'Desconhecido') ?>
                                                </td>
                                                <td><?= date('d/m/Y', strtotime($i['data_inscricao'])) ?></td>
                                                <td><span class="badge <?= formatarStatus($i['status']) ?>">
                                                    <?= ucfirst($i['status']) ?>
                                                </span></td>
                                                <td>
                                                    <a href="detalhes-inscricao.php?id=<?= $i['id_inscricao'] ?>" class="btn btn-sm btn-outline-primary">Detalhes</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Nenhuma inscrição encontrada.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Quick Actions -->
                    <div class="dashboard-card mb-4">
                        <h5 class="mb-4">Ações Rápidas</h5>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-person-plus me-2"></i> Cadastrar Aluno
                            </button>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-book me-2"></i> Cadastrar Curso
                            </button>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-building me-2"></i> Criar Turma
                            </button>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-person-badge me-2"></i> Cadastrar Professor
                            </button>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-calendar-event me-2"></i> Agendar Aula
                            </button>
                        </div>
                    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>