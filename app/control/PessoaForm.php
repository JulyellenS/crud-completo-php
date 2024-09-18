<?php
namespace App\Control;

use App\Service\PessoaService;

class PessoaForm
{
    private $pessoaService;
    private $pessoaList;

    public function __construct()
    {
        $this->pessoaService = new PessoaService();
        $this->pessoaList = new PessoaList();
        // Instancia o serviço de Pessoa
    }

    public function cadastrarAtualizarPessoa()
    {
        // Verifica se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Captura os dados do formulário
            $pessoa = new Pessoa();
            $pessoa->setIdPessoa($_POST['id_pessoa']);
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
                // Verifica se o ID da pessoa está presente
                if (!empty($pessoa->getIdPessoa()))
                {
                    // Atualiza a pessoa existente
                    $this->pessoaService->atualizarPessoa($pessoa);
                    include __DIR__ . '/../html/listagem-pessoa.php';
                    // header('Location: index.php?action=listar');
                    // $this->pessoaList->listar();
                }
                else
                {
                    // Cadastra uma nova pessoa
                    $this->pessoaService->cadastrarPessoa($pessoa);
                    include __DIR__ . '/../html/listagem-pessoa.php';
                    // header('Location: index.php?action=listar');
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
            $this->pessoaList->listar();
            exit();
        }
    }

    public function cadastrar()
    {
        include __DIR__ . '/../html/cadastro-pessoa.php';
    }

    private function render($template, $data = [])
    {
        extract($data); // Extrai variáveis do array $data para a tabela global
        include __DIR__ . '/../../html/' . $template;
    }
}