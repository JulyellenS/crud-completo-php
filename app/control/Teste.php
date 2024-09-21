<?php
namespace App\Control;

use App\Service\PessoaService;
use App\Service\LoginService;
use App\Model\Pessoa;
class Teste
{
    private $pessoaService;
    private $loginService;

    public function __construct()
    {
        $this->pessoaService = new PessoaService();
        $this->loginService = new LoginService();
    }

    public function excluirPessoa()
    {
        $this->pessoaService->excluirPessoa(1);
    }
    
    public function obterPessoa()
    {
        $pessoa = $this->pessoaService->obterPessoa(1);
        
        if(isset($pessoa) && !empty($pessoa))
        {
            dump(['pessoa' => $pessoa]);
        }
        else
        {
            dump('Não foi possivel obter resultado');
        }
    }

    public function atualizarPessoa()
    {
        $pessoa = new Pessoa('1','Ana','12345678910','1234567890','1995-10-19','SSP-BA','41820-770','Rua ABC','Centro','Casa','470','Bahia (BA)','Salvador');
        $this->pessoaService->atualizarPessoa($pessoa);
    }

    public function entrar()
    {
        $email = 'email@teste.com';
        $senha = 'senha-aqui';

        dump($this->loginService->entrar($email, $senha));
    }
}