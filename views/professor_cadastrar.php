<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Professor</title>
</head>
<body>
    <h2>Cadastrar Novo Professor</h2>
    <form action="../controllers/cadastrar_professor.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>CPF:</label>
        <input type="text" name="cpf" required><br>

        <label>RG:</label>
        <input type="text" name="rg"><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" required><br>

        <label>Especialização:</label>
        <input type="text" name="especializacao"><br>

        <label>Formação:</label>
        <input type="text" name="formacao"><br>

        <label>Data de Contratação:</label>
        <input type="date" name="data_contratacao"><br>

        <label>Status:</label>
        <select name="status">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
            <option value="afastado">Afastado</option>
        </select><br><br>

        <input type="submit" value="Salvar Professor">
    </form>
</body>
</html>
