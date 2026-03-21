<?php
session_start();
$valoresLabel = [];

if (isset($_GET['numero'])) {
    $_SESSION['valores'] = $_GET['numero'];

    $_SESSION['historicoValores'] = $_SESSION['historicoValores'] . $_GET['numero'];

    $_SESSION['valores'] = $_SESSION['historicoValores'];
    unset($_GET['numero']);
    header('location: index.php');
} 
else if (isset($_GET['operador'])) {



    if (empty($_SESSION['historico'])) {
        $operador = ObterOperador();
        $_SESSION['primeiro_numero'] = $_SESSION['historicoValores'];

        $_SESSION['historico'] = $_SESSION['historicoValores'] . " $operador ";

        $_SESSION['operador'] = $operador;

        unset($_SESSION['historicoValores']);
        unset($_SESSION['valores']);
    } else {
        $_SESSION['segundo_numero'] = $_SESSION['historicoValores'];
        Calculo();
        unset($_SESSION['valores']);
    }
    $_SESSION['valores'] = 0;
}

header('location: index.php');


function ObterOperador()
{
    if ($_GET['operador'] == "soma") {
        return '+';
    } else if ($_GET['operador'] == "subtracao") {
        return '-';
    } else if ($_GET['operador'] == "divisao") {
        return '/';
    } else if ($_GET['operador'] == "multiplicacao") {
        return 'x';
    }
    return "erro";
}

function Calculo()
{
       if ($_SESSION['operador'] == "+") {
        $_SESSION['historicoValores'] = $_SESSION['primeiro_numero'] + $_SESSION['segundo_numero'];
    } else if ($_SESSION['operador'] == "-") {
        $_SESSION['historicoValores'] = $_SESSION['primeiro_numero'] - $_SESSION['segundo_numero'];
    } else if ($_SESSION['operador'] == "/") {
        $_SESSION['historicoValores'] = $_SESSION['segundo_numero'] == 0 
            ? "Erro: divisão por zero" 
            : $_SESSION['primeiro_numero'] / $_SESSION['segundo_numero'];
    } else if ($_SESSION['operador'] == "x") {
        $_SESSION['historicoValores'] = $_SESSION['primeiro_numero'] * $_SESSION['segundo_numero'];
    }

    // não reatribua $_SESSION['valores'] aqui
    $_SESSION['operador'] = ObterOperador();
    $_SESSION['historico'] = $_SESSION['historicoValores']." ".$_SESSION['operador']." ";
    $_SESSION['primeiro_numero'] = $_SESSION['historicoValores'];
}


    // unset($_SESSION[]);

