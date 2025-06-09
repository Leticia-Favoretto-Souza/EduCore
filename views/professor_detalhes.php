<?php
    require_once __DIR__ . '/../database/conexao-banco.php';
    require_once __DIR__ . '/../controllers/detalhar_professor.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Professor</title>
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
        <div class="row">
            <!-- Dados do Professor -->
            <div class="col-lg-8">
                <div class="dashboard-card">
                    <h5 class="mb-4">Informações do Professor</h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nome:</strong> <?= htmlspecialchars($professor['nome']) ?></p>
                                    <p><strong>CPF:</strong> <?= htmlspecialchars($professor['cpf']) ?></p>
                                    <p><strong>RG:</strong> <?= htmlspecialchars($professor['rg']) ?></p>
                                    <p><strong>Email:</strong> <?= htmlspecialchars($professor['email']) ?></p>
                                    <p><strong>Telefone:</strong> <?= htmlspecialchars($professor['telefone']) ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Especialização:</strong> <?= htmlspecialchars($professor['especializacao']) ?></p>
                                    <p><strong>Formação:</strong> <?= htmlspecialchars($professor['formacao']) ?></p>
                                    <p><strong>Data de Contratação:</strong> <?= date('d/m/Y', strtotime($professor['data_contratacao'])) ?></p>
                                    <p><strong>Status:</strong> <?= ucfirst($professor['status']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações -->
            <div class="col-lg-4">
                <div class="dashboard-card mb-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Ações</h6>
                        </div>
                        <div class="card-body d-grid gap-2">
                            <a href="professor_editar.php?id=<?= $professor['id_professor'] ?>" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i> Editar Professor
                            </a>
                            <a href="javascript:history.back()" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
        document.querySelector('.sidebar')?.classList.toggle('active');
    });
</script>
</body>
</html>
