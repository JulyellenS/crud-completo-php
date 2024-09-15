<?php
require_once '../service/PessoaService.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Captura os dados do formulário
    $dadosPessoa = [
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
        // Chama o serviço para cadastrar a pessoa
        $pessoaService->cadastrarPessoa($dadosPessoa);
        echo "Cadastro realizado com sucesso!";
    }
    catch (Exception $e)
    {
        echo "Erro ao cadastrar pessoa: " . $e->getMessage();
    }
}
