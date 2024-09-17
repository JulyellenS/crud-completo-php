<?php

require_once __DIR__ . '../../service/PessoaService.php';

$service = new PessoaService();

// $obter = $service->obterPessoa(1);

// if(isset($obter) && !empty($obter))
// {
//     dump(['pessoa' => $obter]);
// }
// else
// {
//     dump('Não foi possivel obter resultado');
// }

$pessoa = new Pessoa('1','Ana','12345678910','1234567890','1995-10-19','SSP-BA','41820-770','Rua ABC','Centro','Casa','470','Bahia (BA)','Salvador');

$service->atualizarPessoa($pessoa);