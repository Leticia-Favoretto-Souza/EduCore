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
                    <!-- Recent Students -->
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
                                    <tr>
                                        <td>Ana Carolina</td>
                                        <td>Administração</td>
                                        <td>02/06/2023</td>
                                        <td><span class="badge bg-success">Ativa</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">Detalhes</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Eduardo</td>
                                        <td>Engenharia</td>
                                        <td>01/06/2023</td>
                                        <td><span class="badge bg-warning text-dark">Pendente</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">Detalhes</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mariana Silva</td>
                                        <td>Medicina</td>
                                        <td>31/05/2023</td>
                                        <td><span class="badge bg-success">Ativa</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">Detalhes</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pedro Henrique</td>
                                        <td>Direito</td>
                                        <td>30/05/2023</td>
                                        <td><span class="badge bg-danger">Cancelada</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">Detalhes</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Juliana Costa</td>
                                        <td>Psicologia</td>
                                        <td>29/05/2023</td>
                                        <td><span class="badge bg-success">Ativa</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">Detalhes</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <a href="#" class="btn btn-primary">Ver todas</a>
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