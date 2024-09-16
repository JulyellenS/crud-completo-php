<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Pessoas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Listagem de Pessoas</h2>
        <a href="app/html/cadastro-pessoa.php" class="btn btn-success mb-3">Cadastrar</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?= $pessoa['id_pessoa'] ?></td>
                        <td><?= $pessoa['nm_pessoa'] ?></td>
                        <td><?= $pessoa['nu_cpf'] ?></td>
                        <td><?= date('d/m/Y', strtotime($pessoa['dt_nascimento'])) ?></td>
                        <td><?= $pessoa['nm_cidade'] ?></td>
                        <td>
                            <a href="app/control/PessoaList.php?action=editar&id_pessoa=<?= $pessoa['id_pessoa'] ?>" class="btn btn-sm btn-info">Editar</a>
                            <a href="app/control/PessoaList.php?action=excluir&id_pessoa=<?= $pessoa['id_pessoa'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>