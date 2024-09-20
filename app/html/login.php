<?php

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
    <link rel="stylesheet" href="app/css/login.css">
    <link rel="stylesheet" href="app/css/navbar.css">
    <link rel="stylesheet" href="app/css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?> <!-- Chama a navbar -->
<div class="page">
    <form id="loginForm" class="formLogin" action="index.php?action=entrar" method="POST">
        <h1>Login</h1>
        <div class="linha"> </div>
        <p>Digite os seus dados de acesso no campo abaixo.</p>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="ds_email">E-mail</label>
                <input type="email" id="ds_email" name="ds_email" placeholder="Digite seu e-mail" autofocus="true" autocomplete="current-password" required/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="ds_senha">Senha</label>
                <input type="password" id="ds_senha" name="ds_senha" placeholder="Digite a senha" autocomplete="current-password" required/>
            </div>
        </div>
        <a href="esqueci-senha.php">Esqueci minha senha</a>
        <input type="submit" value="Acessar" class="btn btn-login" />
    </form>
</div>
    
</body>
</html>