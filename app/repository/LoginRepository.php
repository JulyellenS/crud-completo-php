<?php

namespace App\Repository;

use App\Config\Conexao;
use App\Model\UsuarioSistema;
use Exception;
use PDO;

class LoginRepository
{
    private $conexao;
    private $conn;

    public function __construct()
    {
        $this->conexao = new Conexao();
        $this->conn = $this->conexao->conectar();
    }

    public function entrar($email, $senha)
    {
        if(!empty($email) && !empty($senha))
        {
            // Verificar se o usuário existe
            $sql = "SELECT * FROM usuario_sistema WHERE ds_email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario_sistema = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($usuario_sistema && password_verify($senha, $usuario_sistema['ds_senha']))
            {
                return ['id_usuario' => $usuario_sistema['id_usuario'], 
                        'nm_usuario' =>$usuario_sistema['nm_usuario']];
            }
        }
    }
}