<?php

class Membro extends AbstractRepositorio
{
    public $cpf;
    public $senha;
    public $nome;
    public $telefone;
    public $endereco;

    function __construct($cpf, $senha, $nome, $telefone, $endereco)
    {
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }
    function Cadastrar()
    {
        throw new \Exception('Not implemented');
    }


}

?>