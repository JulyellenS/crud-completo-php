<?php
namespace App\Control;

use App\Service\PessoaService;
use App\Model\Pessoa;
class Test
{
    private $service;

    public function __construct()
    {
        $this->service = new PessoaService();
    }

    public function excluirPessoa()
    {
        $this->service->excluirPessoa(1);
    }
    
    public function obterPessoa()
    {
        $obter = $this->service->obterPessoa(1);
        
        if(isset($obter) && !empty($obter))
        {
            dump(['pessoa' => $obter]);
        }
        else
        {
            dump('Não foi possivel obter resultado');
        }
    }

    public function atualizarPessoa()
    {
        $pessoa = new Pessoa('1','Ana','12345678910','1234567890','1995-10-19','SSP-BA','41820-770','Rua ABC','Centro','Casa','470','Bahia (BA)','Salvador');
        $this->service->atualizarPessoa($pessoa);
    }
}