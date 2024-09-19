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
</head>
<body>
    <h2>Redefinir Senha</h2>
    <form action="index.php?action=restaurarSenha" method="POST">
        <input type="hidden" name="ds_tokenrecuperacao" value="<?= $token ?>">

        <label for="ds_senha">Nova Senha:</label>
        <input type="password" name="ds_senha" required><br><br>

        <button type="submit">Redefinir Senha</button>
    </form>
</body>
</html>