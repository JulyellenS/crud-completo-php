<?php 
require_once __DIR__ . '/vendor/autoload.php';

use App\Control\PessoaList;
use App\Control\PessoaForm;
use App\Control\LoginForm;
use App\Control\Teste;
class Index
{
    private $pessoaList;
    private $pessoaForm;
    private $loginForm;
    private $teste;

    public function __construct()
    {
        $this->pessoaList = new PessoaList();
        $this->pessoaForm = new PessoaForm();
        $this->loginForm = new LoginForm();
        $this->teste = new Teste();
    }

    public function run()
    {
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        $action = isset($_GET['action']) ? $_GET['action'] : 'home';

        $acoes_protegidas = ['cadastrar', 'editar', 'excluir', 'listar', 'sair'];

        if (in_array($action, $acoes_protegidas) && !isset($_SESSION['id_usuario']))
        {
            $this->loginForm->entrar();
        }
        else
        {
            switch ($action)
            {
                case 'home':
                    $this->gerenciarHome();
                    break;
                case 'entrar':
                    $this->loginForm->entrar();
                    break;
                case 'cadastrar':
                    $this->pessoaForm->cadastrarPessoa();
                    break;
                case 'editar':
                    $this->pessoaList->editar();
                    break;
                case 'excluir':
                    $this->pessoaList->excluir();
                    break;
                case 'listar':
                    $this->pessoaList->listar();
                    break;
                case 'sair':
                    $this->loginForm->sair();
                    break;
                // case 'testar':
                //     $this->teste->entrar();
                //     break;
                default:
                    $this->loginForm->home();
                    break;
            }
        }
    }

    private function gerenciarHome()
    {
        if (isset($_SESSION['id_usuario']))
        {
            include __DIR__ . '/app/html/home.php';
        }
        else
        {
            $this->loginForm->entrar();
        }
    }
}

$app = new Index();
$app->run();