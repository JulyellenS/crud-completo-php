<?php

namespace App\model;

class UsuarioSistema
{
    private $id_usuario;
    private $nm_usuario;
    private $ds_email;
    private $ds_senha;
    private $ds_tokenrecuperacao;

    public function __construct($id_usuario = null, $nm_usuario = null, $ds_email = null, $ds_senha = null, $ds_tokenrecuperacao)
    {
        $this->id_usuario = $id_usuario;
        $this->nm_usuario = $nm_usuario;
        $this->ds_email = $ds_email;
        $this->ds_senha = $ds_senha;
        $this->ds_tokenrecuperacao = $ds_tokenrecuperacao;
    }

    public function getIdUduario(): int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNmUsuario(): string
    {
        return $this->nm_usuario;
    }

    public function setNmUsuario(string $nm_usuario)
    {
        $this->nm_usuario = $nm_usuario;
    }

    public function getDsEmail(): string
    {
        return $this->ds_email;
    }

    public function setDsEmail(string $ds_email)
    {
        $this->ds_email = $ds_email;
    }

    public function getDsSenha(): string
    {
        return $this->ds_senha;
    }

    public function setDsSenha(string $ds_senha)
    {
        $this->ds_senha = $ds_senha;
    }

    public function getDsTokenRecuperacao(): string
    {
        return $this->ds_tokenrecuperacao;
    }

    public function setDsTokenRecuperacao(string $ds_tokenrecuperacao)
    {
        $this->ds_tokenrecuperacao = $ds_tokenrecuperacao;
    }
}