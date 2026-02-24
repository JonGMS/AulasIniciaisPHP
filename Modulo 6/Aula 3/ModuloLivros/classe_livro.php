<?php

class Livro extends AbstractRepositorio
{

    private $id;
    private $nome;
    private $autor;
    private $quantidade;
    private $status;
    private $genero;
    private $colecao;
    private $descricao;
    private $imagem;

    function __construct($id, $nome, $autor, $quantidade, $status, $genero, $colecao, $descricao, $imagem)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->autor = $autor;
        $this->quantidade = $quantidade;
        $this->status = $status;
        $this->genero = $genero;
        $this->colecao = $colecao;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }

    function Cadastrar()
    {
        try {
            $file = fopen("../ModuloDados/livros.csv", 'a');
            $linha = [$this->id, $this->nome, $this->autor, $this->quantidade, $this->status, $this->genero, $this->colecao, $this->descricao, $this->imagem];
            fputcsv($file, $linha);
            fclose($file);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function  Listar() {}

    public static function SalvarImagem(){
        
    }
}
