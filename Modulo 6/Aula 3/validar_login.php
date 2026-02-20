<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: login.php');
    return;
}
$inputs = [
    'text_cpf' => ['value' => '', 'erro' => ''],
    'text_password' => ['value' => '', 'erro' => '']
];

$cpf = ValidarInput($inputs, 'text_cpf');

$password = ValidarInput($inputs, 'text_password');

if (ValidarErro($inputs)) {
    if (VereficarLogin($cpf, $password)) {

        header('Location: index.php');
    } else {
        $erro1 = $inputs['text_cpf']['erro'];
        $erro2 = $inputs['text_cpf']['erro'];
        header('Location: login.php');
        exit;
    }
} else {
    $erro1 = $inputs['text_cpf']['erro'];
    $erro2 = $inputs['text_cpf']['erro'];
    header('Location: login.php');
    exit;
}

function ValidarInput(&$inputs, $array)
{
    try {
        if (empty($_POST[$array])) {
            $inputs[$array]['erro'] = "Campo Obrigatório.";
            return $_POST[$array];
        } else {

            if ($array == 'text_cpf') {
                ValidarCPF($inputs, $array);
            }
            $inputs[$array]['value'] = $_POST[$array];
            return $_POST[$array];
        }
    } catch (Exception) {
        throw new Exception("Erro ao Validar Input");
    }
}

function ValidarCPF(&$inputs, $array)
{
    if ($_POST[$array] == "ADMIN") {
        return;
    }

    $cpfInt = (int) $_POST[$array];
    if (!is_numeric($cpfInt) || strlen($_POST[$array]) != 11) {

        $inputs[$array]['erro'] = "CPF inválido.";
    }
}

function ValidarErro(&$inputs)
{
    try {
        if (!empty($inputs['text_cpf']['erro']) || !empty($inputs['text_password']['erro'])) {
            return false;
        }
        return true;
    } catch (Exception) {
        throw new Exception("Erro ao Validar Erro");
    }
}

function VereficarLogin($cpf, $password)
{
    session_start();
    $dados = fopen(__DIR__ . "/ModuloDados/membros.csv", "r");
    if (!$dados) {
        die("Não foi possível abrir o arquivo.");
    }
    while (($linha = fgetcsv($dados, 0, ",")) !== false) {
        if ($linha[0] == $cpf && $linha[1] == $password) {
            $_POST['usuario'] = $linha[2];
            $_SESSION['usuario'] = $_POST['usuario'];
            
            return true;
        }
    }
    fclose($dados);
}

