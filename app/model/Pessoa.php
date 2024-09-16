<?php
class Pessoa
{
    private $id_pessoa;
    private $nm_pessoa;
    private $nu_cpf;
    private $nu_registro;
    private $dt_nascimento;
    private $sg_orgaoexpedidor;
    private $nu_cep;
    private $nm_rua;
    private $nm_bairro;
    private $ds_complemento;
    private $nu_endereco;
    private $nm_estado;
    private $nm_cidade;

    public function __construct($id_pessoa = null, $nm_pessoa = null, $nu_cpf = null, $nu_registro = null, $dt_nascimento = null, $sg_orgaoexpedidor = null, $nu_cep = null, $nm_rua = null, $nm_bairro = null, $ds_complemento = null, $nu_endereco = null, $nm_estado = null, $nm_cidade = null)
    {
        $this->id_pessoa = $id_pessoa;
        $this->nm_pessoa = $nm_pessoa;
        $this->nu_cpf = $nu_cpf;
        $this->nu_registro = $nu_registro;
        $this->dt_nascimento = $dt_nascimento;
        $this->sg_orgaoexpedidor = $sg_orgaoexpedidor;
        $this->nu_cep = $nu_cep;
        $this->nm_rua = $nm_rua;
        $this->nm_bairro = $nm_bairro;
        $this->ds_complemento = $ds_complemento;
        $this->nu_endereco = $nu_endereco;
        $this->nm_estado = $nm_estado;
        $this->nm_cidade = $nm_cidade;
    }

    public function getIdPessoa(): int
    {
        return $this->id_pessoa;
    }

    public function setIdPessoa(int $id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }

    public function getNmPessoa(): string
    {
        return $this->nm_pessoa;
    }

    public function setNmPessoa(string $nm_pessoa)
    {
        $this->nm_pessoa = $nm_pessoa;
    }

    public function getNuCpf(): string
    {
        return $this->nu_cpf;
    }

    public function setNuCpf(string $nu_cpf)
    {
        $this->nu_cpf = $nu_cpf;
    }

    public function getNuRegistro(): string
    {
        return $this->nu_registro;
    }

    public function setNuRegistro(string $nu_registro)
    {
        $this->nu_registro = $nu_registro;
    }

    public function getDtNascimento(): string
    {
        return $this->dt_nascimento;
    }

    public function setDtNascimento(string $dt_nascimento)
    {
        $this->dt_nascimento = $dt_nascimento;
    }

    public function getSgOrgaoExpedidor(): string
    {
        return $this->sg_orgaoexpedidor;
    }

    public function setSgOrgaoExpedidor(string $sg_orgaoexpedidor)
    {
        $this->sg_orgaoexpedidor = $sg_orgaoexpedidor;
    }

    public function getNuCep(): string
    {
        return $this->nu_cep;
    }

    public function setNuCep(string $nu_cep)
    {
        $this->nu_cep = $nu_cep;
    }

    public function getNmRua(): string
    {
        return $this->nm_rua;
    }

    public function setNmRua(string $nm_rua)
    {
        $this->nm_rua = $nm_rua;
    }

    public function getNmBairro(): string
    {
        return $this->nm_bairro;
    }

    public function setNmBairro(string $nm_bairro)
    {
        $this->nm_bairro = $nm_bairro;
    }

    public function getDsComplemento(): string
    {
        return $this->ds_complemento;
    }

    public function setDsComplemento(string $ds_complemento)
    {
        $this->ds_complemento = $ds_complemento;
    }

    public function getNuEndereco(): string
    {
        return $this->nu_endereco;
    }

    public function setNuEndereco(string $nu_endereco)
    {
        $this->nu_endereco = $nu_endereco;
    }

    public function getNmEstado(): string
    {
        return $this->nm_estado;
    }

    public function setNmEstado(string $nm_estado)
    {
        $this->nm_estado = $nm_estado;
    }

    public function getNmCidade(): string
    {
        return $this->nm_cidade;
    }

    public function setNmCidade(string $nm_cidade)
    {
        $this->nm_cidade = $nm_cidade;
    }
}
