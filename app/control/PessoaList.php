<?php
require_once __DIR__ . '../../service/PessoaService.php';
require_once __DIR__ . '../../model/Pessoa.php';
class PessoaList
{
    private $service;

    public function __construct()
    {
        $this->service = new PessoaService();
    }

    public function listar()
    {
        $pessoas = $this->service->listarPessoas();
        $this->render('listagem-pessoa.php', ['pessoas' => $pessoas]);
    }

    public function excluir()
    {
        if (isset($_GET['id']))
        {
            $id_pessoa = $_GET['id'];
            $this->service->excluirPessoa($id_pessoa);
        }
        header('Location: ../html/listagem-pessoa.php');
        exit();
    }

    public function editar()
    {
        if (isset($_GET['id_pessoa']))
        {
            $id_pessoa = $_GET['id_pessoa'];
            $pessoa = $this->service->obterPessoa($id_pessoa);
            $this->render('cadastro-pessoa.php', ['pessoa' => $pessoa]);
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
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

            $this->service->atualizarPessoa($pessoa);
            header('Location: ../html/cadastro-pessoa.php');
            exit();
        }
        else
        {
            header('Location: ../html/cadastro-pessoa.php');
            exit();
        }
    }

    private function render($template, $data = [])
    {
        extract($data); // Extrai variáveis do array $data para a tabela global
        include __DIR__ . '/../html/' . $template;
    }

}
