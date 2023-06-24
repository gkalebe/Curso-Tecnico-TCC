<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Larol</title>
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

    <!-- Cadastro -->
    <div class="cadastro" style="margin-top: 188px">
        <div class="cad" id="cadastro">
            <h1>Cadastro</h1>
            <form action="cadastro.php" method="post">
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required><br>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required><br>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required><br>
                <input type="radio" id="feminino" value="F" name="sexo" required>Feminino
                <input type="radio" id="masculino" value="M" name="sexo" required>Masculino<br>
                <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço" required><br>
                <input type="tel" id="telefone" name="telefone" placeholder="Digite seu número de telefone" required><br>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required><br>
                <input type="text" id="rg" name="rg" placeholder="Digite seu RG" required><br>
                <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Digite sua data de nascimento" required><br>
                <input type="submit" name="submit" id="button" value="Cadastrar">
            </form>
        </div>
    </div>

    <!-- PHP CONFIG -->
    <?php
    if (isset($_POST['submit'])) {
        include_once('conecta.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sexo = $_POST['sexo'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $data_nascimento = $_POST['data_nascimento'];

        
        $senha_forte = verificarSenhaForte($senha);

        if ($senha_forte) {
            $clientes = mysqli_query($conexao, "INSERT INTO cadastro_clientes (nome_cliente, email_cliente, senha_cliente, sexo_cliente, endereco_cliente, telefone_cliente, cpf_cliente, rg_cliente, data_nascimento_cliente) VALUES ('$nome', '$email', '$senha', '$sexo', '$endereco', '$telefone', '$cpf', '$rg', '$data_nascimento')");

            header('Location: login.php');
        } else {
            echo "<script>alert('A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.');</script>";
        }
    }

    function verificarSenhaForte($senha)
    {
        
        if (strlen($senha) < 8) {
            return false;
        }

        
        if (!preg_match('/[A-Z]/', $senha)) {
            return false;
        }

        
        if (!preg_match('/[a-z]/', $senha)) {
            return false;
        }

        
        if (!preg_match('/[0-9]/', $senha)) {
            return false;
        }

    
        if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $senha)) {
            return false;
        }

        return true;
    }
    ?>

    <br><br><Br><Br><br><BR><BR><br><br><br><br>

    <!-- Rodapé -->
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
</body>

</html>
