<?php
namespace App\Service;

use App\Repository\LoginRepository;
use App\Model\UsuarioSistema;
use Exception;

class LoginService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new LoginRepository();
    }

    public function entrar($email, $senha)
    {
        return $this->repository->entrar($email, $senha);
    }
}