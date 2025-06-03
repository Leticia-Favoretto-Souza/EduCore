<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../models/turma_model.php'; // Adicionado

$pdo = $conexao ?? null;
$inscricaoModel = new InscricaoModel($pdo);
$turmaModel = new TurmaModel($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID não fornecido!";
    exit;
}

$inscricao = $inscricaoModel->buscarPorId($id);
if (!$inscricao) {
    echo "Inscrição não encontrada!";
    exit;
}

$turmasDisponiveis = $turmaModel->listarTurmasAtivas();
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

    <?php require_once 'components/sidebar.php'; ?>

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
            <!-- Main Content Row -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Detalhes da Inscrição -->
                    <div class="dashboard-card">
                        <h5 class="mb-4">Detalhes da Inscrição</h5>
                        
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
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Dados do Responsável</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Nome:</strong> <?= $inscricao['nome_responsavel'] ?: '-' ?></p>
                                        <p class="mb-2"><strong>CPF:</strong> <?= $inscricao['cpf_responsavel'] ?: '-' ?></p>
                                        <p class="mb-2"><strong>RG:</strong> <?= $inscricao['rg_responsavel'] ?: '-' ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Parentesco:</strong> <?= $inscricao['parentesco'] ?: '-' ?></p>
                                        <p class="mb-2"><strong>Telefone:</strong> <?= $inscricao['telefone_responsavel'] ?: '-' ?></p>
                                        <p class="mb-2"><strong>Email:</strong> <?= $inscricao['email_responsavel'] ?: '-' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="dashboard-card mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Alocação em Turma</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="../controllers/alocar_em_turma.php">
                                    <input type="hidden" name="id_inscricao" value="<?= $inscricao['id_inscricao'] ?>">
                                    
                                    <div class="mb-3">
                                        <label for="turma" class="form-label">Selecione a Turma:</label>
                                        <select name="id_turma" id="turma" class="form-select" required>
                                            <option value="">Selecione uma turma...</option>
                                            <?php foreach ($turmasDisponiveis as $turma): ?>
                                                <option value="<?= $turma['id_turma'] ?>">
                                                    <?= htmlspecialchars($turma['codigo_turma']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div id="vagasInfo" class="form-text text-muted mt-2" style="display: none;">
                                        <i class="bi bi-info-circle"></i>
                                        <span id="vagasDisponiveis">Carregando vagas...</span>
                                    </div>

                                    
                                    <div class="d-flex gap-2">
                                        <br>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-save"></i> Matricular
                                        </button>
                                        <a href="javascript:history.back()" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-left"></i> Voltar
                                        </a>
                                    </div>
                                </form>
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

        document.getElementById('turma').addEventListener('change', function () {
            const turmaId = this.value;
            const infoBox = document.getElementById('vagasInfo');
            const vagasSpan = document.getElementById('vagasDisponiveis');

            if (!turmaId) {
                infoBox.style.display = 'none';
                vagasSpan.textContent = '';
                return;
            }

            infoBox.style.display = 'block';
            vagasSpan.textContent = 'Carregando...';

            fetch(`../controllers/buscar_turma.php?id_turma=${turmaId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        vagasSpan.textContent = 'Erro ao buscar vagas.';
                    } else {
                        vagasSpan.textContent = `Vagas disponíveis: ${data.vagas_disponiveis}.`;
                    }
                })
                .catch(error => {
                    vagasSpan.textContent = 'Erro de conexão.';
                });
        });
    </script>
</body>
</html>