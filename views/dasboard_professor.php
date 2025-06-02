<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Professor - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="https://via.placeholder.com/40" alt="Logo">
            <h5 class="mb-0">Professor</h5>
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
                        <i class="bi bi-calendar-check"></i>
                        Aulas Agendadas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-check-circle"></i>
                        Aulas Ministradas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-journal-text"></i>
                        Planos de aula
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-clipboard-data"></i>
                        Avaliações
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
                <div class="user-avatar">PM</div>
                <div>
                    <div class="fw-bold">Prof. Maria Silva</div>
                    <div class="small text-muted">Departamento de Exatas</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="container-fluid">
            <h4 class="mb-4">Dashboard Professor</h4>
            
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h5 class="card-title">Aulas Hoje</h5>
                        <div class="card-value">3</div>
                        <div class="small text-muted mt-2">
                            Próxima: 14:00 - Cálculo I
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <h5 class="card-title">Aulas Ministradas</h5>
                        <div class="card-value">5</div>
                        <div class="small text-success mt-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Turmas</h5>
                        <div class="card-value">2</div>

                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Aulas de Hoje -->
                    <div class="dashboard-card">
                        <h5 class="mb-4">Aulas de Hoje - 02/06/2023</h5>
                        
                        <div class="aula-card pendente">
                            <div class="aula-horario">08:00 - 10:00</div>
                            <div class="aula-disciplina">Cálculo I - Aula 12: Derivadas Parciais</div>
                            <div class="aula-turma">Turma: ENG-2023-1 | Sala: B204</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-primary">Registrar Presenças</button>
                                <button class="btn btn-sm btn-outline-secondary">Conteúdo</button>
                            </div>
                        </div>
                        
                        <div class="aula-card pendente">
                            <div class="aula-horario">10:30 - 12:30</div>
                            <div class="aula-disciplina">Álgebra Linear - Aula 8: Transformações Lineares</div>
                            <div class="aula-turma">Turma: MAT-2023-1 | Sala: A102</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-primary">Registrar Presenças</button>
                                <button class="btn btn-sm btn-outline-secondary">Conteúdo</button>
                            </div>
                        </div>
                        
                        <div class="aula-card pendente">
                            <div class="aula-horario">14:00 - 16:00</div>
                            <div class="aula-disciplina">Cálculo I - Exercícios</div>
                            <div class="aula-turma">Turma: ENG-2023-1 | Laboratório: L305</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-primary">Registrar Presenças</button>
                                <button class="btn btn-sm btn-outline-secondary">Conteúdo</button>
                            </div>
                        </div>
                    </div>

                    <!-- Próximas Aulas -->
                    <div class="dashboard-card">
                        <h5 class="mb-4">Próximas Aulas</h5>
                        
                        <div class="aula-card">
                            <div class="aula-horario">05/06 - 08:00 - 10:00</div>
                            <div class="aula-disciplina">Cálculo I - Aula 13: Integrais Múltiplas</div>
                            <div class="aula-turma">Turma: ENG-2023-1 | Sala: B204</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-outline-primary">Preparar Aula</button>
                            </div>
                        </div>
                        
                        <div class="aula-card">
                            <div class="aula-horario">05/06 - 10:30 - 12:30</div>
                            <div class="aula-disciplina">Álgebra Linear - Aula 9: Autovalores e Autovetores</div>
                            <div class="aula-turma">Turma: MAT-2023-1 | Sala: A102</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-outline-primary">Preparar Aula</button>
                            </div>
                        </div>
                        
                        <div class="aula-card">
                            <div class="aula-horario">07/06 - 14:00 - 16:00</div>
                            <div class="aula-disciplina">Cálculo I - Prova 2</div>
                            <div class="aula-turma">Turma: ENG-2023-1 | Sala: B204</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-outline-primary">Preparar Prova</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Ações Rápidas -->
                    <div class="dashboard-card mb-4">
                        <h5 class="mb-4">Ações Rápidas</h5>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-journal-plus me-2"></i> Adicionar Conteúdo
                            </button>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-clipboard-plus me-2"></i> Criar Avaliação
                            </button>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-file-earmark-text me-2"></i> Lançar Notas
                            </button>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-chat-left-text me-2"></i> Enviar Mensagem
                            </button>
                        </div>
                    </div>

                    <!-- Últimas Aulas Ministradas -->
                    <div class="dashboard-card">
                        <h5 class="mb-4">Últimas Aulas</h5>
                        
                        <div class="aula-card finalizada">
                            <div class="aula-horario">31/05 - 08:00 - 10:00</div>
                            <div class="aula-disciplina">Cálculo I - Aula 11: Derivadas Direcionais</div>
                            <div class="aula-turma">Presentes: 22/25</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-outline-secondary">Detalhes</button>
                            </div>
                        </div>
                        
                        <div class="aula-card finalizada">
                            <div class="aula-horario">30/05 - 10:30 - 12:30</div>
                            <div class="aula-disciplina">Álgebra Linear - Aula 7: Espaços Vetoriais</div>
                            <div class="aula-turma">Presentes: 18/20</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-outline-secondary">Detalhes</button>
                            </div>
                        </div>
                        
                        <div class="aula-card finalizada">
                            <div class="aula-horario">29/05 - 14:00 - 16:00</div>
                            <div class="aula-disciplina">Cálculo I - Exercícios</div>
                            <div class="aula-turma">Presentes: 20/25</div>
                            <div class="aula-acoes">
                                <button class="btn btn-sm btn-outline-secondary">Detalhes</button>
                            </div>
                        </div>
                    </div>
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

        // Simples navegação do calendário (funcionalidade básica)
        document.querySelectorAll('.calendar-nav button').forEach(button => {
            button.addEventListener('click', function() {
                // Aqui iria a lógica para mudar o mês
                alert('Funcionalidade de navegação do calendário seria implementada aqui');
            });
        });

        // Selecionar dia no calendário
        document.querySelectorAll('.calendar-day').forEach(day => {
            day.addEventListener('click', function() {
                document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('active'));
                this.classList.add('active');
                // Aqui iria a lógica para carregar as aulas do dia selecionado
            });
        });
    </script>
</body>
</html>