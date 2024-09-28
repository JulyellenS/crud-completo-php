<?php

namespace App\model;

class Transaction
{
    private $id_transacao;
    private $dt_transacao;
    private $id_usuario;
    private $id_categoria;
    private $tp_transacao;
    private $vl_transacao;
    private $ds_transacao;

    public function __construct($id_transacao = null, $dt_transacao = null, $id_usuario = null, $id_categoria = null, $tp_transacao = null, $vl_transacao = null, $ds_transacao = null)
    {
        $this->id_transacao = $id_transacao;
        $this->dt_transacao = $dt_transacao;
        $this->id_usuario   = $id_usuario;
        $this->id_categoria = $id_categoria;
        $this->tp_transacao = $tp_transacao;
        $this->vl_transacao = $vl_transacao;
        $this->ds_transacao = $ds_transacao;
    }

    public function getIdTransacao()
    {
        return $this->id_transacao;
    }

    public function setIdTransacao($id_transacao)
    {
        $this->id_transacao = $id_transacao;
    }

    public function getDtTransacao()
    {
        return $this->dt_transacao;
    }

    public function setDtTransacao($dt_transacao)
    {
        $this->dt_transacao = $dt_transacao;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    public function getTpTransacao()
    {
        return $this->tp_transacao;
    }

    public function setTpTransacao($tp_transacao)
    {
        $this->tp_transacao = $tp_transacao;
    }

    public function getVlTransacao()
    {
        return $this->vl_transacao;
    }

    public function setVlTransacao($vl_transacao)
    {
        $this->vl_transacao = $vl_transacao;
    }

    public function getDsTransacao()
    {
        return $this->ds_transacao;
    }

    public function setDsTransacao($ds_transacao)
    {
        $this->ds_transacao = $ds_transacao;
    }
}
