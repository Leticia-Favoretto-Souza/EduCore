<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../models/matricula_model.php';
require_once __DIR__ . '/../models/turma_model.php';

class AlunoController {
    private $inscricaoModel;
    private $matriculaModel;

    public function __construct($pdo) {
        $this->inscricaoModel = new InscricaoModel($pdo);
        $this->matriculaModel = new MatriculaModel($pdo);
    }
    
    public function atualizar($idInscricao, $dados) {
        // Atualiza dados da inscrição
        $this->inscricaoModel->atualizarInscricao($idInscricao, $dados['inscricao']);

        // Atualiza dados da matrícula, se houver
        if (!empty($dados['matricula']) && !empty($dados['matricula']['id'])) {
            $this->matriculaModel->atualizarMatricula($dados['matricula']['id'], $dados['matricula']);
            
            // Redireciona para a página de detalhes usando ID da matrícula
            header("Location: ../views/detalhes_aluno.php?id=" . $dados['matricula']['id']);
        } else {
            // Se não tiver matrícula, redireciona usando ID da inscrição
            header("Location: ../views/detalhes_aluno.php?id=$idInscricao");
        }
        exit;
    }

}

// Executa a atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AlunoController($conexao);

    $dados = [
        'inscricao' => $_POST['inscricao'],
        'matricula' => $_POST['matricula'] ?? null,
        'motivo_cancelamento' => $_POST['motivo_cancelamento'] ?? null
    ];

    $idInscricao = $_POST['inscricao']['id'] ?? null;

    if ($idInscricao) {
        $controller->atualizar($idInscricao, $dados);
    } else {
        die("ID da inscrição não informado.");
    }
} else {
    die("Requisição inválida.");
}
