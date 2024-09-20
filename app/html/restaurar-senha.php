<?php
use App\Config\Conexao;

if (isset($_GET['ds_tokenrecuperacao']))
{
    $token = $_GET['ds_tokenrecuperacao'];
}
else
{
    echo 'Token inválido.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="page">
        <form class="formLogin" action="index.php?action=restaurarSenha" method="POST">
        <h2>Redefinir Senha</h2>
        <input type="hidden" name="ds_tokenrecuperacao" value="<?= $token ?>">

        <label for="ds_senha">Nova Senha:</label>
        <input type="password" name="ds_senha" required><br><br>

        <button type="submit">Redefinir Senha</button>
    </form>
</div>
</body>
</html>