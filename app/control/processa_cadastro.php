<?php
require_once '../model/Pessoa.php';
require_once '../config/Conexao.php'; // Classe de conexão ao banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Captura os dados do formulário
    $nm_pessoa          = $_POST['nm_pessoa'];
    $nu_cpf             = $_POST['nu_cpf'];
    $nu_registro        = $_POST['nu_registro'];
    $dt_nascimento      = $_POST['dt_nascimento'];
    $sg_orgaoexpedidor  = $_POST['sg_orgaoexpedidor'];
    $nu_cep             = $_POST['nu_cep'];
    $nm_rua             = $_POST['nm_rua'];
    $nm_bairro          = $_POST['nm_bairro'];
    $ds_complemento     = $_POST['ds_complemento'];
    $nu_endereco        = $_POST['nu_endereco'];
    $nm_estado          = $_POST['nm_estado'];
    $nm_cidade          = $_POST['nm_cidade'];

    // Instancia da classe de conexão
    $conexao = new Conexao;

    // Instância da classe de Pessoa
    $pessoa = new Pessoa(null, $nm_pessoa, $nu_cpf, $nu_registro, $dt_nascimento, $sg_orgaoexpedidor, $nu_cep, $nm_rua, $nm_bairro, $ds_complemento, $nu_endereco, $nm_estado, $nm_cidade);

    try
    {
        // Conexão com o banco de dados
        $conn = $conexao->conectar();

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

        echo "Cadastro realizado com sucesso!";
    }
    catch (Exception $e)
    {
        echo "Erro ao cadastrar pessoa: " . $e->getMessage();
    }
}