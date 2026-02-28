<?php
require_once '../includes/AbstractRepositorio.php';

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
            if (!$file) {
                die("Erro ao abrir arquivo CSV");
            }
            $linha = [$this->id, $this->nome, $this->autor, $this->quantidade, $this->status, $this->genero, $this->colecao, $this->descricao, $this->imagem];
            fputcsv($file, $linha);
            fclose($file);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function  Listar()
    {
        try {
            $dados = fopen('../ModuloDados/livros.csv', 'r');
            while (($linha = fgetcsv($dados, 0, ",")) !== false) {
                if ($linha[0] == 'ID') {
                    continue;
                }

                $generos = explode(",", $linha[5]);
                echo
                "<a href='livro_estoque.php?livro=".$linha[0]."'><div class='card1'>
                    <div class='card'>
                        <div class='imagem'>
                            <img class='imagem' src='../ModuloDados/images/" . $linha[8] . "' alt=''>
                        </div>
                        <div class='nome-livro'>
                            <p class='paragrafo-titulo'>" . $linha[1] . "</p>
                            <div class='status-livro'>
                                <p class='paragrafo-status'>" . $linha[3] . "</p>
                            </div>
                        </div>
                        <div class='painel-genero'>";
                for ($i = 0; $i < count($generos); $i++) {
                    echo "<span class='tag'>" . $generos[$i] . "</span>";
                }
                echo "
                </div>
                    <div class='descricao'>
                        <p class='paragrafo-descricao' class='descricao'>
                        " . $linha[7] . "</p>
                    </div>
                </div>
        </div></a>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function SalvarImagem() {}
}
/*<div class="card1">
        <div class="card">
            
            <div class="painel-genero">
                <span class="tag">Fantasia</span>
                <span class="tag">Mistério</span>
            </div>
            <div class="descricao">
                <p class="paragrafo-descricao" class="descricao">Harry descobre aos 11 anos que é um bruxo e vai para Hogwarts, onde faz amigos, enfrenta desafios e se envolve no mistério da Pedra Filosofal.</p>
            </div>




        </div>
    </div>*/