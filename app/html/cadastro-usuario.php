<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="cadastro_action.php" method="POST">
        <label for="nm_usuario">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="ds_email">Email:</label>
        <input type="email" name="ds_email" required><br><br>

        <label for="ds_senha">Senha:</label>
        <input type="password" name="ds_senha" required><br><br>

        <label for="ds_confirmasenha">Confirme a Senha:</label>
        <input type="password" name="ds_confirmasenha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
