<?php
namespace App\Repository;

use App\Config\Conexao;
use App\Model\Pessoa;
use Exception;
use PDO;

class PessoaRepository
{
    private $conexao;
    private $conn;

    public function __construct()
    {
        $this->conexao = new Conexao();

        // Conexão com o banco de dados
        $this->conn = $this->conexao->conectar();
    }

    public function inserirPessoa(Pessoa $pessoa)
    {
        $nm_pessoa = $pessoa->getNmPessoa();
        $nu_cpf = $pessoa->getNuCpf();
        $nu_registro = $pessoa->getNuRegistro();
        $dt_nascimento = $pessoa->getDtNascimento();
        $sg_orgaoexpedidor = $pessoa->getSgOrgaoExpedidor();
        $nu_cep = $pessoa->getNuCep();
        $nm_rua = $pessoa->getNmRua();
        $nm_bairro = $pessoa->getNmBairro();
        $ds_complemento = $pessoa->getDsComplemento();
        $nu_endereco = $pessoa->getNuEndereco();
        $nm_estado = $pessoa->getNmEstado();
        $nm_cidade = $pessoa->getNmCidade();

        try
        {
            // Query de inserção
            $sql = "INSERT INTO pessoa (nm_pessoa, nu_cpf, nu_registro, dt_nascimento, sg_orgaoexpedidor, nu_cep, nm_rua, nm_bairro, ds_complemento, nu_endereco, nm_estado, nm_cidade)
                    VALUES (:nm_pessoa, :nu_cpf, :nu_registro, :dt_nascimento, :sg_orgaoexpedidor, :nu_cep, :nm_rua, :nm_bairro, :ds_complemento, :nu_endereco, :nm_estado, :nm_cidade)";

            // Preparando a query
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nm_pessoa', $nm_pessoa);
            $stmt->bindValue(':nu_cpf', $nu_cpf);
            $stmt->bindValue(':nu_registro', $nu_registro);
            $stmt->bindValue(':dt_nascimento', $dt_nascimento);
            $stmt->bindValue(':sg_orgaoexpedidor', $sg_orgaoexpedidor);
            $stmt->bindValue(':nu_cep', $nu_cep);
            $stmt->bindValue(':nm_rua', $nm_rua);
            $stmt->bindValue(':nm_bairro', $nm_bairro);
            $stmt->bindValue(':ds_complemento', $ds_complemento);
            $stmt->bindValue(':nu_endereco', $nu_endereco);
            $stmt->bindValue(':nm_estado', $nm_estado);
            $stmt->bindValue(':nm_cidade', $nm_cidade);

            // Executa a query
            if (!$stmt->execute())
            {
                throw new Exception('Erro ao executar a inserção: ' . implode(', ', $stmt->errorInfo()));
            }
        }
        catch (Exception $e)
        {
            throw new Exception('Erro ao inserir pessoa no banco de dados: ' . $e->getMessage());
        }
    }


    public function buscarTodos()
    {
        $sql = "SELECT id_pessoa, nm_pessoa, nu_cpf, dt_nascimento, nm_cidade FROM pessoa ORDER BY id_pessoa ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPeloId($id_pessoa)
    {
        $sql = "SELECT * FROM pessoa WHERE id_pessoa = :id_pessoa";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_pessoa', $id_pessoa, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluir($id_pessoa)
    {
        $sql = "DELETE FROM pessoa WHERE id_pessoa = :id_pessoa";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_pessoa', $id_pessoa, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function atualizar(Pessoa $pessoa)
    {
        $id_pessoa = $pessoa->getIdPessoa();
        $nm_pessoa = $pessoa->getNmPessoa();
        $nu_cpf = $pessoa->getNuCpf();
        $nu_registro = $pessoa->getNuRegistro();
        $dt_nascimento = $pessoa->getDtNascimento();
        $sg_orgaoexpedidor = $pessoa->getSgOrgaoExpedidor();
        $nu_cep = $pessoa->getNuCep();
        $nm_rua = $pessoa->getNmRua();
        $nm_bairro = $pessoa->getNmBairro();
        $ds_complemento = $pessoa->getDsComplemento();
        $nu_endereco = $pessoa->getNuEndereco();
        $nm_estado = $pessoa->getNmEstado();
        $nm_cidade = $pessoa->getNmCidade();

        try
        {
            $sql = "UPDATE pessoa SET 
                        nm_pessoa = :nm_pessoa, 
                        nu_cpf = :nu_cpf, 
                        nu_registro = :nu_registro, 
                        dt_nascimento = :dt_nascimento, 
                        sg_orgaoexpedidor = :sg_orgaoexpedidor, 
                        nu_cep = :nu_cep, 
                        nm_rua = :nm_rua, 
                        nm_bairro = :nm_bairro, 
                        ds_complemento = :ds_complemento, 
                        nu_endereco = :nu_endereco, 
                        nm_estado = :nm_estado, 
                        nm_cidade = :nm_cidade 
                    WHERE id_pessoa = :id_pessoa";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(':id_pessoa', $id_pessoa);
            $stmt->bindValue(':nm_pessoa', $nm_pessoa);
            $stmt->bindValue(':nu_cpf', $nu_cpf);
            $stmt->bindValue(':nu_registro', $nu_registro);
            $stmt->bindValue(':dt_nascimento', $dt_nascimento);
            $stmt->bindValue(':sg_orgaoexpedidor', $sg_orgaoexpedidor);
            $stmt->bindValue(':nu_cep', $nu_cep);
            $stmt->bindValue(':nm_rua', $nm_rua);
            $stmt->bindValue(':nm_bairro', $nm_bairro);
            $stmt->bindValue(':ds_complemento', $ds_complemento);
            $stmt->bindValue(':nu_endereco', $nu_endereco);
            $stmt->bindValue(':nm_estado', $nm_estado);
            $stmt->bindValue(':nm_cidade', $nm_cidade);

            // Executa a query
            if (!$stmt->execute())
            {
                throw new Exception('Erro ao executar a atualização: ' . implode(', ', $stmt->errorInfo()));
            }
        }
        catch (Exception $e)
        {
            throw new Exception('Erro ao atualizar a pessoa no banco de dados: ' . $e->getMessage());
        }
    }
}
