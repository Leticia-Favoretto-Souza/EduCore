<?php
session_start();
require_once __DIR__ . '/../controllers/lista_alunos.php';
$controller = new AlunoController($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Curso - Sistema Acadêmico</title>
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
                <h4><i class="bi bi-book me-2"></i>Cadastrar Novo Curso</h4>
                <a href="cursos.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <div class="dashboard-card">
                <form action="../controllers/cadastrar_curso.php" method="POST">
                    <!-- Dados do Curso -->
                    <div class="form-section">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="nome" class="form-label">Nome do Curso</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="carga_horaria" class="form-label">Carga Horária (horas)</label>
                                <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" required>
                            </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="ementa" class="form-label">Ementa</label>
                                <textarea name="ementa" id="ementa" class="form-control form-textarea" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ativo" class="form-label">Status do Curso</label>
                                <select name="ativo" id="ativo" class="form-select">
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary px-4 me-2">
                            <i class="bi bi-save"></i> Salvar Curso
                        </button>
                        <a href="cursos.php" class="btn btn-outline-secondary px-4">
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