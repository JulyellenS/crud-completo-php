<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <header>
        <nav>    
            <?php include 'navbar.php'; ?> <!-- Chama a navbar -->
        </nav>
    </header>
    <div class="page">
        <form class="formLogin" action="cadastro_action.php" method="POST">
            <h2>Cadastro de Usuário</h2>
            <label for="nm_usuario">Nome:</label>
            <input type="text" name="nome" required><br><br>

            <label for="ds_email">Email:</label>
            <input type="email" name="ds_email" required><br><br>

            <label for="ds_senha">Senha:</label>
            <input type="password" name="ds_senha" required><br><br>

            <label for="ds_confirmasenha">Confirme a Senha:</label>
            <input type="password" name="ds_confirmasenha" required><br><br>

            <button type="submit" class="btn">Cadastrar</button>
        </form>
    </div>
</body>
</html>
