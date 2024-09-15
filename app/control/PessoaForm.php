<?php
require_once '../service/PessoaService.php';

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Captura os dados do formulário
    $dadosPessoa = [
        'id_pessoa'         => isset($_POST['id_pessoa']) ? $_POST['id_pessoa'] : null,
        'nm_pessoa'         => $_POST['nm_pessoa'],
        'nu_cpf'            => $_POST['nu_cpf'],
        'nu_registro'       => $_POST['nu_registro'],
        'dt_nascimento'     => $_POST['dt_nascimento'],
        'sg_orgaoexpedidor' => $_POST['sg_orgaoexpedidor'],
        'nu_cep'            => $_POST['nu_cep'],
        'nm_rua'            => $_POST['nm_rua'],
        'nm_bairro'         => $_POST['nm_bairro'],
        'ds_complemento'    => $_POST['ds_complemento'],
        'nu_endereco'       => $_POST['nu_endereco'],
        'nm_estado'         => $_POST['nm_estado'],
        'nm_cidade'         => $_POST['nm_cidade'],
    ];

    // Instancia o serviço de Pessoa
    $pessoaService = new PessoaService();

    try
    {
        // Verifica se o ID da pessoa está presente
        if (!empty($dadosPessoa['id_pessoa']))
        {
            // Atualiza a pessoa existente
            $pessoaService->atualizarPessoa((object)$dadosPessoa);
            echo "Pessoa atualizada com sucesso!";
        }
        else
        {
            // Cadastra uma nova pessoa
            $pessoaService->cadastrarPessoa($dadosPessoa);
            echo "Cadastro realizado com sucesso!";
        }
    }
    catch (Exception $e)
    {
        echo "Erro ao processar a solicitação: " . $e->getMessage();
    }
}
else
{
    // Redireciona para a página de listagem se o acesso não for via POST
    header('Location: ../view/listagem-pessoa.html');
    exit();
}