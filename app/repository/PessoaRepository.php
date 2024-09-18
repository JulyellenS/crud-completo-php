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
        try
        {
            // Query de inserção
            $sql = "INSERT INTO pessoa (nm_pessoa, nu_cpf, nu_registro, dt_nascimento, sg_orgaoexpedidor, nu_cep, nm_rua, nm_bairro, ds_complemento, nu_endereco, nm_estado, nm_cidade)
                    VALUES (:nm_pessoa, :nu_cpf, :nu_registro, :dt_nascimento, :sg_orgaoexpedidor, :nu_cep, :nm_rua, :nm_bairro, :ds_complemento, :nu_endereco, :nm_estado, :nm_cidade)";

            // Preparando a query
            $stmt = $this->conn->prepare($sql);
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
        $sql = "SELECT id_pessoa, nm_pessoa, nu_cpf, dt_nascimento, nm_cidade FROM pessoa";
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
        $stmt->bindParam(':id_pessoa', $pessoa->getIdPessoa());
        $stmt->bindParam(':nm_pessoa', $pessoa->getNmPessoa());
        $stmt->bindParam(':nu_cpf', $pessoa->getNuCpf());
        $stmt->bindParam(':nu_registro', $pessoa->getNuRegistro());
        $stmt->bindParam(':dt_nascimento', $pessoa->getDtNascimento());
        $stmt->bindParam(':sg_orgaoexpedidor', $pessoa->getSgOrgaoExpedidor());
        $stmt->bindParam(':nu_cep', $pessoa->getNuCep());
        $stmt->bindParam(':nm_rua', $pessoa->getNmRua());
        $stmt->bindParam(':nm_bairro', $pessoa->getNmBairro());
        $stmt->bindParam(':ds_complemento', $pessoa->getDsComplemento());
        $stmt->bindParam(':nu_endereco', $pessoa->getNuEndereco());
        $stmt->bindParam(':nm_estado', $pessoa->getNmEstado());
        $stmt->bindParam(':nm_cidade', $pessoa->getNmCidade());
        return $stmt->execute();
    }
}
