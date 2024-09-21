<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="app/css/navbar.css"> -->
    <link rel="stylesheet" href="app/css/style.css">
</head>
<body>
    <header>
        <nav>
            <?php include 'navbar.php'; ?>
        </nav>
    </header>
    <div class="container mt-5">
        <h1>Bem-vindo à Página Inicial</h1>
        <p>Esta é a página inicial do seu aplicativo.</p>
        <div class="linha"></div>
        <p>Aqui você pode adicionar informações relevantes, links ou qualquer outro conteúdo que desejar.</p>
        <?php if (isset($_SESSION['id_usuario'])): ?>
            <p>Olá, <?= htmlspecialchars($_SESSION['nm_usuario']); ?>! Você está logado.</p>
        <?php else: ?>
            <p>Por favor, <a href="login.php">faça login</a> para acessar mais recursos.</p>
        <?php endif; ?>
    </div>
</body>
</html>
