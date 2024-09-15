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
        $this->render('listagem-pessoa.html', ['pessoas' => $pessoas]);
    }

    public function excluir()
    {
        if (isset($_GET['id']))
        {
            $id_pessoa = $_GET['id'];
            $this->service->excluirPessoa($id_pessoa);
        }
        header('Location: ../html/listagem-pessoa.html');
        exit();
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $pessoa = new Pessoa();
            $pessoa->setIdPessoa($_POST['id_pessoa']);
            $pessoa->setNmPessoa($_POST['nm_pessoa']);
            $pessoa->setNuCpf($_POST['nu_cpf']); // Adicionei este exemplo, ajuste conforme suas propriedades
            // Set other properties...
            $this->service->atualizarPessoa($pessoa);
            header('Location: ../html/cadastro-pessoa.html');
            exit();
        }
        elseif (isset($_GET['id']))
        {
            $id_pessoa = $_GET['id'];
            $pessoa = $this->service->obterPessoa($id_pessoa);
            $this->render('cadastro-pessoa.html', ['pessoa' => $pessoa]);
        }
    }

    private function render($template, $data = [])
    {
        extract($data); // Extrai variáveis do array $data para a tabela global
        include __DIR__ . '/../html/' . $template;
    }
}
