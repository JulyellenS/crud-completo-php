<?php
require_once __DIR__. '../../model/Pessoa.php';
require_once __DIR__ . '../../repository/PessoaRepository.php';

class PessoaService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PessoaRepository();
    }

    public function listarPessoas()
    {
        return $this->repository->buscarTodos();
    }

    public function obterPessoa($id_pessoa)
    {
        return $this->repository->buscarPeloId($id_pessoa);
    }

    public function excluirPessoa($id_pessoa)
    {
        return $this->repository->excluir($id_pessoa);
    }

    public function atualizarPessoa(Pessoa $pessoa)
    {
        return $this->repository->atualizar($pessoa);
    }

    public function cadastrarPessoa(Pessoa $pessoa)
    {
        // Validação dos dados (pode adicionar mais validações aqui)
        if (empty($pessoa->getNmPessoa()) || empty($pessoa->getNuCpf()))
        {
            throw new Exception('Nome e CPF são obrigatórios.');
        }

        // Repositório para persistir a Pessoa
        $this->repository->inserirPessoa($pessoa);
    }
}
