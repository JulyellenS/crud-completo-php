<?php
namespace App\Config;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class Conexao
{
    private $host = 'localhost';
    private $port = '5432';
    private $dbname = 'nome_do_bando';
    private $user = 'usuario_do_banco';
    private $password; // Usando DOTENV para manter a senha do banco de dados segura (passar pasta config e arquivo .env no .gitignore)
    private $conn;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../config');
        $dotenv->load();
        $this->password = $_ENV['SENHA_BANCO'];
    }

    public function conectar()
    {
        try
        {
            $this->conn = new PDO("pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}", $this->user, $this->password);
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }
        catch (PDOException $e)
        {
            echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
            return null;
        }
    }

    public function desconectar()
    {
        $this->conn = null;
    }
}
