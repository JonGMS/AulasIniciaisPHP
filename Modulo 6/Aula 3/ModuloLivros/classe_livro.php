<?php

    class Livro extends AbstractRepositorio{
        
        private $id;
        private $nome;
        private $autor;
        private $quantidade;
        private $status;
        private $genero;
        private $colecao;
        private $descricao;

        function __construct( $id, $nome, $autor, $quantidade, $status, $genero, $colecao, $descricao)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->autor = $autor;
            $this->quantidade = $quantidade;
            $this->status = $status;
            $this->genero = $genero;
            $this->colecao = $colecao;
            $this->descricao = $descricao;
        }

        function Cadastrar()
        {
            throw new \Exception('Not implemented');
        }

        public static function  Listar(){

        }

    }


?>

