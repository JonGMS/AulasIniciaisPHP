
<?php
    class Locacao extends AbstractRepositorio{



        function Cadastrar()
        {
            throw new \Exception('Not implemented');
        }

        public static function Listar()
        {

        }
        public static function ListarAdicoes(){
            $dados = fopen("../ModuloDados/livros.csv", "r");
            while($linha = fgetcsv($dados, ",")){
                // if($_SESSION[''])
            }
        }
      
    }

?>