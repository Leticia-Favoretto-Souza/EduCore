<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Aluno - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

    <?php require_once 'components/sidebar_aluno.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <button class="btn btn-outline-primary d-lg-none" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <div class="user-info">
                <div class="user-avatar">JS</div>
                <div>
                    <div class="fw-bold">João da Silva</div>
                    <div class="small text-muted">Matrícula: 2023001234</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="container-fluid">
            <h4 class="mb-4">Dashboard do Aluno</h4>
            
            <!-- Status da Inscrição -->
            <div class="dashboard-card">
                <h5 class="mb-4">Status da Inscrição</h5>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="card-icon">
                                <i class="bi bi-file-earmark-check"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="card-title mb-0">Situação Atual</h5>
                                <span class="status-badge status-aprovado">APROVADO</span>
                            </div>
                        </div>
                        <p class="mb-0">Sua inscrição foi aprovada em 15/02/2023. Bem-vindo ao semestre letivo!</p>
                    </div>
                    <div class="col-md-6">
                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>Progresso no semestre</span>
                            <span>65% concluído</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="dashboard-card">
                        <h5 class="mb-4">Avisos Importantes</h5>
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Prazo para entrega de documentos: 20/06
                        </div>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            Biblioteca com horário estendido durante semana de provas
                        </div>
                    </div>

                    <!-- Próximas Avaliações -->
                    <div class="dashboard-card">
                        <h5 class="mb-4">Próximas Avaliações</h5>
                        
                        <div class="aula-card prova">
                            <div class="aula-horario">15/06 - 14:00 - 16:00</div>
                            <div class="aula-disciplina">Prova 3 - Matemática </div>
                            <div class="aula-detalhes">Sala: B204 | Conteúdo: Unidades 7-9</div>
                        </div>
                        
                        <div class="aula-card">
                            <div class="aula-horario">20/06 - 10:30 - 12:30</div>
                            <div class="aula-disciplina">Prova 3 - Química</div>
                            <div class="aula-detalhes">Sala: B205 | Conteúdo: Unidades 4-5</div>
                        </div>
                        
                        <div class="aula-card recuperacao">
                            <div class="aula-horario">25/06 - 08:00 - 10:00</div>
                            <div class="aula-disciplina">Prova 3 - Redação</div>
                            <div class="aula-detalhes">Sala: A102 | Conteúdo: Unidades 4-5</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Frequência -->
                    <div class="dashboard-card">
                        <h5 class="mb-4">Frequência</h5>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>85%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">Mínimo exigido: 75% de frequência</small>
                        </div>
                    </div>

                    <!-- Calendário -->
                    <div class="dashboard-card">
                        <div class="calendar-header">
                            <h5 class="calendar-title mb-0">Junho 2023</h5>
                            <div class="calendar-nav">
                                <button><i class="bi bi-chevron-left"></i></button>
                                <button><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        
                        <div class="calendar-weekdays">
                            <div>Dom</div>
                            <div>Seg</div>
                            <div>Ter</div>
                            <div>Qua</div>
                            <div>Qui</div>
                            <div>Sex</div>
                            <div>Sáb</div>
                        </div>
                        
                        <div class="calendar-days">
                            <!-- Dias do mês anterior -->
                            <div class="calendar-day text-muted">28</div>
                            <div class="calendar-day text-muted">29</div>
                            <div class="calendar-day text-muted">30</div>
                            <div class="calendar-day text-muted">31</div>
                            
                            <!-- Dias do mês atual -->
                            <div class="calendar-day">1</div>
                            <div class="calendar-day">2</div>
                            <div class="calendar-day">3</div>
                            <div class="calendar-day">4</div>
                            <div class="calendar-day">5</div>
                            <div class="calendar-day">6</div>
                            <div class="calendar-day">7</div>
                            <div class="calendar-day">8</div>
                            <div class="calendar-day">9</div>
                            <div class="calendar-day">10</div>
                            <div class="calendar-day today has-event">11
                                <div class="d-flex justify-content-center mt-1">
                                    <span class="event-dot event-aula"></span>
                                </div>
                            </div>
                            <div class="calendar-day">12</div>
                            <div class="calendar-day">13</div>
                            <div class="calendar-day">14</div>
                            <div class="calendar-day has-event">15
                                <div class="d-flex justify-content-center mt-1">
                                    <span class="event-dot event-prova"></span>
                                </div>
                            </div>
                            <div class="calendar-day">16</div>
                            <div class="calendar-day">17</div>
                            <div class="calendar-day">18</div>
                            <div class="calendar-day">19</div>
                            <div class="calendar-day has-event">20
                                <div class="d-flex justify-content-center mt-1">
                                    <span class="event-dot event-aula"></span>
                                </div>
                            </div>
                            <div class="calendar-day">21</div>
                            <div class="calendar-day">22</div>
                            <div class="calendar-day">23</div>
                            <div class="calendar-day">24</div>
                            <div class="calendar-day has-event">25
                                <div class="d-flex justify-content-center mt-1">
                                    <span class="event-dot event-prova"></span>
                                </div>
                            </div>
                            <div class="calendar-day">26</div>
                            <div class="calendar-day">27</div>
                            <div class="calendar-day">28</div>
                            <div class="calendar-day">29</div>
                            <div class="calendar-day">30</div>
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

        // Selecionar dia no calendário
        document.querySelectorAll('.calendar-day:not(.text-muted)').forEach(day => {
            day.addEventListener('click', function() {
                document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('active'));
                this.classList.add('active');
                // Aqui iria a lógica para carregar os eventos do dia selecionado
            });
        });

        // Simular navegação do calendário
        document.querySelectorAll('.calendar-nav button').forEach(button => {
            button.addEventListener('click', function() {
                alert('Navegação do calendário seria implementada aqui');
            });
        });
    </script>
</body>
</html>