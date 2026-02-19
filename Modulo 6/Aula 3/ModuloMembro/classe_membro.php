<?php

class Membro extends AbstractRepositorio
{
    private $cpf;
    private $senha;
    private $nome;
    private $telefone;
    private $endereco;

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
        try{
            $file = fopen("../Aula 3/ModuloDados/membros.csv", 'a');
            $linha = [$this->cpf, $this->senha, $this->nome, $this->telefone, $this->endereco];
            fputcsv($file, $linha);
            fclose($file);

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }


}

?>