<?php
require_once __DIR__ . '/app/control/PessoaList.php';
require_once __DIR__ . '/app/control/PessoaForm.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

$pessoaList = new PessoaList();
$pessoaForm = new PessoaForm();

switch ($action)
{
    case 'cadastrar':
        $pessoaForm->cadastrar();
        break;
    case 'editar':
        $pessoaList->editar();
        break;
    case 'excluir':
        $pessoaList->excluir();
        break;
    case 'listar':
        $pessoaList->listar();
        break;
    default:
        $pessoaList->listar();
        break;
}