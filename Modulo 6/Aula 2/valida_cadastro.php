<link rel="stylesheet" href="../../assets/style.css">

<?php
session_start();
$inputs = [
    'text_cpf' => ['value' => '', 'erro' => ''],
    'text_username' => ['value' => '', 'erro' => ''],
    'text_password' => ['value' => '', 'erro' => '']
];

include_once 'dados.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: cadastro.php');
    return;
}

$cpf = ValidacaoInput($inputs, 'text_cpf');

$username = ValidacaoInput($inputs, 'text_username');

$password = ValidacaoInput($inputs, 'text_password');

if (VerificarErros($inputs)) {

    Cadastrar($cpf, $username, $password);
    header('Location: login.php');

} else {

    header('Location: cadastro.php');
    exit;
}


function ValidacaoInput(&$inputs ,$array)
{
    if (empty($_POST[$array])) {
        $inputs[$array]['erro'] = "Preenchimento obrigatório";
    } else {
        $inputs[$array]['value'] = $_POST[$array];
        if ($array == 'text_cpf') {
            $cpf_convertido = (int) $inputs[$array]['value'];
            if (strlen($cpf_convertido) < 11 || strlen($cpf_convertido) > 11 ||  !is_int($cpf_convertido)) {
                header('Location: cadastro.php');
                return;
            }
            VerificarRepticao($inputs[$array]['value'], $inputs);
        }
        return $_POST[$array];
    }
}

function VerificarRepticao($cpf, &$inputs)
{
    if (file_exists("../Aula 1/CSV/dados.csv")) {
        $file = fopen("../Aula 1/CSV/dados.csv", "r");
        while (($linha = fgetcsv($file)) !== false) {
            if ($linha[0] == $cpf) {
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                    header('Location: cadastro.php');
                    return;
                }
                $inputs['text_cpf']['erro'] = 'CPF já cadastrado';
            }
        }
        fclose($file);
    }
}

function VerificarErros($inputs){
    if(empty($inputs['text_username']['erro']) || empty($inputs['text_password']['erro']) || empty($inputs['text_cpf']['erro'])){
        $_SESSION['inputs'] = $inputs;
        return false;
    }
    return true;

}