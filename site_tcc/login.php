<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lolja</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="img/favicon1.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="logo">
            <img src="img/favicon2.png" alt="logotipo T.I Lolja" width="100">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="mycart.php">Carrinho</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br>
    <div class="login" style="margin-top: 150px;">
        <div class="logar">
            <h1>Login</h1><br>
            <form action="veri.php" method="post">
                <input type="email" name="email" id="email_usuario" placeholder="Digite seu e-mail">
                <br>
                <input type="password" name="senha" id="senha_usuario" placeholder="Digite sua senha">
                <br>
                <input type="submit" name="submit" id="btn_logar" value="Entrar">
            </form><br><br>
        </div>
    </div>
    <br><br>

    <footer>
        <div class="rodape">
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="mycart.php">Carrinho</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </div>
        <div class="rodape">
            <p>Quadra 34 área especial 04</p>
            <p>Brazlândia, Brasília - DF, 72734-000</p>
        </div>
        <div class="rodape">
            <p>Siga as nossas Redes Sociais</p>
            <a href="#"><img src="img/facebook.png" alt="Facebook Larol"></a>
            <a href="#"><img src="img/instagram.png" alt="Instagram Larol"></a>
            <a href="#"><img src="img/youtube.png" alt="Youtube Larol"></a>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn_logar').click(function() {
                var email = $('#email_usuario').val();
                var senha = $('#senha_usuario').val();

                if (email.trim() === '' || senha.trim() === '') {
                    alert('Por favor, preencha todos os campos.');
                    return false;
                }
            });
        });
    </script>
</body>

</html>
