<?php
session_start();

if (isset($_SESSION['id_usuario']))
{
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="page">
    <form id="loginForm" class="formLogin" action="index.php?action=entrar" method="POST">
        <h1>Login</h1>
        <p>Digite os seus dados de acesso no campo abaixo.</p>
        <label for="ds_email">E-mail</label>
        <input type="email" id="ds_email" name="ds_email" placeholder="Digite seu e-mail" autofocus="true" />
        <label for="ds_senha">Senha</label>
        <input type="password" id="ds_senha" name="ds_senha" placeholder="Digite a senha" />
        <a href="#">Esqueci minha senha</a>
        <input type="submit" value="Acessar" class="btn" />
    </form>

    </div>
    
</body>
</html>