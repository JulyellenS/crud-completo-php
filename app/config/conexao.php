<?php

class Conexao
{
    private $host = 'localhost';
    private $port = '5432';
    private $dbname = 'projeto_php';
    private $user = 'postgres';
    private $password;
    private $conn;

    public function __construct()
    {
        $this->password = getenv('SENHA_BANCO');
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
