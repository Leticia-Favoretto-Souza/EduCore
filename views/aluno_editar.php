<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../models/matricula_model.php';
require_once __DIR__ . '/../models/turma_model.php';
require_once __DIR__ . '/../controllers/lista_alunos.php';

session_start();
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID da inscrição não informado.");
}

$controller = new AlunoController($conexao);
$inscricaoModel = new InscricaoModel($conexao);
$matriculaModel = new MatriculaModel($conexao);
$turmaModel = new TurmaModel($conexao);

$inscricao = $inscricaoModel->buscarPorId($id);
$matricula = $matriculaModel->buscarPorInscricao($id);
$turmas = $turmaModel->buscarTodas();

if (!$inscricao) {
    die("Inscrição não encontrada.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno - Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <style>
        .form-section {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-left: 4px solid var(--primary-color);
        }
        
        .section-title {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            margin-bottom: 1.25rem;
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(88, 167, 201, 0.25);
        }
    </style>
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
                <h4>Editar Aluno</h4>
                <a href="lista_alunos.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <div class="dashboard-card p-4">
                <form method="POST" action="../controllers/editar_aluno.php">
                    <input type="hidden" name="inscricao[id]" value="<?= $inscricao['id_inscricao'] ?>">
                    <input type="hidden" name="matricula[id]" value="<?= $matricula['id_matricula'] ?? '' ?>">

                    <!-- Dados do Aluno -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="bi bi-person-vcard"></i> Dados Pessoais
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="inscricao[nome]" 
                                       value="<?= htmlspecialchars($inscricao['nome']) ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" 
                                       name="inscricao[data_nascimento]" value="<?= $inscricao['data_nascimento'] ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="inscricao[cpf]" 
                                       value="<?= $inscricao['cpf'] ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="rg" class="form-label">RG</label>
                                <input type="text" class="form-control" id="rg" name="inscricao[rg]" 
                                       value="<?= $inscricao['rg'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="inscricao[email]" 
                                       value="<?= $inscricao['email'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="inscricao[telefone]" 
                                       value="<?= $inscricao['telefone'] ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- Dados Acadêmicos -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="bi bi-book"></i> Dados Acadêmicos
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="curso_desejado" class="form-label">Curso Desejado</label>
                                <input type="text" class="form-control" id="curso_desejado" 
                                       name="inscricao[curso_desejado]" value="<?= $inscricao['curso_desejado'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="nivel_ensino" class="form-label">Nível de Ensino</label>
                                <input type="text" class="form-control" id="nivel_ensino" 
                                       name="inscricao[nivel_ensino]" value="<?= $inscricao['nivel_ensino'] ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="bi bi-house-door"></i> Endereço
                        </h5>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" name="inscricao[cep]" 
                                       value="<?= $inscricao['cep'] ?>" onblur="pesquisacep(this.value)">
                            </div>
                            <div class="col-md-6">
                                <label for="logradouro" class="form-label">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" 
                                       name="inscricao[logradouro]" value="<?= $inscricao['logradouro'] ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero" 
                                       name="inscricao[numero]" value="<?= $inscricao['numero'] ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control" id="complemento" 
                                       name="inscricao[complemento]" value="<?= $inscricao['complemento'] ?>">
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" 
                                       name="inscricao[bairro]" value="<?= $inscricao['bairro'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" 
                                       name="inscricao[cidade]" value="<?= $inscricao['cidade'] ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" 
                                       name="inscricao[estado]" value="<?= $inscricao['estado'] ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Responsável -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="bi bi-person-badge"></i> Dados do Responsável
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome_responsavel" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_responsavel" 
                                       name="inscricao[nome_responsavel]" value="<?= $inscricao['nome_responsavel'] ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="cpf_responsavel" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf_responsavel" 
                                       name="inscricao[cpf_responsavel]" value="<?= $inscricao['cpf_responsavel'] ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="rg_responsavel" class="form-label">RG</label>
                                <input type="text" class="form-control" id="rg_responsavel" 
                                       name="inscricao[rg_responsavel]" value="<?= $inscricao['rg_responsavel'] ?>">
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="parentesco" class="form-label">Parentesco</label>
                                <input type="text" class="form-control" id="parentesco" 
                                       name="inscricao[parentesco]" value="<?= $inscricao['parentesco'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="telefone_responsavel" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone_responsavel" 
                                       name="inscricao[telefone_responsavel]" value="<?= $inscricao['telefone_responsavel'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="email_responsavel" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email_responsavel" 
                                       name="inscricao[email_responsavel]" value="<?= $inscricao['email_responsavel'] ?>">
                            </div>
                        </div>
                    </div>

                    <?php if ($matricula): ?>
                    <!-- Matrícula -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="bi bi-journal-check"></i> Matrícula
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="id_turma" class="form-label">Turma</label>
                                <select class="form-select" id="id_turma" name="matricula[id_turma]">
                                    <?php foreach ($turmas as $turma): ?>
                                        <option value="<?= $turma['id_turma'] ?>" <?= $turma['id_turma'] == $matricula['id_turma'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($turma['codigo_turma']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="matricula[status]">
                                    <option value="ativa" <?= $matricula['status'] == 'ativa' ? 'selected' : '' ?>>Ativa</option>
                                    <option value="cancelada" <?= $matricula['status'] == 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mt-2" id="campoMotivo" style="display: <?= $matricula['status'] == 'cancelada' ? 'block' : 'none' ?>;">
                            <div class="col-12">
                                <label for="motivo_cancelamento" class="form-label">Motivo do Cancelamento</label>
                                <input type="text" class="form-control" id="motivo_cancelamento" 
                                       name="matricula[motivo_cancelamento]" value="<?= $matricula['motivo_cancelamento'] ?? '' ?>">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save"></i> Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        // Toggle sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Máscaras para os campos
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
            $('#rg').mask('00.000.000-0');
            $('#telefone').mask('(00) 00000-0000');
            $('#cpf_responsavel').mask('000.000.000-00');
            $('#rg_responsavel').mask('00.000.000-0');
            $('#telefone_responsavel').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');
            
            // Mostrar/ocultar motivo de cancelamento
            $('#status').change(function() {
                if ($(this).val() === 'cancelada') {
                    $('#campoMotivo').show();
                } else {
                    $('#campoMotivo').hide();
                }
            });
        });

        // Busca de CEP
        function limpa_formulário_cep() {
            document.getElementById('logradouro').value = "";
            document.getElementById('bairro').value = "";
            document.getElementById('cidade').value = "";
            document.getElementById('estado').value = "";
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                document.getElementById('logradouro').value = conteudo.logradouro;
                document.getElementById('bairro').value = conteudo.bairro;
                document.getElementById('cidade').value = conteudo.localidade;
                document.getElementById('estado').value = conteudo.uf;
            } else {
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
            
        function pesquisacep(valor) {
            var cep = valor.replace(/\D/g, '');

            if (cep != "") {
                var validacep = /^[0-9]{8}$/;

                if(validacep.test(cep)) {
                    document.getElementById('logradouro').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('estado').value = "...";

                    var script = document.createElement('script');
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                    document.body.appendChild(script);
                } else {
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } else {
                limpa_formulário_cep();
            }
        }
    </script>
</body>
</html>