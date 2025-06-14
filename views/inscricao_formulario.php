<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ficha de Inscrição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <style>
        /* Estilo para o modal de sucesso */
        .modal-success {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-success-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .modal-success-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }
        .modal-success-btn {
            margin-top: 20px;
            padding: 10px 25px;
        }
    </style>
</head>
<body>

<?php require_once 'components/cabecalho.php'; ?>

<div class="main-container">
    <div class="form-container">
        <div class="form-header">
            <h1><i class="bi bi-person-plus-fill"></i> Ficha de Inscrição</h1>
            <p>Preencha o formulário para se inscrever em nossos cursos preparatórios</p>
        </div>

        <div class="form-body">
            <form id="formInscricao" action="../controllers/processa_inscricao.php" method="post" enctype="multipart/form-data" novalidate>
                
                <!-- Dados Pessoais -->
                <div class="form-section">
                    <div class="section-title"><i class="bi bi-person-vcard"></i> Dados Pessoais</div>
                    <div class="row">
                        <!-- Nome, Data Nascimento, CPF, RG -->
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required />
                            <div class="invalid-feedback">Por favor, preencha o nome completo.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required />
                            <div class="invalid-feedback">Por favor, informe uma data de nascimento válida.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required />
                            <div class="invalid-feedback">CPF inválido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="rg" class="form-label">RG</label>
                            <input type="text" class="form-control" id="rg" name="rg" required />
                            <div class="invalid-feedback">RG inválido.</div>
                        </div>
                    </div>
                </div>

                <!-- Contato -->
                <div class="form-section">
                    <div class="section-title"><i class="bi bi-telephone"></i> Contato</div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required />
                            <div class="invalid-feedback">Por favor, informe um e-mail válido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" required />
                            <div class="invalid-feedback">Por favor, informe um telefone válido.</div>
                        </div>
                    </div>
                </div>

                <!-- Endereço -->
                <div class="form-section">
                    <div class="section-title"><i class="bi bi-house-door"></i> Endereço</div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" onblur="pesquisacep(this.value)" required />
                            <div class="invalid-feedback">CEP inválido.</div>
                        </div>
                        <div class="col-md-7">
                            <label for="rua" class="form-label">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua" required />
                            <div class="invalid-feedback">Por favor, preencha a rua.</div>
                        </div>
                        <div class="col-md-2">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" required />
                            <div class="invalid-feedback">Por favor, preencha o número.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" required />
                            <div class="invalid-feedback">Por favor, preencha o bairro.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required />
                            <div class="invalid-feedback">Por favor, preencha a cidade.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="uf" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="uf" name="uf" required />
                            <div class="invalid-feedback">Por favor, preencha o estado.</div>
                        </div>
                        <div class="col-12">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" />
                        </div>
                    </div>
                </div>

                <!-- Dados Acadêmicos -->
                <div class="form-section">
                    <div class="section-title"><i class="bi bi-book"></i> Dados Acadêmicos</div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nivelEnsino" class="form-label">Nível de Ensino</label>
                            <select class="form-select" id="nivelEnsino" name="nivelEnsino" required>
                                <option selected disabled value="">Selecione</option>
                                <option value="fundamentalCursando">Ensino Fundamental - cursando</option>
                                <option value="medioCursando">Ensino Médio - cursando</option>
                                <option value="medioCompleto">Ensino Médio - completo</option>
                            </select>
                            <div class="invalid-feedback">Por favor, selecione o nível de ensino.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="cursoDesejado" class="form-label">Curso desejado</label>
                            <select class="form-select" id="cursoDesejado" name="cursoDesejado" required>
                                <option selected disabled value="">Selecione</option>
                                <option value="preVestibulinho">Pré-vestibulinho</option>
                                <option value="preVestibular">Pré-vestibular</option>
                            </select>
                            <div class="invalid-feedback">Por favor, selecione o curso desejado.</div>
                        </div>
                    </div>
                </div>

                <!-- Foto -->
                <div class="form-section">
                    <div class="section-title"><i class="bi bi-camera-fill"></i> Foto 3x4</div>
                    <div class="col-md-6">
                        <label for="foto" class="form-label">Foto 3x4 (JPEG ou PNG, máx. 2MB)</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/jpeg" required />
                        <div class="form-text file-name">Nenhum arquivo selecionado</div>
                        <div class="invalid-feedback">Por favor, selecione uma foto válida com até 2MB.</div>
                    </div>
                </div>

                <!-- Responsável -->
                <div id="responsavel-section" class="form-section" style="display: none;">
                    <div class="section-title"><i class="bi bi-person-badge"></i> Informações do Responsável</div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nomeResponsavel" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nomeResponsavel" name="nomeResponsavel" />
                            <div class="invalid-feedback">Por favor, preencha o nome do responsável.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="cpfResponsavel" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpfResponsavel" name="cpfResponsavel" />
                            <div class="invalid-feedback">CPF inválido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="rgResponsavel" class="form-label">RG</label>
                            <input type="text" class="form-control" id="rgResponsavel" name="rgResponsavel" />
                            <div class="invalid-feedback">RG inválido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="parentesco" class="form-label">Parentesco</label>
                            <select class="form-select" id="parentesco" name="parentesco">
                                <option selected disabled value="">Selecione</option>
                                <option>Pai</option>
                                <option>Mãe</option>
                                <option>Tutor Legal</option>
                                <option>Avô/Avó</option>
                                <option>Tio/Tia</option>
                                <option value="outro">Outro</option>
                            </select>
                            <div class="invalid-feedback">Por favor, informe o grau de parentesco.</div>
                        </div>
                        <div class="col-md-6" id="outroParentescoContainer" style="display: none;">
                            <label for="outroParentesco" class="form-label">Especifique o parentesco</label>
                            <input type="text" class="form-control" id="outroParentesco" name="outroParentesco" />
                            <div class="invalid-feedback">Por favor, especifique o parentesco.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="telefoneResponsavel" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefoneResponsavel" name="telefoneResponsavel" />
                            <div class="invalid-feedback">Telefone inválido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="emailResponsavel" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="emailResponsavel" name="emailResponsavel" />
                            <div class="invalid-feedback">Por favor, informe um e-mail válido.</div>
                        </div>
                    </div>
                </div>

                <!-- Senha -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required />
                        <div class="invalid-feedback">A senha deve ter pelo menos 6 caracteres.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" required />
                        <div class="invalid-feedback">As senhas devem ser iguais.</div>
                    </div>
                </div>

                <!-- Botão -->
                <div class="btn-container mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save-fill me-2"></i> Finalizar inscrição
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Sucesso -->
<div id="modalSuccess" class="modal-success">
    <div class="modal-success-content">
        <div class="modal-success-icon">
            <i class="bi bi-check-circle-fill"></i>
        </div>
        <h3>Inscrição realizada com sucesso!</h3>
        <p>Sua inscrição foi concluída e está sendo processada. Você receberá um e-mail de confirmação em breve.</p>
        <button id="btnCloseModal" class="btn btn-success modal-success-btn">
            <i class="bi bi-check-circle me-2"></i> Fechar
        </button>
    </div>
</div>

<?php require_once 'components/rodape.php'; ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
// Máscaras
$(document).ready(function() {
    $('#cpf, #cpfResponsavel').mask('000.000.000-00');
    $('#rg, #rgResponsavel').mask('00.000.000-0');
    $('#telefone, #telefoneResponsavel').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');

    $('#dataNascimento').change(verificarIdade);
    $('#foto').change(function () {
        const fileName = $(this).val().split('\\').pop();
        $(this).siblings('.file-name').text(fileName || 'Nenhum arquivo selecionado');
    });

    // Validação em tempo real para campos obrigatórios
    $('input, select').on('blur', function() {
        validarCampo($(this));
    });
});

function validarCampo(campo) {
    const value = campo.val();
    const id = campo.attr('id');
    
    // Verificar se o campo está vazio (para campos obrigatórios)
    if (campo.prop('required') && !value) {
        campo.addClass('is-invalid');
        return false;
    }
    
    // Validações específicas por tipo de campo
    switch(id) {
        case 'email':
        case 'emailResponsavel':
            if (!validarEmail(value)) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
            
        case 'telefone':
        case 'telefoneResponsavel':
            if (!validarTelefone(value)) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
            
        case 'cpf':
        case 'cpfResponsavel':
            if (!validarCPF(value)) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
            
        case 'rg':
        case 'rgResponsavel':
            if (!validarRG(value)) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
            
        case 'senha':
            if (value.length < 6) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
            
        case 'confirmarSenha':
            if (value !== $('#senha').val()) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
            
        case 'foto':
            if (!validarFoto()) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
            
        case 'outroParentesco':
            if ($('#parentesco').val() === 'outro' && !value) {
                campo.addClass('is-invalid');
                return false;
            }
            break;
    }
    
    // Se passou em todas as validações
    campo.removeClass('is-invalid');
    return true;
}

// Validação final antes de enviar
function validarFormulario() {
    let formIsValid = true;
    
    // Validar todos os campos obrigatórios
    $('input[required], select[required]').each(function() {
        if (!validarCampo($(this))) {
            formIsValid = false;
        }
    });
    
    // Validar campos condicionais (responsável)
    if ($('#responsavel-section').is(':visible')) {
        $('input, select', '#responsavel-section').each(function() {
            if ($(this).prop('required') && !validarCampo($(this))) {
                formIsValid = false;
            }
        });
    }
    
    // Validar senha e confirmação
    if ($('#senha').val() !== $('#confirmarSenha').val()) {
        $('#confirmarSenha').addClass('is-invalid');
        formIsValid = false;
    }
    
    return formIsValid;
}

// Validação de email
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Validação de telefone
function validarTelefone(telefone) {
    const limpo = telefone.replace(/\D/g, '');
    return limpo.length === 11;
}

// Validação oficial de CPF
function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    
    // Verifica se tem 11 dígitos e não é uma sequência repetida
    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        return false;
    }
    
    // Validação dos dígitos verificadores
    let soma = 0;
    let resto;
    
    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    
    if ((resto === 10) || (resto === 11)) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.substring(9, 10))) {
        return false;
    }
    
    soma = 0;
    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.substring(i-1, i)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    
    if ((resto === 10) || (resto === 11)) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.substring(10, 11))) {
        return false;
    }
    
    return true;
}

// Validação de RG
function validarRG(rg) {
    const limpo = rg.replace(/\D/g, '');
    return limpo.length >= 7;
}

// Validação de foto
function validarFoto() {
    const foto = $('#foto')[0].files[0];
    if (!foto) return false;
    
    // Verificar tamanho máximo (2MB)
    if (foto.size > 2 * 1024 * 1024) {
        return false;
    }
    
    // Verificar tipo de arquivo
    const tiposPermitidos = ['image/jpeg', 'image/png'];
    return tiposPermitidos.includes(foto.type);
}

// Verificar idade para mostrar responsável
function verificarIdade() {
    const data = new Date($('#dataNascimento').val());
    if (isNaN(data.getTime())) return;
    
    const hoje = new Date();
    let idade = hoje.getFullYear() - data.getFullYear();
    if (hoje.getMonth() < data.getMonth() || (hoje.getMonth() === data.getMonth() && hoje.getDate() < data.getDate())) idade--;

    if (idade < 18) {
        $('#responsavel-section').show();
        $('#responsavel-section input, #responsavel-section select').attr('required', true);
    } else {
        $('#responsavel-section').hide();
        $('#responsavel-section input, #responsavel-section select').attr('required', false).removeClass('is-invalid');
    }
}

// Mostrar campo "Outro parentesco" quando selecionado
$('#parentesco').change(function() {
    if ($(this).val() === 'outro') {
        $('#outroParentescoContainer').show();
        $('#outroParentesco').attr('required', true);
    } else {
        $('#outroParentescoContainer').hide();
        $('#outroParentesco').attr('required', false).removeClass('is-invalid');
    }
});

// ViaCEP
function limpa_formulário_cep() {
    ['rua', 'bairro', 'cidade', 'uf'].forEach(id => document.getElementById(id).value = '');
}

function pesquisacep(valor) {
    const cep = valor.replace(/\D/g, '');
    if (cep.length === 8) {
        const script = document.createElement('script');
        script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
        document.body.appendChild(script);
    } else {
        limpa_formulário_cep();
        $('#cep').addClass('is-invalid');
    }
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('rua').value = conteudo.logradouro;
        document.getElementById('bairro').value = conteudo.bairro;
        document.getElementById('cidade').value = conteudo.localidade;
        document.getElementById('uf').value = conteudo.uf;
        $('#cep').removeClass('is-invalid');
    } else {
        limpa_formulário_cep();
        $('#cep').addClass('is-invalid');
    }
}

// Validação ao enviar o formulário
$('#formInscricao').on('submit', function(e) {
    e.preventDefault();
    
    // Validar todos os campos
    const isValid = validarFormulario();
    
    if (isValid) {
        // Criar FormData para enviar os dados do formulário
        const formData = new FormData(this);
        
        // Adicionar campos extras se necessário
        if ($('#responsavel-section').is(':visible')) {
            formData.append('nomeResponsavel', $('#nomeResponsavel').val());
            formData.append('cpfResponsavel', $('#cpfResponsavel').val());
            formData.append('rgResponsavel', $('#rgResponsavel').val());
            formData.append('parentesco', $('#parentesco').val());
            formData.append('telefoneResponsavel', $('#telefoneResponsavel').val());
            formData.append('emailResponsavel', $('#emailResponsavel').val());
            
            // Se for "outro" parentesco, adicionar o valor do campo
            if ($('#parentesco').val() === 'outro') {
                formData.append('outroParentesco', $('#outroParentesco').val());
            }
        }
        
        // Enviar via AJAX
        $.ajax({
            url: '../controllers/processa_inscricao.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Mostrar modal de sucesso
                    $('#modalSuccess').fadeIn();
                } else {
                    // Mostrar mensagem de erro
                    alert('Erro: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Tratar erros de conexão
                alert('Erro ao enviar formulário: ' + error);
            }
        });
    } else {
        // Rolar até o primeiro erro
        $('html, body').animate({
            scrollTop: $(".is-invalid").first().offset().top - 100
        }, 500);
    }
});

// Fechar modal e redirecionar
$('#btnCloseModal').click(function() {
    $('#modalSuccess').fadeOut();
    window.location.href = 'dashboard_aluno.php'; // Altere para o caminho correto
});
</script>

</body>
</html>