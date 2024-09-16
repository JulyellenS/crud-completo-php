<?php

require_once __DIR__ . '../../service/PessoaService.php';

$service = new PessoaService();

$obter = $service->obterPessoa(1);

if(isset($obter) && !empty($obter))
{
    dump(['pessoa' => $obter]);
}
else
{
    dump('Não foi possivel obter resultado');
}