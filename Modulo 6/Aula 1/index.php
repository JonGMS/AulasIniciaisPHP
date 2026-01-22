<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>PHP - Variaveis</title>
</head>

<body>
    <header class="header-tela">
        <div class="cabecalho">
            <a href="../../index.html" class="link-header">
                <div class="button-header">HOME</div>
            </a>
            <a href="../../modulo.html" class="link-header">
                <div class="button-header">MODULOS</div>
            </a>
            <a href="" class="link-header">
                <div class="button-header">TRABALHOS</div>
            </a>
            <a href="https://github.com/JonGMS" class="link-header" target="_blak">
                <div class="button-header">GIT</div>
            </a>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="atividades">
            <div class="painel-tag">
                <h3 class="titulo-aula">Tag de abertura</h3>
                
                <h3 class="titulo-aula">Variaveis</h3>
            </div>

            <div class="script-php">
                <?php

                $numero_inteiro = 10; //Int

                $numero_decimal = 0.5; // float

                $texto = "Esse é o resultado: "; //string

                $verdadeiro_falso = true; //bool

                const TAXA_VARIAVEL = 1.2; //constante menos comum

                define('TAXA_FIXA', 10); // constante comum

                if ($verdadeiro_falso == true) { //Declaração de if
                    $resultado = $numero_inteiro + $numero_decimal * TAXA_VARIAVEL + TAXA_FIXA;
                    echo "<h1>$texto $resultado</h1>" . '<br>'; //Comparavel com console.WriteLine com DOM do JS
                } else {
                    $resultado = $numero_inteiro + $numero_decimal + TAXA_FIXA;
                    echo "<h1>$texto $resultado</h1>" . '<br>'; //Comparavel com console.WriteLine com DOM do JS
                }

                echo 'Versão do PHP: ', PHP_VERSION, "<br>";

                echo 'Linha do código: ', __LINE__, "<br>";

                // 

                $valor_str = "145";
                $valor_int = (int)$valor_str; // Console.Convert.Toint64(valor_str)

                if(is_int($valor_int)){
                    echo "A conversão funcionou: $valor_int <br>";
                }
                
                $valor_null = null;
                echo "Valor: $valor_null <br>";
                var_dump($valor_null);
                //function Mensagem(mixed $value) {};
                if(is_null($valor_null)){
                    unset($valor_null); //Exclui uma variavel
                    echo "<br> Variavel excluida <br>";
                }
                //Agora a variavel não tem valor, com empty conseguimos retornar um bool quando verificamos uma variavel vazia ou nula
                if(empty($valor_null)){
                    echo "A variavel esta vazia ou nula. <br>" ;
                }
                
                $nome = "Joao";
                $sobrenome = "Santos";

                $nome_completo = $nome . " " . $sobrenome;
                echo $nome_completo,  "<br>";

                $j = 0;
                
                for ($i = 0; $i < strlen($nome_completo); $i++){
                    $j--;
                    echo $nome_completo[$i], " ", $nome_completo[$j] ,"<br>";
                }

                $personalizado = strtoupper($nome_completo);

                echo $personalizado, "<br>";

                $personalizado = substr($personalizado, 0, 6);
                echo $personalizado, "<br>";

                echo strlen($personalizado), "<br>";

                if(str_contains($personalizado, "LINDOO")){
                    echo "Contem JOAO";
                }
                else{
                    echo "Não Contem"; 
                }

                $caixa = array("Caneta", "Celular", "Monjaro", "Durateston", "Remédio", "Boneco", 10 => "Lego"); //O for vai parar no $i = 7, então nunca vai chegar no 10 = lego
                for($i = 0; $i < count($caixa); $i++){
                    if(empty($caixa[$i])){

                        continue;
                    }
                    echo "<br>", $i, " " ,$caixa[$i];
                }
                foreach($caixa as $i => $conteudoCaixa){
                    echo "<br>", $i, " " , $conteudoCaixa;

                    if(str_contains($caixa[$i], "Lego")){
                        unset($caixa[$i]); 
                    }
                } 

                $empresa = array(
                    "Administrador" => "Maria Eduarda",
                    "Vendedor" => "Elian",
                    "Designer" => "Thiago",
                    "Desenvolvedor" => "João"
                );
                
                echo "<br>", '<pre>';

                print_r($empresa);
                echo '</pre>';
                
                $empresa_multidimensional = [
                    'Administrador' =>[
                    '1' => ['nome' => 'Maria E.', 'telefone' => '123456789', 'email' => 'mariaadm@gmail.com'],
                    '2' => ['nome' => 'Amabile', 'telefone' => '8521234658', 'email' => 'mabyadm@gmail.com'],

                    'Vendedor' =>['nome' => 'Elian','telefone' => '987654321', 'email' => 'Elian@gmail.com' ],
                    'Designer' =>['nome' => 'Thiago','telefone' => '741852963', 'email' => 'thi@gmail.com' ],
                    'Desenvolvedor' =>['nome' => 'Joao','telefone' => '369258147', 'email' => 'jon@gmail.com' ]
                ]];
                echo '<pre>';
                print_r($empresa_multidimensional);
                echo '</pre>';

                echo $empresa_multidimensional['Administrador'][2]['nome'];
                ?>
                
            </div>

        </div>
    </div>
</body>

</html>