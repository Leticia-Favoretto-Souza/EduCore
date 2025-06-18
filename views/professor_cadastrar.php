<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <?php require_once 'components/sidebar_secretaria.php'; ?>
    
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
                <h4>Cadastrar Novo Professor</h4>
                <a href="professores.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <div class="dashboard-card">
                <form action="../controllers/cadastrar_professor.php" method="POST">
                    <!-- Dados Pessoais -->
                    <div class="form-section mb-4">
                        <h5 class="section-title mb-3">Dados Pessoais</h5>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="rg" class="form-label">RG</label>
                                <input type="text" name="rg" id="rg" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="data_contratacao" class="form-label">Data de Contratação</label>
                                <input type="date" name="data_contratacao" id="data_contratacao" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="ativo" selected>Ativo</option>
                                    <option value="inativo">Inativo</option>
                                    <option value="afastado">Afastado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Contato -->
                    <div class="form-section mb-4">
                        <h5 class="section-title mb-3">Contato</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!-- Formação -->
                    <div class="form-section mb-4">
                        <h5 class="section-title mb-3">Formação</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="especializacao" class="form-label">Especialização</label>
                                <input type="text" name="especializacao" id="especializacao" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="formacao" class="form-label">Formação Acadêmica</label>
                                <input type="text" name="formacao" id="formacao" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary px-4 me-2">
                            <i class="bi bi-save"></i> Salvar Professor
                        </button>
                        <a href="professores.php" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>