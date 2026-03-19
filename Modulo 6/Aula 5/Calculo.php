<?php
session_start();
$valoresLabel= [];

if(isset($_GET['numero'])){
    $caracteres++;
    $_SESSION['valores'] = $_GET['numero'];
    
    $_SESSION['historicoValores'] = $_SESSION['historicoValores'].$_GET['numero'];

    $_SESSION['valores'] = $_SESSION['historicoValores'];
    unset($_GET['numero']);
    header('location: index.php');
}
else if(isset($_GET['operador'])){
    
    $operador = ObterOperador();

    $historico = $_SESSION['historicoValores']." $operador ";

    $_SESSION['historico'] = $historico;

    unset($_SESSION['historicoValores']);
    unset($_SESSION['valores']);

    echo $historico;
}

// header('location: index.php');


function ObterOperador(){
    if($_GET['operador'] == "soma"){
        return '+';
    }
    else if($_GET['operador'] == "subtracao"){
        return '-';
    }
    else if($_GET['operador'] == "divisao"){
        return '/';
    }
    else if($_GET['operador'] == "multiplicacao"){
        return 'x';
    }
    return "erro";
}