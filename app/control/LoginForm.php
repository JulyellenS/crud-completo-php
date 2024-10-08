<?php
namespace App\Control;
if (session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}
use PDO;
use Exception;
use App\Config\Conexao;
use App\Service\LoginService;
use App\Control\PessoaList;

class LoginForm
{
    private $loginService; 
    private $pessoaList;
    private $conexao;
    private $conn;
    
    public function __construct() 
    {
        $this->loginService = new LoginService();
        $this->pessoaList = new PessoaList();
        $this->conexao = new Conexao();
        $this->conn = $this->conexao->conectar();
    }

    public function entrar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            return $this->exibirLogin();
        }
        
        $email = $_POST['ds_email'] ?? '';
        $senha = $_POST['ds_senha'] ?? '';
        
        if (empty($email) || empty($senha))
        {
            return $this->exibirLogin();
        }
        
        try
        {
            $usuario = $this->loginService->entrar($email, $senha);
            
            if (!empty($usuario))
            {
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nm_usuario'] = $usuario['nm_usuario'];

                $this->pessoaList->listar();
            }
            else
            {
                return $this->exibirLogin();
            }
        }
        catch (Exception $e)
        {
            echo "Erro ao processar a solicitação: " . $e->getMessage();
        }
    }

    private function exibirLogin()
    {
        include __DIR__ . '/../html/login.php';
    }

    public function sair()
    {
        session_start();
        session_unset(); // Remove todas as variáveis de sessão
        session_destroy(); // Destrói a sessão
        include __DIR__ . '/../html/login.php';
        exit;
    }

    public function esqueciSenha()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $email = $_POST['ds_email'];
        
            // Verificar se o email existe no banco de dados
            $sql = 'SELECT * FROM usuario_sistema WHERE ds_email = :ds_email';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ds_email', $email);
            $stmt->execute();
            $usuario_sistema = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($usuario_sistema)
            {
                // Gerar token de recuperação
                $token = bin2hex(random_bytes(50));
                $sql = 'UPDATE usuario_sistema SET ds_tokenrecuperacao = :ds_tokenrecuperacao WHERE email = :email';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':ds_tokenrecuperacao', $token);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
        
                // Enviar email de recuperação de senha
                $link = "https://crudphp.jsweb.tech/index.php?token=$token";
                mail($email, 'Recuperação de Senha', "Clique no link para redefinir sua senha: $link");
        
                echo 'Um email foi enviado com instruções para redefinir sua senha.';
            }
            else
            {
                echo 'Email não encontrado.';
            }
        }
    }

    public function restaurarSenha()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $token = $_POST['ds_tokenrecuperacao'];
            $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

            // Verificar token válido
            $sql = 'SELECT * FROM usuario_sistema WHERE ds_tokenrecuperacao = :ds_tokenrecuperacao';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ds_tokenrecuperacao', $token);
            $stmt->execute();
            $usuario_sistema = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario_sistema)
            {
                // Atualizar a senha
                $sql = 'UPDATE usuario_sistema SET ds_senha = :ds_senha, ds_tokenrecuperacao = NULL WHERE id_usuario = :id_usuario';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':ds_senha', $senha);
                $stmt->bindParam(':id_usuario', $usuario_sistema['id_usuario']);
                $stmt->execute();

                echo 'Senha redefinida com sucesso.';
            }
            else
            {
                echo 'Token inválido.';
            }
        }
    }

    public function cadastrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nome = $_POST['nm_usuario'];
            $email = $_POST['ds_email'];
            $senha = $_POST['ds_senha'];
            $confirma_senha = $_POST['ds_confirmasenha'];

            // Verificar se as senhas são iguais
            if ($senha !== $confirma_senha)
            {
                echo 'As senhas não correspondem!';
                exit;
            }

            // Verificar se o email já está cadastrado
            $sql = 'SELECT * FROM usuario_sistema WHERE ds_email = :ds_email';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ds_email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0)
            {
                echo 'Email já cadastrado!';
                exit;
            }

            // Hash da senha
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

            // Inserir o novo usuário no banco de dados
            $sql = 'INSERT INTO usuario_sistema (nm_usuario, ds_email, ds_senha) VALUES (:nm_usuario, :ds_email, :ds_senha)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nm_usuario', $nome);
            $stmt->bindParam(':ds_email', $email);
            $stmt->bindParam(':ds_senha', $senhaHash);

            if ($stmt->execute())
            {
                echo 'Usuário cadastrado com sucesso!';
                header('Location: login.php');
                exit;
            }
            else
            {
                echo 'Erro ao cadastrar o usuário.';
            }
        }
    }

    public function home()
    {
        include __DIR__ . '/../html/home.php';
    }
}
