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

    public function __construct($id_pessoa = null, $nm_pessoa = null, $nu_cpf = null, $nu_registro = null, $dt_nascimento = null)
    {
        $this->id_pessoa = $id_pessoa;
        $this->nm_pessoa = $nm_pessoa;
        $this->nu_cpf = $nu_cpf;
        $this->nu_registro = $nu_registro;
        $this->dt_nascimento = $dt_nascimento;
    }


    public function getIdPessoa(): int
    {
        return $this->id_pessoa;
    }

    public function setIdPessoa(int $id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    
	public function get_ds_complemento()
    {
		return $this->ds_complemento;
	}

	public function set_ds_complemento($ds_complemento)
    {
		$this->ds_complemento = $ds_complemento;
	}
}

