<?php
require_once '../model/Pessoa.php';
require_once '../repository/PessoaRepository.php';

class PessoaService
{
    public function cadastrarPessoa($dados)
    {
        // Validação dos dados (pode adicionar mais validações aqui)
        if (empty($dados['nm_pessoa']) || empty($dados['nu_cpf'])) {
            throw new Exception('Nome e CPF são obrigatórios.');
        }

        // Instância da Pessoa
        $pessoa = new Pessoa(
            null,
            $dados['nm_pessoa'],
            $dados['nu_cpf'],
            $dados['nu_registro'],
            $dados['dt_nascimento'],
            $dados['sg_orgaoexpedidor'],
            $dados['nu_cep'],
            $dados['nm_rua'],
            $dados['nm_bairro'],
            $dados['ds_complemento'],
            $dados['nu_endereco'],
            $dados['nm_estado'],
            $dados['nm_cidade']
        );

        // Repositório para persistir a Pessoa
        $pessoaRepo = new PessoaRepository();
        $pessoaRepo->inserirPessoa($pessoa);
    }
}
