<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Control\PessoaList;
use App\Control\PessoaForm;
use App\Control\LoginForm;
use App\Control\Teste;

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

$pessoaList = new PessoaList();
$pessoaForm = new PessoaForm();
$loginForm = new LoginForm();
$teste = new Teste();

if (!isset($_SESSION['id_usuario']))
{
    include __DIR__ . '/app/html/login.php';
    exit;
}

switch ($action)
{
    case 'entrar':
        $loginForm->entrar();
        break;
    case 'cadastrar':
        $pessoaForm->cadastrarPessoa();
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
    // case 'testar':
    //     $teste->excluirPessoa();
    //     break;
    default:
        $loginForm->entrar();
        break;
}