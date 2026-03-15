<?php
require_once __DIR__ . '/../includes/AbstractRepositorio.php';


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
        $this->dataDeCadastro = $dataDeCadastro;
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
                echo "<tr><td> $linha[2] </td><td>$linha[3]</td><td>$linha[0]</td><td>$linha[4]</td></tr>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function Editar($id_membro)
    {
        $linhas = [];

        $dados = fopen(__DIR__ . "/../ModuloDados/membros.csv", "r");
        while (($linha = fgetcsv($dados, 0, ",")) !== false) {
            $linhas[] = $linha;
        }
        fclose($dados);

        $dadosMembro = null;

        foreach ($linhas as &$linha) {
            if (trim((string)$linha[0]) === trim((string)$id_membro)) {
                $linha = [
                    $this->cpf,
                    $this->senha,
                    $this->nome,
                    $this->telefone,
                    $this->endereco,
                    $this->dataDeCadastro
                ];

                $dadosMembro = [
                    'cpf' => $this->cpf,
                    'senha' => $this->senha,
                    'nome' => $this->nome,
                    'telefone' => $this->telefone,
                    'endereco' => $this->endereco,
                    'data_cadastro' => $this->dataDeCadastro
                ];
            }
        }

        $dados = fopen(__DIR__ . "/../ModuloDados/membros.csv", "w");
        foreach ($linhas as $linha) {
            fputcsv($dados, $linha);
        }
        fclose($dados);


        $_SESSION['dados_membro'] = $dadosMembro;
    }
}
