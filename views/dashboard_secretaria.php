<?php
    session_start();
    require_once __DIR__ . '/../controllers/lista_inscricao.php';
    require_once __DIR__ . '/../database/conexao-banco.php';
    require_once __DIR__ . '/../models/matricula_model.php';
    require_once __DIR__ . '/../models/curso_model.php';
    require_once __DIR__ . '/../models/turma_model.php';
    require_once __DIR__ . '/../models/professor_model.php';

    $controller = new InscricaoController($conexao);
    $inscricoes = $controller->listarInscricoes();
    $espera = $controller->listarEspera();

    function formatarStatus($status) {
        return match ($status) {
            'ativa'     => 'bg-success',
            'pendente'  => 'bg-warning text-dark',
            'cancelada' => 'bg-danger',
            default     => 'bg-secondary',
        };
    }

    $matriculaModel = new MatriculaModel($conexao);
    $totalAtivas = $matriculaModel->contarMatriculasAtivas();

    $cursoModel = new CursoModel($conexao);
    $cursosAtivos = $cursoModel->contarCursosAtivos();

    $turmaModel = new TurmaModel($conexao);
    $turmasAtivas = $turmaModel->contarTurmasAtivas();

    $professorModel = new ProfessorModel($conexao);
    $professoresAtivos = $professorModel->contarProfessoresAtivos();
?>
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

    <?php require_once 'components/sidebar_secretaria.php'; ?>
    
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

            <?php if (!empty($_SESSION['flash_mensagem'])): ?>
                <div class="alert alert-<?= $_SESSION['flash_tipo'] ?? 'info' ?> alert-dismissible fade show mt-3" role="alert">
                    <?= htmlspecialchars($_SESSION['flash_mensagem']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
                <?php unset($_SESSION['flash_mensagem'], $_SESSION['flash_tipo']); ?>
            <?php endif; ?>
            
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Total de Alunos</h5>
                        <div class="card-value"><?php echo $totalAtivas ?></div>
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
                        <div class="card-value"><?php echo $cursosAtivos ?></div>
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
                        <div class="card-value"><?php echo $turmasAtivas ?></div>
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
                        <div class="card-value"><?php echo $professoresAtivos ?></div>
                        <div class="small text-muted mt-2">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row">
                <div class="col-lg-8">

                    <div class="dashboard-card mb-4">
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
                                                    <a href="inscricao_detalhes.php?id=<?= $i['id_inscricao'] ?>" class="btn btn-sm btn-primary">
                                                         Detalhes
                                                    </a>
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

                    <div class="dashboard-card" id="listaEsperaCard"> 
                        <h5 class="mb-4">Lista de espera</h5>
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
                                <tbody id="listaEsperaBody">
                                    <?php if (!empty($espera)): ?>
                                        <?php foreach ($espera as $i): ?>
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
                                                    <a href="inscricao_detalhes.php?id=<?= $i['id_inscricao'] ?>" class="btn btn-sm btn-primary">
                                                            Detalhes
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Lista de espera vazia.</td>
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
                            <a href="curso_cadastrar.php" class="btn btn-outline-primary text-start">
                                <i class="bi bi-book me-2"></i> Cadastrar Curso
                            </a>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-building me-2"></i> Criar Turma
                            </button>
                            <a href="professor_cadastrar.php" class="btn btn-outline-primary text-start">
                                <i class="bi bi-person-badge me-2"></i> Cadastrar Professor
                            </a>
                            <button class="btn btn-outline-primary text-start">
                                <i class="bi bi-calendar-event me-2"></i> Agendar Aula
                            </button>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div> 

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Verifica se a lista de espera tem conteúdo
        document.addEventListener('DOMContentLoaded', function () {
            const listaEsperaBody = document.getElementById('listaEsperaBody');
            const listaEsperaCard = document.getElementById('listaEsperaCard');

            if (listaEsperaBody && listaEsperaCard) {
                const temLinhas = listaEsperaBody.querySelectorAll('tr').length > 1 || 
                    (listaEsperaBody.querySelector('tr') && !listaEsperaBody.querySelector('tr').textContent.includes('Lista de espera vazia'));

                if (!temLinhas) {
                    listaEsperaCard.style.display = 'none';
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>