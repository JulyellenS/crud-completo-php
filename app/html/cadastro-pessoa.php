<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro/Atualização de Pessoa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/css/style.css">
</head>
<body>
    <header>
        <nav>    
            <?php include 'navbar.php'; ?> <!-- Chama a navbar -->
        </nav>
    </header>
    <div class="container mt-5">
        <h2><?= isset($pessoa) ? 'Editar Pessoa' : 'Cadastrar Pessoa' ?></h2>
        <div class="linha"> </div>
        <form id="pessoaForm" action="<?= isset($pessoa) ? 'index.php?action=editar' : 'index.php?action=cadastrar' ?>" method="POST">
            <!-- Campo oculto para o ID da pessoa -->
            <input type="hidden" name="id_pessoa" value="<?= isset($pessoa['id_pessoa']) ? $pessoa['id_pessoa'] : '' ?>">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="nm_pessoa">Nome:</label>
                    <input type="text" class="form-control" id="nm_pessoa" name="nm_pessoa" value="<?= htmlspecialchars(isset($pessoa['nm_pessoa']) ? $pessoa['nm_pessoa'] : '') ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nu_cpf">CPF:</label>
                    <input type="text" class="form-control" id="nu_cpf" name="nu_cpf" value="<?= isset($pessoa['nu_cpf']) ? $pessoa['nu_cpf'] : '' ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="nu_registro">Núm. Registro:</label>
                    <input type="text" class="form-control" id="nu_registro" name="nu_registro" value="<?= isset($pessoa['nu_registro']) ? $pessoa['nu_registro'] : '' ?>">
                </div>
                <div class="form-group col-sm-4">
                    <label for="dt_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" value="<?= isset($pessoa['dt_nascimento']) ? date('Y-m-d', strtotime($pessoa['dt_nascimento'])) : '' ?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label for="sg_orgaoexpedidor">Orgão Expedidor:</label>
                    <input type="text" class="form-control" id="sg_orgaoexpedidor" name="sg_orgaoexpedidor" value="<?= isset($pessoa['sg_orgaoexpedidor']) ? $pessoa['sg_orgaoexpedidor'] : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="nu_cep">CEP:</label>
                    <input type="text" class="form-control" id="nu_cep" name="nu_cep" value="<?= isset($pessoa['nu_cep']) ? $pessoa['nu_cep'] : '' ?>" required>
                </div>
                <div class="form-group col-sm-8">
                    <label for="nm_rua">Rua:</label>
                    <input type="text" class="form-control" id="nm_rua" name="nm_rua" value="<?= isset($pessoa['nm_rua']) ? $pessoa['nm_rua'] : '' ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-2">
                    <label for="nu_endereco">Número:</label>
                    <input type="text" class="form-control" id="nu_endereco" name="nu_endereco" value="<?= isset($pessoa['nu_endereco']) ? $pessoa['nu_endereco'] : '' ?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label for="nm_bairro">Bairro:</label>
                    <input type="text" class="form-control" id="nm_bairro" name="nm_bairro" value="<?= isset($pessoa['nm_bairro']) ? $pessoa['nm_bairro'] : '' ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="ds_complemento">Complemento:</label>
                    <input type="text" class="form-control" id="ds_complemento" name="ds_complemento" value="<?= isset($pessoa['ds_complemento']) ? $pessoa['ds_complemento'] : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="nm_estado">Estado:</label>
                    <input type="text" class="form-control" id="nm_estado" name="nm_estado" value="<?= isset($pessoa['nm_estado']) ? $pessoa['nm_estado'] : '' ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nm_cidade">Cidade:</label>
                    <input type="text" class="form-control" id="nm_cidade" name="nm_cidade" value="<?= isset($pessoa['nm_cidade']) ? $pessoa['nm_cidade'] : '' ?>" required>
                </div>
            </div>
            <button type="submit" class="<?=isset($pessoa) ? 'btn btn-primary' : 'btn btn-success'?>"><?= isset($pessoa) ? 'Salvar Alterações' : 'Cadastrar' ?></button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('pessoaForm');

            form.addEventListener('submit', function (event) {
                let valid = true;

                // Validação de exemplo
                const nome = document.getElementById('nm_pessoa').value;
                if (nome.trim() === '') {
                    valid = false;
                    alert('O nome é obrigatório.');
                }

                // Se inválido, previne o envio
                if (!valid) {
                    event.preventDefault();
                }
            });

            // Exemplo de manipulação de exceções
            window.onerror = function (message, source, lineno, colno, error) {
                console.error('Erro detectado: ', message);
                return true; // Para evitar a exibição do erro padrão
            };
        });
    </script>
</body>
</html>
