<?php

session_start();

unset($_SESSION['email_cliente']);
unset($_SESSION['senha_cliente']);

header('Location:index.html');

?>