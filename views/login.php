<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css" />
    <title>Login</title>
</head>

<body>
    <div class="caixa">
        <div class="conteudo">
            <!-- Logo à esquerda -->
            <div class="logo-lado-esquerdo">
                <img src="../assets/img/logoEduCore.png" alt="logo" class="logo-fatec">
            </div>

            <!-- Formulário à direita -->
            <div class="form-lado-direito">
                <h1>Login</h1>
                <form id="loginForm" method="POST" action="./login.php">
                    <label for="usuario">E-mail</label>
                    <input type="email" id="usuario" placeholder="nome@email.com" required autocomplete="off"
                        name="email">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" required name="senha">
                    <a href="redefinir-senha.html">Esqueci minha senha</a>
                    <br /><br />
                    <div class="btnSubmit">
                        <input type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>