
<?php
require_once '../includes/AbstractRepositorio.php';
class Locacao extends AbstractRepositorio
{



    function Cadastrar()
    {
        throw new \Exception('Not implemented');
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
                        <div class='painel_checkbox' ><input type='checkbox' name='' id='' checked></div>
                            <div class='imagem'>
                            <img src='../ModuloDados/images/".$linha[8]."' alt=''>
                        </div>
                        <div class='nome_livro'>
                            ".$linha[1]."
                        </div>
                
                        <div class='button_excluir'>
                            <button class='button_excluir_adicao'>
                                <img src='../assets/images/iconeX.png'>
                            </button>
                        </div>
                    </div>";
                }
            }
        }
        fclose($dados);
    }
}

?>