<?php
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../database/conexao-banco.php';

// Configurações de resposta
header('Content-Type: application/json');

try {
    // Verifica se é uma requisição POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Método não permitido", 405);
    }

    // Obtém conexão PDO
    global $conexao;
    $model = new InscricaoModel($conexao);

    // Upload da imagem do aluno
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $arquivo_tmp = $_FILES['foto']['tmp_name'];
        $nomeImagem = $_FILES['foto']['name'];
        $extensao = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));

        if (in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'])) {
            $novoNome = uniqid('foto_', true) . '.' . $extensao;
            $destino = __DIR__ . '../../public/uploads/' . $novoNome;

            if (!move_uploaded_file($arquivo_tmp, $destino)) {
                throw new Exception('Erro ao mover a imagem enviada');
            }

            $caminhoFoto = 'uploads/' . $novoNome;
        } else {
            throw new Exception('Formato de imagem inválido. Use jpg, jpeg, png ou gif');
        }
    } else {
        throw new Exception('A foto é obrigatória');
    }

    // Valida e sanitiza os dados do formulário
    $dadosFormulario = [
        'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
        'data_nascimento' => $_POST['dataNascimento'] ?? '',
        'cpf' => $_POST['cpf'] ?? '',
        'rg' => $_POST['rg'] ?? '',
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'telefone' => $_POST['telefone'] ?? '',
        'cep' => $_POST['cep'] ?? '',
        'logradouro' => $_POST['rua'] ?? '',
        'numero' => $_POST['numero'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'bairro' => $_POST['bairro'] ?? '',
        'estado' => $_POST['uf'] ?? '',
        'complemento' => $_POST['complemento'] ?? '',
        'nivel_ensino' => $_POST['nivelEnsino'] ?? '',
        'curso_desejado' => $_POST['cursoDesejado'] ?? '',
        'nome_responsavel' => $_POST['nomeResponsavel'] ?? '',
        'cpf_responsavel' => $_POST['cpfResponsavel'] ?? '',
        'rg_responsavel' => $_POST['rgResponsavel'] ?? '',
        'parentesco' => $_POST['parentesco'] ?? '',
        'telefone_responsavel' => $_POST['telefoneResponsavel'] ?? '',
        'email_responsavel' => $_POST['emailResponsavel'] ?? '',
        'foto' => $caminhoFoto // Caminho salvo no banco
    ];

    // Validação básica dos campos obrigatórios
    $camposObrigatorios = ['nome', 'data_nascimento', 'cpf', 'email', 'telefone', 'nivel_ensino', 'foto'];
    foreach ($camposObrigatorios as $campo) {
        if (empty($dadosFormulario[$campo])) {
            throw new Exception("O campo $campo é obrigatório", 400);
        }
    }

    // Processa a inscrição
    $idInscricao = $model->salvarInscricao($dadosFormulario);

    if ($idInscricao === false) {
        throw new Exception("Erro ao processar inscrição", 500);
    }

    // Resposta de sucesso
    echo json_encode([
        'success' => true,
        'id' => $idInscricao,
        'message' => 'Inscrição realizada com sucesso!'
    ]);

} catch (Exception $e) {
    // Resposta de erro
    http_response_code($e->getCode() ?: 500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
