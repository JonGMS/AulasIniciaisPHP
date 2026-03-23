<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Calculadora PHP</title>
</head>


<?php
session_start();
if (isset($_SESSION['segundo_numero'])) {
    echo $_SESSION['segundo_numero'];
    Calculo($_SESSION['operador']);
    unset($_SESSION['segundo_numero']);
} elseif (isset($_POST['operador'])) {
    $_SESSION['conta'] = $_POST['text_panel'];
    $_SESSION['segundo_numero'] = $_SESSION['conta'];
    $_SESSION['operador'] = $_POST['operador'];
    echo "ENTROU NA DEFINIÇÃO DE SEGUNDO NÚMERO";
}

function show_value()
{
    if (isset($_POST['numero']) && !empty($_POST['numero'])) {
        return $_POST['text_panel'] . $_POST['numero'];
    }
    return '';
}

function Calculo($operador)
{
    $primeiro = isset($_POST['text_panel']) ? (int)$_POST['text_panel'] : 0;
    $segundo = isset($_SESSION['segundo_numero']) ? (int)$_SESSION['segundo_numero'] : 0;

    switch ($operador) {
        case "+":
            $_SESSION['conta'] = $primeiro + $segundo;
            break;
        case "-":
            $_SESSION['conta'] = $primeiro - $segundo;
            break;
        case "/":
            $_SESSION['conta'] = ($segundo == 0) ? "Erro: divisão por zero" : $primeiro / $segundo;
            break;
        case "x":
            $_SESSION['conta'] = $primeiro * $segundo;
            break;
        default:
            $_SESSION['conta'] = "Operador inválido";
            break;
    }

    echo $_SESSION['conta'];
}


?>

<body>
    <form class="painel_calculadora" method="post">>
        <div class="painel_campo">
            <?php if (!isset($_SESSION['hitorico'])) : ?>
                <label for="">Calculadora PHP</label><br>
            <?php endif; ?>
            <?php if (isset($_SESSION['conta'])) {
                echo "<div class='painel_valores'><label class='valores' for='input'>" . $_SESSION['conta'] . "  " . $_SESSION['operador'] . "</label></div><br>";
            } ?>
            <input class="caixa_texto" type="text" name="text_panel" id="input" value="<?php echo Show_value() ?>">
        </div>

        <div class="painel_teclado_numerico">

            <div class="teclado-numerico" method="post">

                <button value="7" name="numero" type="submit" class=" tecla teclas-ativadas tecla7">7</a></button>


                <button value="8" name="numero" type="submit" class="tecla8 tecla teclas-ativadas">8</a></button>


                <button value="9" name="numero" type="submit" class="tecla9 tecla teclas-ativadas">9</a></button>


                <button value="4" name="numero" type="submit" class="tecla4 tecla teclas-ativadas">4</a></button>


                <button value="5" name="numero" type="submit" class="tecla5 tecla teclas-ativadas">5</a></button>


                <button value="6" name="numero" type="submit" class="tecla6 tecla teclas-ativadas">6</a></button>


                <button value="1" name="numero" type="submit" class="tecla1 tecla teclas-ativadas">1</a></button>


                <button value="2" name="numero" type="submit" class="tecla2 tecla teclas-ativadas">2</a></button>


                <button value="3" name="numero" type="submit" class="tecla3 tecla teclas-ativadas">3</a></button>


                <button value="." name="numero" type="submit" class="tecla-virgula tecla teclas-ativadas">.</a></button>

                <button value="0" name="numero" type="submit" class="tecla0 tecla teclas-ativadas">0</a></button>


                <button value="+" name="operador" type="submit" class="tecla-soma teclas-ativadas">+</a></button>


                <button value="-" name="operador" type="submit" class="tecla-sub teclas-ativadas">-</a></button>


                <button value="x" name="operador" type="submit" class="teclax teclas-ativadas">x</a></button>


                <button value="/" name="operador" type="submit" class="tecla-divisao teclas-ativadas">÷</a></button>


                <button value="=" name="operador" type="submit" class="tecla-resultado" id="resultado">=</a></button>

            </div>

        </div>

        <div class="painel_historio">

        </div>

    </form>
</body>

</html>