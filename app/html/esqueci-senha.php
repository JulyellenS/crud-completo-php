<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a Senha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="page">
    <form class="formLogin" action="index.php?action=esqueciSenha" method="POST">
        <h2>Esqueci a Senha</h2>
        <label for="ds_email">Email:</label>
        <input type="email" name="ds_email" required><br><br>

        <button type="submit" class="btn btn-login">Enviar</button>
    </form>
    </div>
</body>
</html>
