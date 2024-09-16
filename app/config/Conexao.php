<?php

require __DIR__ . '../../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Conexao
{
    private $host = 'private-db-postgresql-do-user-11920175-0.k.db.ondigitalocean.com';
    private $port = '25060';
    private $dbname = 'projeto_php';
    private $user = 'doadmin';
    private $password;
    private $conn;

    public function __construct()
    {
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
