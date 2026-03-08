
<?php
require_once(__DIR__ . '/../includes/AbstractRepositorio.php');

class Locacao extends AbstractRepositorio
{
    private $id;
    private $membro;
    private $livro;
    private $dataLocacao;
    private $dataEntrega;
    private $status;
    private $multa;

    public function __construct($id, $membro, $livro, $dataLocacao, $dataEntrega, $status, $multa)
    {
        $this->id = $id;
        $this->membro = $membro;
        $this->livro = $livro;
        $this->dataLocacao = $dataLocacao;
        $this->dataEntrega = $dataEntrega;
        $this->status = $status;
        $this->multa = $multa;
    }

    function Cadastrar()
    {
        $dados = fopen("../ModuloDados/locacao.csv", "a");
        $linha = [$this->id, $this->membro, $this->livro, $this->dataLocacao, $this->dataEntrega, $this->status, $this->status];
        fputcsv($dados, $linha);
        fclose($dados);
    }

    public static function Listar() {}

    public static function ListarAdicoes()
    {
        $dados = fopen("../ModuloDados/livros.csv", "r");
        while ($linha = fgetcsv($dados, 0, ",")) {
            foreach ($_SESSION['id_livro_locacao'] as $livro) {

                if ($livro == $linha[0]) {
                    echo "
                    <div class='lista_adicao'>
                        <div class='painel_checkbox' ><input type='checkbox' name='livro[]' id='' value='$linha[0]' checked></div>
                            <div class='imagem'>
                            <img src='../ModuloDados/images/" . $linha[8] . "' alt=''>
                        </div>
                        <div class='nome_livro'>
                            " . $linha[1] . "
                        </div>
                
                        <div class='button_excluir'>
                            <a href='retirar.php?livro_finalizacao=$linha[0]' class='button_excluir_adicao'>
                                <img src='../assets/images/iconeX.png'>
                            </a>
                        </div>
                    </div>";
                }
            }
        }
        fclose($dados);
    }
    public static function AlterarQuantidade($ids_livro)
    {
        $dados = fopen("../ModuloDados/livros.csv", "r");
        while (($linha = fgetcsv($dados, 0, ",")) !== false) {
            $linhas[] = $linha;
        }
        fclose($dados);

        foreach ($linhas as &$linha) {
            if (in_array($linha[0], $ids_livro)) {
                $linha[3] = max(0, $linha[3] - 1);
                $linha[4] = "INDISPONÍVEL";
            }
        }

        $dados = fopen("../ModuloDados/livros.csv", "w");
        foreach ($linhas as $linha) {
            fputcsv($dados, $linha);
        }
        fclose($dados);
    }

    public static function ApresentarLocacaoAdmin()
    {

        $dados = fopen(__DIR__ . "/../ModuloDados/locacao.csv", "r");

        while (($linha = fgetcsv($dados, 0, ",")) !== false) {
            $csv = fopen(__DIR__ . "/../ModuloDados/membros.csv", "r");

            while (($linhaMembro = fgetcsv($csv, 0, ",")) !== false) {
                if ($linha[1] == $linhaMembro[0]) {
                    $membro = $linhaMembro[2];
                }
            }
            fclose($csv);
            if ($linha[0] == "ID") {
                continue;
            }
            $livros = explode(",", $linha[2]);
            $quantidadeLivros = count($livros);
            echo "<a class='get_locacao' href='index_apresentacao.php?id_locacao=$linha[0]'>
                            <div class='painel_locacao'>
                                <div class='nome_membro'>$membro</div>
                                <div class='numeroLivros'>$quantidadeLivros</div>
                                <div class='data_devolucao'>$linha[4]</div>
                                <div class='status'>EM ABERTO</div>
                            </div>
                        </a>";
        }
        fclose($dados);
    }
}

?>