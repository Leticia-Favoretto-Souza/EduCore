<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Inscrição</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
        require_once 'components/cabecalho.php';
    ?>

    <!-- Conteúdo principal -->
    <div class="main-container">
        <div class="form-container">
            <!-- Cabeçalho do formulário -->
            <div class="form-header">
                <h1><i class="bi bi-person-plus-fill"></i>  Ficha de Inscrição</h1>
                <p>Preencha o formulário para se inscrever em nossos cursos preparatórios</p>
            </div>
            
            <!-- Corpo do formulário -->
            <div class="form-body">
                <form action="processa_inscricao.php" method="post">
                    <!-- Dados Pessoais -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="bi bi-person-vcard"></i> Dados Pessoais
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="nome">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="dataNascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" placeholder="00.000.000-0">
                            </div>
                        </div>
                    </div>

                    <!-- Contato -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="bi bi-telephone"></i> Contato
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="telefone">Telefone</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                            </div>
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="bi bi-house-door"></i> Endereço
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="cep">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" onblur="pesquisacep(this.value)">
                            </div>
                            <div class="col-md-7">
                                <label class="form-label" for="rua">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="numero">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="uf">Estado</label>
                                <input type="text" class="form-control" id="uf" name="uf">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento">
                            </div>
                        </div>
                    </div>

                    <!-- Dados Acadêmicos -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="bi bi-book"></i> Dados Acadêmicos
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="nivelEnsino">Nível de Ensino</label>
                                <select class="form-control" id="nivelEnsino" name="nivelEnsino" required onchange="mostrarAnosEscolares()">
                                    <option selected disabled value="">Selecione</option>
                                    <option value="fundamental">Ensino Fundamental</option>
                                    <option value="medio">Ensino Médio</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="anoEscolarContainer" style="display: none;">
                                <label class="form-label" for="anoEscolar">Ano Escolar</label>
                                <select class="form-control" id="anoEscolar" name="anoEscolar" required>
                                    <!-- Opções serão preenchidas dinamicamente -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="curso">Curso</label>
                                <input type="text" class="form-control" id="curso" name="cursoDesejado" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Seção do Responsável -->
                    <div id="responsavel-section" class="form-section" style="display: none;">
                        <div class="section-title">
                            <i class="bi bi-person-badge"></i> Informações do Responsável
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="nomeResponsavel">Nome Completo</label>
                                <input type="text" class="form-control" id="nomeResponsavel" name="nomeResponsavel">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="cpfResponsavel">CPF</label>
                                <input type="text" class="form-control" id="cpfResponsavel" name="cpfResponsavel" placeholder="000.000.000-00">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="rgResponsavel">RG</label>
                                <input type="text" class="form-control" id="rgResponsavel" name="rgResponsavel" placeholder="00.000.000-0">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="parentesco">Parentesco</label>
                                <select class="form-control" id="parentesco" name="parentesco">
                                    <option selected disabled value="">Selecione...</option>
                                    <option>Pai</option>
                                    <option>Mãe</option>
                                    <option>Tutor Legal</option>
                                    <option>Avô/Avó</option>
                                    <option>Tio/Tia</option>
                                    <option>Outro</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="telefoneResponsavel">Telefone</label>
                                <input type="tel" class="form-control" id="telefoneResponsavel" name="telefoneResponsavel" placeholder="(00) 00000-0000">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="emailResponsavel">E-mail</label>
                                <input type="email" class="form-control" id="emailResponsavel" name="emailResponsavel" placeholder="exemplo@email.com">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botão de envio -->
                    <div class="btn-container">
                        <button type="submit" class="btn-submit">
                            <i class="bi bi-save-fill me-2"></i>Finalizar inscrição
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        require_once 'components/rodape.php';
    ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Máscaras para formulário -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        // Seus scripts JavaScript permanecem os mesmos
        $(document).ready(function(){
            // Máscaras para os campos
            $('#cpf').mask('000.000.000-00');
            $('#rg').mask('00.000.000-0');
            $('#telefone').mask('(00) 00000-0000');
            $('#cpfResponsavel').mask('000.000.000-00');
            $('#rgResponsavel').mask('00.000.000-0');
            $('#telefoneResponsavel').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');
            
            // Verificação de menoridade
            $('#dataNascimento').change(function() {
                var dataNascimento = new Date($(this).val());
                var hoje = new Date();
                var idade = hoje.getFullYear() - dataNascimento.getFullYear();
                var mes = hoje.getMonth() - dataNascimento.getMonth();
                
                if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
                    idade--;
                }
                
                if (idade < 18) {
                    $('#responsavel-section').fadeIn();
                    $('#nomeResponsavel, #cpfResponsavel, #parentesco').prop('required', true);
                } else {
                    $('#responsavel-section').fadeOut();
                    $('#nomeResponsavel, #cpfResponsavel, #parentesco').prop('required', false);
                    $('#nomeResponsavel, #cpfResponsavel, #rgResponsavel, #telefoneResponsavel, #emailResponsavel').val('');
                    $('#parentesco').prop('selectedIndex', 0);
                }
            });
        });

        function mostrarAnosEscolares() {
            const nivelEnsino = document.getElementById('nivelEnsino').value;
            const container = document.getElementById('anoEscolarContainer');
            const select = document.getElementById('anoEscolar');
            const cursoInput = document.getElementById('curso');
            
            select.innerHTML = '';
            
            if (nivelEnsino === 'fundamental') {
                ['6º Ano', '7º Ano', '8º Ano', '9º Ano'].forEach(ano => {
                    const option = document.createElement('option');
                    option.value = ano;
                    option.textContent = ano;
                    select.appendChild(option);
                });
                container.style.display = 'block';
                cursoInput.value = 'Pré-vestibulinho';
            } else if (nivelEnsino === 'medio') {
                ['1º Ano', '2º Ano', '3º Ano'].forEach(ano => {
                    const option = document.createElement('option');
                    option.value = ano;
                    option.textContent = ano;
                    select.appendChild(option);
                });
                container.style.display = 'block';
                cursoInput.value = 'Pré-vestibular';
            } else {
                container.style.display = 'none';
                cursoInput.value = '';
            }
        }

        function limpa_formulário_cep() {
            document.getElementById('rua').value = "";
            document.getElementById('bairro').value = "";
            document.getElementById('cidade').value = "";
            document.getElementById('uf').value = "";
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                document.getElementById('rua').value = conteudo.logradouro;
                document.getElementById('bairro').value = conteudo.bairro;
                document.getElementById('cidade').value = conteudo.localidade;
                document.getElementById('uf').value = conteudo.uf;
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
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

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