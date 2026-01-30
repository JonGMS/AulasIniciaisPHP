<?php
session_start();
include_once 'dados.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: cadastro.php');
    return;
}

$input = [
    'text_cpf' => ['value' => '', 'erro' => ''],
    'text_password' => ['value' => '', 'erro' => '']
];
//

$cpf = ValidarInput($input, 'text_cpf');

$password = ValidarInput($input, 'text_password');

if(VerificarErros($input)){
   $status = SelecionarLogin($cpf, $password);

    if ($status == "ENTROU") {
        header('Location: ../Aula 1/index.php');
        echo "Problema no index".$_POST['usuario'];
        exit;
    } else {
        echo "Login inválido";
        exit;
    }
}
else{
    header('Location: ../Aula 1/index.php');
    exit;
}




$status = " ";

$status = SelecionarLogin($cpf, $password);
if ($status != "ENTROU") {
    echo "<p>Login não concluido. </p>";
    require_once "login.php";
    die("");
}
function ValidarInput(&$input, $array)
{
    if (empty($_POST[$array]) !== false) {
        $input[$array]['erro'] = 'Preenchimento obrigatório';
        return $input[$array]['erro'];
    } else {
        $input[$array]['value'] = $_POST[$array];
        $valor = $_POST[$array];
        if ($array == 'text_cpf') {
            $cpf_convertido = (int) $_POST[$array];
            if (strlen($valor) < 11 || strlen($valor) > 11 || !is_numeric($cpf_convertido)) {
                header('Location: login.php');
                return;
            }
        }
        return $input[$array]['value'];
    }
}
function VerificarErros($inputs){
    if( !empty($inputs['text_password']['erro']) || !empty($inputs['text_cpf']['erro'])){
        $_SESSION['inputs'] = $inputs;
        return false;
    }
    return true;

}
