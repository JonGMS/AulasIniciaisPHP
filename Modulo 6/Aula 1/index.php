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
            <h3 class="titulo-aula">Variaveis</h3>
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

                echo 'Linha do código: ', __LINE__;

                ?>
            </div>

            <h1>Teste</h1>
        </div>
    </div>
</body>

</html>