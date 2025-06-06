<?php
require_once __DIR__ . '/../controllers/lista_professores.php';
session_start();

$controller = new ProfessorController($conexao);
$filtros = [
    'nome' => $_GET['nome'] ?? null,
    'status' => $_GET['status'] ?? null
];
$professores = $controller->listarProfessores($filtros);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Professores Cadastrados - Sistema Acadêmico</title>
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
                <h4>Professores Cadastrados</h4>
                <a href="professor_cadastrar.php" class="btn btn-outline-primary">
                    <i class="bi bi-person-plus me-2"></i> Cadastrar Professor
                </a>
            </div>

            <div class="dashboard-card mb-4">
                <form class="row g-3" method="GET">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nome" placeholder="Pesquisar por nome..." value="<?= htmlspecialchars($_GET['nome'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="status">
                            <option value="">Todos os status</option>
                            <option value="ativo" <?= ($_GET['status'] ?? '') === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                            <option value="inativo" <?= ($_GET['status'] ?? '') === 'inativo' ? 'selected' : '' ?>>Inativo</option>
                            <option value="afastado" <?= ($_GET['status'] ?? '') === 'afastado' ? 'selected' : '' ?>>Afastado</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search me-1"></i> Filtrar
                        </button>
                    </div>
                </form>
            </div>

            <div class="dashboard-card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Especialização</th>
                                <th>Status</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($professores)): ?>
                                <?php foreach ($professores as $prof): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($prof['nome']) ?></td>
                                        <td><?= htmlspecialchars($prof['cpf']) ?></td>
                                        <td><?= htmlspecialchars($prof['email']) ?></td>
                                        <td><?= htmlspecialchars($prof['telefone']) ?></td>
                                        <td><?= htmlspecialchars($prof['especializacao']) ?></td>
                                        <td>
                                            <span class="badge 
                                                <?= match (strtolower($prof['status'])) {
                                                    'ativo' => 'bg-success',
                                                    'inativo' => 'bg-secondary',
                                                    'afastado' => 'bg-warning',
                                                    default => 'bg-primary'
                                                } ?>">
                                                <?= ucfirst($prof['status']) ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm">
                                                <a href="professor_detalhes.php?id=<?= $prof['id_professor'] ?>" class="btn btn-outline-primary" title="Detalhes" data-bs-toggle="tooltip">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="professor_editar.php?id=<?= $prof['id_professor'] ?>" class="btn btn-outline-secondary" title="Editar" data-bs-toggle="tooltip">
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
                                            <p class="mt-2 mb-0">Nenhum professor encontrado</p>
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
