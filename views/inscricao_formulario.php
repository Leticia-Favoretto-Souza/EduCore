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
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../assets/css/style.css">
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
                <form id="formInscricao" action="../controllers/processa_inscricao.php" method="post" enctype="multipart/form-data">

                    <!-- Dados Pessoais -->
                    <div class="form-section">
                        <div class="section-title"><i class="bi bi-person-vcard"></i> Dados Pessoais</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="col-md-6">
                                <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                            </div>
                            <div class="col-md-6">
                                <label for="rg" class="form-label">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" placeholder="00.000.000-0">
                            </div>
                        </div>
                    </div>

                    <!-- Contato -->
                    <div class="form-section">
                        <div class="section-title"><i class="bi bi-telephone"></i> Contato</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                            </div>
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="form-section">
                        <div class="section-title"><i class="bi bi-house-door"></i> Endereço</div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" onblur="pesquisacep(this.value)">
                            </div>
                            <div class="col-md-7">
                                <label for="rua" class="form-label">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua">
                            </div>
                            <div class="col-md-2">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero">
                            </div>
                            <div class="col-md-4">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro">
                            </div>
                            <div class="col-md-4">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade">
                            </div>
                            <div class="col-md-4">
                                <label for="uf" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="uf" name="uf">
                            </div>
                            <div class="col-12">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento">
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
                            </div>
                            <div class="col-md-6">
                                <label for="cursoDesejado" class="form-label">Curso desejado</label>
                                <select class="form-select" id="cursoDesejado" name="cursoDesejado" required>
                                    <option selected disabled value="">Selecione</option>
                                    <option value="preVestibulinho">Pré-vestibulinho</option>
                                    <option value="preVestibular">Pré-vestibular</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Foto -->
                    <div class="form-section">
                        <div class="section-title"><i class="bi bi-camera-fill"></i> Foto 3x4</div>
                        <div class="col-md-6">
                            <label for="foto" class="form-label">Foto 3x4 (JPEG ou PNG, máx. 2MB)</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/jpeg" required>
                            <div class="form-text file-name">Nenhum arquivo selecionado</div>
                        </div>
                    </div>


                    <!-- Responsável -->
                    <div id="responsavel-section" class="form-section" style="display: none;">
                        <div class="section-title"><i class="bi bi-person-badge"></i> Informações do Responsável</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nomeResponsavel" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nomeResponsavel" name="nomeResponsavel">
                            </div>
                            <div class="col-md-6">
                                <label for="cpfResponsavel" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpfResponsavel" name="cpfResponsavel" placeholder="000.000.000-00">
                            </div>
                            <div class="col-md-6">
                                <label for="rgResponsavel" class="form-label">RG</label>
                                <input type="text" class="form-control" id="rgResponsavel" name="rgResponsavel" placeholder="00.000.000-0">
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
                                    <option>Outro</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="telefoneResponsavel" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="telefoneResponsavel" name="telefoneResponsavel" placeholder="(00) 00000-0000">
                            </div>
                            <div class="col-md-6">
                                <label for="emailResponsavel" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="emailResponsavel" name="emailResponsavel" placeholder="exemplo@email.com">
                            </div>
                        </div>
                    </div>

                    <!-- Botão -->
                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save-fill me-2"></i> Finalizar inscrição
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

        document.getElementById('foto').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Nenhum arquivo selecionado';
            document.querySelector('.file-name').textContent = fileName;
        });

        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert("O arquivo excede o limite de 2MB.");
                    e.target.value = ''; // Limpa o campo
                    document.querySelector('.file-name').textContent = 'Nenhum arquivo selecionado';
                } else {
                    document.querySelector('.file-name').textContent = file.name;
                }
            } else {
                document.querySelector('.file-name').textContent = 'Nenhum arquivo selecionado';
            }
        });


    </script>
</body>
</html>