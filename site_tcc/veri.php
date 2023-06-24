<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Conexão com o banco de dados usando MySQLi
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "site_tcc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM cadastro_clientes WHERE email_cliente = '$email' AND senha_cliente = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuário autenticado com sucesso, definir as variáveis de sessão e redirecionar para a página do usuário
        $_SESSION['email_cliente'] = $email;
        $_SESSION['senha_cliente'] = $senha;
        header('Location: usuario.php');
        exit();
    } else {
        // Credenciais inválidas, redirecionar para a página de login
        header('Location: login.php');
        exit();
    }

    $conn->close();
} else {
    // Redirecionar para a página de login se o formulário não foi submetido
    header('Location: login.php');
    exit();
}
?>
