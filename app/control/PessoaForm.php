<?php
namespace App\Control;

use App\Service\PessoaService;
use App\Model\Pessoa;
use Exception;

class PessoaForm
{
    private $pessoaService;

    public function __construct()
    {
        $this->pessoaService = new PessoaService();
    }

    public function cadastrarPessoa()
    {
        // Verifica se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Captura os dados do formulário
            $pessoa = new Pessoa();
            $pessoa->setNmPessoa($_POST['nm_pessoa']);
            $pessoa->setNuCpf($_POST['nu_cpf']);
            $pessoa->setNuRegistro($_POST['nu_registro']);
            $pessoa->setDtNascimento($_POST['dt_nascimento']);
            $pessoa->setSgOrgaoExpedidor($_POST['sg_orgaoexpedidor']);
            $pessoa->setNuCep($_POST['nu_cep']);
            $pessoa->setNmRua($_POST['nm_rua']);
            $pessoa->setNmBairro($_POST['nm_bairro']);
            $pessoa->setDsComplemento($_POST['ds_complemento']);
            $pessoa->setNuEndereco($_POST['nu_endereco']);
            $pessoa->setNmEstado($_POST['nm_estado']);
            $pessoa->setNmCidade($_POST['nm_cidade']);

            try
            {
                $this->pessoaService->cadastrarPessoa($pessoa);
                
                // Redireciona para a tela de listagem
                $pessoas = $this->pessoaService->listarPessoas();
                include __DIR__ . '/../html/listagem-pessoa.php';
            }
            catch (Exception $e)
            {
                echo "Erro ao processar a solicitação: " . $e->getMessage();
            }
        }
        else
        {
            include __DIR__ . '/../html/cadastro-pessoa.php';
            exit();
        }
    }
}