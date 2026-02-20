<?php
require_once '../includes/AbstractRepositorio.php';


class Membro extends AbstractRepositorio
{
    private $cpf;
    private $senha;
    private $nome;
    private $telefone;
    private $endereco;
    private $dataDeCadastro;

    function __construct($cpf, $senha, $nome, $telefone, $endereco, $dataDeCadastro)
    {
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->dataDeCadastro= $dataDeCadastro;
    }

    function Cadastrar()
    {
        try {
            $file = fopen("../ModuloDados/membros.csv", 'a');
            $linha = [$this->cpf, $this->senha, $this->nome, $this->telefone, $this->endereco, $this->dataDeCadastro];
            fputcsv($file, $linha);
            fclose($file);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function Listar()
    {
        $primeiraLinha = true;
        try {
            $dados = fopen("../ModuloDados/membros.csv", "r");

            while (($linha = fgetcsv($dados, 0, ",")) !== false) {
                if ($linha[0] == 'ADMIN' || $primeiraLinha == true) {
                    $primeiraLinha = false;
                    continue;
                }
                echo "<tr><td> $linha[2] </td><td>$linha[3]</td><td>$linha[0]</td><td>$linha[4]</td></tr>" ;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
