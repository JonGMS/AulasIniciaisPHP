
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
        $dadosLivros = array_map('str_getcsv', file(__DIR__ . "/../ModuloDados/livros.csv"));
        $dadosMembros = array_map('str_getcsv', file(__DIR__ . "/../ModuloDados/membros.csv"));


        $dados = fopen(__DIR__ . "/../ModuloDados/livros.csv", "r");

        if ($_SESSION['usuario'] == "ADMIN") {
            foreach ($dadosMembros as $linha) {
                $idMembro = $linha[0];

                if (isset($_SESSION['admin_relacoes'][$idMembro])) {
                    echo "<form  action='validar_locacao.php?membro=$idMembro' method='post'>
                <div class='card_membro'>
                    <div class='overflow_membro'>
                        <div class='painel_membro'>
                            <div class='nome_membro'>
                                {$linha[2]}
                            </div>
                            <div class='selecao_membro'>
                                <input type='checkbox' name='membro[]' value='{$linha[0]}' checked>
                            </div>
                        </div>";

                    foreach ($_SESSION['admin_relacoes'][$idMembro] as $idLivro) {
                        foreach ($dadosLivros as $linhaLivro) {
                            if ($linhaLivro[0] == $idLivro) {
                                echo "<div class='lista_adicao'>
                                <div class='painel_checkbox'>
                                    <input type='checkbox' name='livro[]' value='{$linhaLivro[0]}' checked>
                                </div>
                                <div class='imagem'>
                                    <img src='../ModuloDados/images/{$linhaLivro[8]}' alt=''>
                                </div>
                                <div class='nome_livro'>
                                    {$linhaLivro[1]}
                                </div>
                                <div class='button_excluir'>
                                    <a href='retirar.php?livro_finalizacao={$linhaLivro[0]}' class='button_excluir_adicao'>
                                        <img src='../assets/images/iconeX.png'>
                                    </a>
                                </div>
                              </div>";
                            }
                        }
                    }
                    echo "<div class='posicaoButton'><input class='ButtonFinalizar' type='submit' value='FINALIZAR LOCAÇÃO'></div>
                    </div></div>";
                }
            }

            echo "</form>";
        }


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
    public static function ListarAdicoesIndex()
    {

        $dados = fopen(__DIR__ . "/../ModuloDados/livros.csv", "r");

        while ($linha = fgetcsv($dados, 0, ",")) {
            foreach ($_SESSION['id_livro_locacao'] as $livro) {

                if ($livro == $linha[0]) {
                    echo "
                    <div class='lista_adicao'>
                            <div class='imagem'>
                            <img src='ModuloDados/images/" . $linha[8] . "' alt=''>
                        </div>
                        <div class='nome_livro'>
                            " . $linha[1] . "
                        </div>
                
                    </div>";
                }
            }
        }
        echo "<a class'buttonLocar' href=ModuloLocacao/locacao.php><div class='painelbutton'><div class='locar'>Locar</div></a>";
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
                    $id_membro = $linhaMembro[0];
                }
            }
            fclose($csv);
            if ($linha[0] == "ID") {
                continue;
            }
            $livros = explode(",", $linha[2]);
            $quantidadeLivros = count($livros);
            echo "
            <div class='margin_membro'><a class='get_locacao' href='index_apresentacao.php?id_locacao=$linha[0]&id_membro=$id_membro'>
                            <div class='painel_locacao'>
                                <div class='nome_membro'>$membro</div>
                                <div class='numeroLivros'>$quantidadeLivros</div>
                                <div class='data_devolucao'>$linha[4]</div>
                                <div class='status'>EM ABERTO</div>
                            </div>
                        </a></div>";
        }
        fclose($dados);
    }
    public static function ApresentarLocacaoMembro($id_membro)
    {
        $dadosLocacao = array_map('str_getcsv', file(__DIR__ . "/../ModuloDados/locacao.csv"));
        $dadosLivros  = array_map('str_getcsv', file(__DIR__ . "/../ModuloDados/livros.csv"));

        foreach ($dadosLocacao as $linha) {
            if ($linha[1] == $id_membro) {
                echo "<div class='painel_locacao'>
                <div class='cabecalho_card_pai'>
                    <div class='data_locacao'>$linha[3]</div>
                    <div class='ate'>até</div>
                    <div class='data_entrega'>$linha[4]</div>
                    <div class='status'>$linha[5]</div>
                </div>
                <div class='apresenta_livros'>";

                $livros   = explode(",", $linha[2]);

                foreach ($dadosLivros as $linhaLivro) {
                    for ($i = 0; $i < count($livros); $i++) {
                        if ($linhaLivro[0] == $livros[$i]) {
                            $generos = explode(",", $linhaLivro[5]);

                            echo "
                            <div class='cardlivro'>
                                <div class='nome_livro'>$linhaLivro[1]</div>
                                <div class='img'>
                                    <img class='img' src='ModuloDados/images/$linhaLivro[8]' alt=''>
                                </div>
                                <div class='generos'>";
                            foreach ($generos as $g) {
                                echo "<span class='tag'>$g</span>";
                            }
                            echo "</div>
                                </div>
                            
                        ";
                        }
                    }
                }
                echo "</div></div>";
            }
        }
    }
}
