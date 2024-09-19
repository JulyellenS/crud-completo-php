<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a Senha</title>
</head>
<body>
    <h2>Esqueci a Senha</h2>
    <form action="index.php?action=esqueciSenha" method="POST">
        <label for="ds_email">Email:</label>
        <input type="email" name="ds_email" required><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
