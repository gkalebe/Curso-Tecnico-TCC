<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Larol</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="img/favicon1.png" type="image/x-icon">

    <style>
        /* Estilos CSS */
        .profile-picture {
            display: block;
            max-width: 200px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <?php
    session_start();

    if ((!isset($_SESSION['email_cliente']) || !isset($_SESSION['senha_cliente']))) {
        unset($_SESSION['email_cliente']);
        unset($_SESSION['senha_cliente']);
        header('Location: login.php');
    } else {
        $logado = $_SESSION['email_cliente'];
    }

    include_once('conecta.php');

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $data_nascimento = $_POST['data_nascimento'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $numero = $_POST['numero'];

        $update_query = "UPDATE cadastro_clientes SET email_cliente='$email', senha_cliente='$senha', data_nascimento_cliente='$data_nascimento', rg_cliente='$rg', cpf_cliente='$cpf', numero_cliente='$numero' WHERE email_cliente='$logado'";
        mysqli_query($conexao, $update_query);
    }

    $select_query = "SELECT * FROM cadastro_clientes WHERE email_cliente='$logado'";
    $result = mysqli_query($conexao, $select_query);
    $dados = mysqli_fetch_assoc($result);
    ?>

    <header>
        <!-- Código do cabeçalho -->
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

    <br><br><br><br>

  
<section class="barra_top">
    <div class="barra">
        <h1>Área do Usuário</h1>
        <a href="sair.php">Sair</a>
    </div>
</section>
    <?php
    echo "<h2>Olá, $logado</h2>";
?>
<p>Seja Bem-Vindo</p>
<form action="" method="post" enctype="multipart/form-data">
        <label for="profilePicture">Selecione uma foto de perfil (formato PNG):</label>
        <input type="file" id="profilePicture" name="profilePicture" accept=".png">
    
    
        <input type="submit" value="Fazer upload da imagem" name="submit">
    
</form>
<section class="usuario">
<?php
    if ($dados['profile_picture_filename']) {
        $profilePicture = "uploads/" . $dados['profile_picture_filename'];
        echo "<img class=\"profile-picture\" src=\"$profilePicture\" alt=\"Foto de perfil\">";
    }
?>

<form action="" method="post">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $dados['email_cliente']; ?>">
    
    
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="<?php echo $dados['senha_cliente']; ?>">
        <button type="button" id="mostrarSenha">Mostrar Senha</button>
    
        <label for="dataNascimento">Data de Nascimento:</label>
<input type="text" id="dataNascimento" name="data_nascimento" class="input-data" value="<?php echo $dados['data_nascimento_cliente']; ?>">

<label for="rg">RG:</label>
<input type="text" id="rg" name="rg" class="input-rg" value="<?php echo $dados['rg_cliente']; ?>">

<label for="cpf">CPF:</label>
<input type="text" id="cpf" name="cpf" class="input-cpf" value="<?php echo $dados['cpf_cliente']; ?>">

<label for="numero">Número de Telefone:</label>
<input type="text" id="numero" name="numero" class="input-numero" value="<?php echo isset($dados['numero_cliente']) ? $dados['numero_cliente'] : ''; ?>">

<input type="submit" value="Salvar Alterações" name="submit" class="btn-salvar">

</form> 

</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>

    <!-- Código do rodapé -->
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
