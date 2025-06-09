<?php
require_once __DIR__ . '/../controllers/detalhar_aluno.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Aluno</title>
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
            <div>
                <div class="fw-bold">Secretaria</div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Dados do Aluno -->
            <div class="col-lg-8">
                <div class="dashboard-card">
                    <h5 class="mb-4">Informações do Aluno</h5>
                    <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Coluna da Foto -->
                                    <div class="col-md-3 text-center mb-3 mb-md-0">
                                        <?php if (!empty($inscricao['foto'])): ?>
                                            <img src="../public/<?= htmlspecialchars($inscricao['foto']) ?>" 
                                                alt="Foto do Aluno" 
                                                class="img-thumbnail mb-3"
                                                style="max-width: 150px;">
                                        <?php else: ?>
                                            <div class="bg-light p-5 text-center">
                                                <i class="bi bi-person-circle" style="font-size: 3rem; color: #ccc;"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Coluna de Dados Pessoais -->
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p class="mb-2"><strong>Nome:</strong> <?= htmlspecialchars($inscricao['nome']) ?></p>
                                                <p class="mb-2"><strong>Data Nasc.:</strong> <?= date('d/m/Y', strtotime($inscricao['data_nascimento'])) ?></p>
                                                <p class="mb-2"><strong>CPF:</strong> <?= htmlspecialchars($inscricao['cpf']) ?></p>
                                                <p class="mb-2"><strong>RG:</strong> <?= htmlspecialchars($inscricao['rg']) ?></p>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="mb-2"><strong>Email:</strong> <?= htmlspecialchars($inscricao['email']) ?></p>
                                                <p class="mb-2"><strong>Telefone:</strong> <?= htmlspecialchars($inscricao['telefone']) ?></p>
                                                <p class="mb-2"><strong>Nível Ensino:</strong> <?= htmlspecialchars($inscricao['nivel_ensino']) ?></p>
                                                <p class="mb-2"><strong>Curso desejado:</strong> 
                                                    <?= $inscricao['curso_desejado'] === 'preVestibular' ? 'Pré-Vestibular' : 
                                                    ($inscricao['curso_desejado'] === 'preVestibulinho' ? 'Pré-Vestibulinho' : 'Outro') ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Endereço - Linha completa -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <p class="mb-2"><strong>Endereço:</strong></p>
                                        <p class="ps-3">
                                            <?= htmlspecialchars($inscricao['logradouro']) ?>, <?= htmlspecialchars($inscricao['numero']) ?>
                                            <?= $inscricao['complemento'] ? ' - ' . htmlspecialchars($inscricao['complemento']) : '' ?><br>
                                            <?= htmlspecialchars($inscricao['bairro']) ?> - <?= htmlspecialchars($inscricao['cidade']) ?>/<?= htmlspecialchars($inscricao['estado']) ?><br>
                                            CEP: <?= htmlspecialchars($inscricao['cep']) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Responsável -->
                    <div class="card mb-4">
                        <div class="card-header bg-light"><h6 class="mb-0">Dados do Responsável</h6></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nome:</strong> <?= $inscricao['nome_responsavel'] ?: '-' ?></p>
                                    <p><strong>CPF:</strong> <?= $inscricao['cpf_responsavel'] ?: '-' ?></p>
                                    <p><strong>RG:</strong> <?= $inscricao['rg_responsavel'] ?: '-' ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Parentesco:</strong> <?= $inscricao['parentesco'] ?: '-' ?></p>
                                    <p><strong>Telefone:</strong> <?= $inscricao['telefone_responsavel'] ?: '-' ?></p>
                                    <p><strong>Email:</strong> <?= $inscricao['email_responsavel'] ?: '-' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Matrícula -->
                    <?php if ($matricula): ?>
                    <div class="card mb-4">
                        <div class="card-header bg-light"><h6 class="mb-0">Dados da Matrícula</h6></div>
                        <div class="card-body">
                            <p><strong>Número da Matrícula:</strong> <?= htmlspecialchars($matricula['numero_matricula']) ?></p>
                            <p><strong>Data da Matrícula:</strong> <?= date('d/m/Y', strtotime($matricula['data_matricula'])) ?></p>
                            <p><strong>Status:</strong> <?= ucfirst($matricula['status']) ?></p>
                            <p><strong>Turma:</strong> <?= htmlspecialchars($matricula['codigo_turma']) ?></p>
                            <p><strong>Curso:</strong> <?= htmlspecialchars($matricula['nome_curso']) ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
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
                            <a href="aluno_editar.php?id=<?= $inscricao['id_inscricao'] ?>" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i> Editar Informações
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
