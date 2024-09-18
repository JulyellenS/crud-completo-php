<?php
namespace App\Control;

use App\Service\PessoaService;
use App\Model\Pessoa;

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
        include __DIR__ . '/../html/listagem-pessoa.php';
    }

    public function excluir()
    {
        if (isset($_GET['id_pessoa']))
        {
            $id_pessoa = $_GET['id_pessoa'];
            $this->service->excluirPessoa($id_pessoa);
        }
        $pessoas = $this->service->listarPessoas();
        include __DIR__ . '/../html/listagem-pessoa.php';
        exit();
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
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
            self::listar();
            exit();
        }
        elseif (isset($_GET['id_pessoa']))
        {
            $id_pessoa = $_GET['id_pessoa'];
            $pessoa = $this->service->obterPessoa($id_pessoa);
            include __DIR__ . '/../html/cadastro-pessoa.php';
        }
        else
        {
            self::listar();
            exit();
        }
    }
}