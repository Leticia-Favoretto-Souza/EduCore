<?php
require_once __DIR__ . '/../database/conexao-banco.php';
require_once __DIR__ . '/../models/inscricao_model.php';
require_once __DIR__ . '/../models/matricula_model.php';
require_once __DIR__ . '/../models/turma_model.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID da inscrição não informado.");
}

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

<h2>Editar Aluno</h2>
<form method="POST" action="../controllers/editar_aluno.php">
    <input type="hidden" name="inscricao[id]" value="<?= $inscricao['id_inscricao'] ?>">
    <input type="hidden" name="matricula[id]" value="<?= $matricula['id_matricula'] ?? '' ?>">

    <fieldset>
        <legend>Dados do Aluno</legend>
        <label>Nome:
            <input type="text" name="inscricao[nome]" value="<?= htmlspecialchars($inscricao['nome']) ?>">
        </label><br>
        <label>Data de Nascimento:
            <input type="date" name="inscricao[data_nascimento]" value="<?= $inscricao['data_nascimento'] ?>">
        </label><br>
        <label>CPF:
            <input type="text" name="inscricao[cpf]" value="<?= $inscricao['cpf'] ?>">
        </label><br>
        <label>RG:
            <input type="text" name="inscricao[rg]" value="<?= $inscricao['rg'] ?>">
        </label><br>
        <label>Email:
            <input type="email" name="inscricao[email]" value="<?= $inscricao['email'] ?>">
        </label><br>
        <label>Telefone:
            <input type="text" name="inscricao[telefone]" value="<?= $inscricao['telefone'] ?>">
        </label><br>

        <label>Curso Desejado:
            <input type="text" name="inscricao[curso_desejado]" value="<?= $inscricao['curso_desejado'] ?>">
        </label><br>
        <label>Nível de Ensino:
            <input type="text" name="inscricao[nivel_ensino]" value="<?= $inscricao['nivel_ensino'] ?>">
        </label><br>

        <label>CEP:
            <input type="text" name="inscricao[cep]" value="<?= $inscricao['cep'] ?>">
        </label><br>
        <label>Logradouro:
            <input type="text" name="inscricao[logradouro]" value="<?= $inscricao['logradouro'] ?>">
        </label><br>
        <label>Número:
            <input type="text" name="inscricao[numero]" value="<?= $inscricao['numero'] ?>">
        </label><br>
        <label>Bairro:
            <input type="text" name="inscricao[bairro]" value="<?= $inscricao['bairro'] ?>">
        </label><br>
        <label>Cidade:
            <input type="text" name="inscricao[cidade]" value="<?= $inscricao['cidade'] ?>">
        </label><br>
        <label>Estado:
            <input type="text" name="inscricao[estado]" value="<?= $inscricao['estado'] ?>">
        </label><br>
        <label>Complemento:
            <input type="text" name="inscricao[complemento]" value="<?= $inscricao['complemento'] ?>">
        </label><br>
    </fieldset>

    <fieldset>
        <legend>Dados do Responsável (se houver)</legend>
        <label>Nome do Responsável:
            <input type="text" name="inscricao[nome_responsavel]" value="<?= $inscricao['nome_responsavel'] ?>">
        </label><br>
        <label>CPF do Responsável:
            <input type="text" name="inscricao[cpf_responsavel]" value="<?= $inscricao['cpf_responsavel'] ?>">
        </label><br>
        <label>RG do Responsável:
            <input type="text" name="inscricao[rg_responsavel]" value="<?= $inscricao['rg_responsavel'] ?>">
        </label><br>
        <label>Parentesco:
            <input type="text" name="inscricao[parentesco]" value="<?= $inscricao['parentesco'] ?>">
        </label><br>
        <label>Telefone do Responsável:
            <input type="text" name="inscricao[telefone_responsavel]" value="<?= $inscricao['telefone_responsavel'] ?>">
        </label><br>
        <label>Email do Responsável:
            <input type="email" name="inscricao[email_responsavel]" value="<?= $inscricao['email_responsavel'] ?>">
        </label><br>
    </fieldset>

    <?php if ($matricula): ?>
    <fieldset>
        <legend>Matrícula</legend>
        <label>Turma:
            <select name="matricula[id_turma]">
                <?php foreach ($turmas as $turma): ?>
                    <option value="<?= $turma['id_turma'] ?>" <?= $turma['id_turma'] == $matricula['id_turma'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($turma['codigo_turma']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Status:
            <select name="matricula[status]" id="statusMatricula">
                <option value="ativa" <?= $matricula['status'] == 'ativa' ? 'selected' : '' ?>>Ativa</option>
                <option value="cancelada" <?= $matricula['status'] == 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
            </select>
        </label><br>

        <div id="campoMotivo" style="display: <?= $matricula['status'] == 'cancelada' ? 'block' : 'none' ?>;">
            <label>Motivo do Cancelamento:
                <input type="text" name="matricula[motivo_cancelamento]" value="<?= $matricula['motivo_cancelamento'] ?? '' ?>">
            </label><br>
        </div>
    </fieldset>

    <?php endif; ?>

    <button type="submit">Salvar Alterações</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusSelect = document.getElementById('statusMatricula');
    const campoMotivo = document.getElementById('campoMotivo');

    function toggleMotivo() {
        if (statusSelect.value === 'cancelada') {
            campoMotivo.style.display = 'block';
        } else {
            campoMotivo.style.display = 'none';
        }
    }

    statusSelect.addEventListener('change', toggleMotivo);
    toggleMotivo(); // Executa ao carregar a página
});
</script>

