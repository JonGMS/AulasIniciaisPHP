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
$valor = [];
if (isset($_SESSION['valores'])) {
    $valor = $_SESSION['valores'];
}


function show_value()
{
    if (isset($_SESSION['valores']) && !empty($_SESSION['valores'])) {
        return $_SESSION['valores'];
    }
    return '';
}


?>

<body>
    <div class="painel_calculadora">
        <div class="painel_campo">
            <?php if(!isset($_SESSION['hitorico'])) : ?>
            <label for="">Calculadora PHP</label><br>
            <?php endif; ?>
            <?php if(isset($_SESSION['historico'])){
                echo "<div class='painel_valores'><label class='valores' for='input'>".$_SESSION['historico']."</label></div><br>";
            } ?>
            <input class="caixa_texto" type="text" name="" id="input" value="<?php echo Show_value() ?>">
        </div>
        <div class="painel_teclado_numerico">
            <div class="teclado-numerico">


                <div class=" tecla teclas-ativadas tecla7"><a href="calculo.php?numero=7">7</a></div>


                <div class="tecla8 tecla teclas-ativadas"><a href="calculo.php?numero=8">8</a></div>


                <div class="tecla9 tecla teclas-ativadas"><a href="calculo.php?numero=9">9</a></div>


                <div class="tecla4 tecla teclas-ativadas"><a href="calculo.php?numero=4">4</a></div>


                <div class="tecla5 tecla teclas-ativadas"><a href="calculo.php?numero=5">5</a></div>


                <div class="tecla6 tecla teclas-ativadas"><a href="calculo.php?numero=6">6</a></div>


                <div class="tecla1 tecla teclas-ativadas"><a href="calculo.php?numero=1">1</a></div>


                <div class="tecla2 tecla teclas-ativadas"><a href="calculo.php?numero=2">2</a></div>


                <div class="tecla3 tecla teclas-ativadas"><a href="calculo.php?numero=3">3</a></div>


                <div class="tecla-virgula tecla teclas-ativadas"><a href="calculo.php?numero=.">.</a></div>


                <div class="tecla0 tecla teclas-ativadas"><a href="calculo.php?numero=0">0</a></div>


                <div class="tecla-soma teclas-ativadas"><a href="calculo.php?operador=soma">+</a></div>


                <div class="tecla-sub teclas-ativadas"><a href="calculo.php?operador=subtracao">-</a></div>


                <div class="teclax teclas-ativadas"><a href="calculo.php?operador=multiplicacao">x</a></div>


                <div class="tecla-divisao teclas-ativadas"><a href="calculo.php?operador=divisao">÷</a></div>


                <div class="tecla-resultado" id="resultado"><a href="calculo.php?operador=resultado">=</a></div>

            </div>
        </div>
        <div class="painel_historio">

        </div>

    </div>
</body>

</html>