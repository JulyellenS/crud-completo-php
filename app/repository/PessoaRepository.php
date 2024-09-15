<?php
require_once '../config/Conexao.php';

class PessoaRepository
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirPessoa(Pessoa $pessoa)
    {
        try
        {
            // Conexão com o banco de dados
            $conn = $this->conexao->conectar();

            // Query de inserção
            $sql = "INSERT INTO pessoa (nm_pessoa, nu_cpf, nu_registro, dt_nascimento, sg_orgaoexpedidor, nu_cep, nm_rua, nm_bairro, ds_complemento, nu_endereco, nm_estado, nm_cidade)
                    VALUES (:nm_pessoa, :nu_cpf, :nu_registro, :dt_nascimento, :sg_orgaoexpedidor, :nu_cep, :nm_rua, :nm_bairro, :ds_complemento, :nu_endereco, :nm_estado, :nm_cidade)";

            // Preparando a query
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nm_pessoa', $pessoa->getNmPessoa());
            $stmt->bindValue(':nu_cpf', $pessoa->getNuCpf());
            $stmt->bindValue(':nu_registro', $pessoa->getNuRegistro());
            $stmt->bindValue(':dt_nascimento', $pessoa->getDtNascimento());
            $stmt->bindValue(':sg_orgaoexpedidor', $pessoa->getSgOrgaoExpedidor());
            $stmt->bindValue(':nu_cep', $pessoa->getNuCep());
            $stmt->bindValue(':nm_rua', $pessoa->getNmRua());
            $stmt->bindValue(':nm_bairro', $pessoa->getNmBairro());
            $stmt->bindValue(':ds_complemento', $pessoa->getDsComplemento());
            $stmt->bindValue(':nu_endereco', $pessoa->getNuEndereco());
            $stmt->bindValue(':nm_estado', $pessoa->getNmEstado());
            $stmt->bindValue(':nm_cidade', $pessoa->getNmCidade());

            // Executa a query
            $stmt->execute();
        }
        catch (Exception $e)
        {
            throw new Exception('Erro ao inserir pessoa no banco de dados: ' . $e->getMessage());
        }
    }
}
