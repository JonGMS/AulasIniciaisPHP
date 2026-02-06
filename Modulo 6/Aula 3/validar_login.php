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
        registrarLog(__METHOD__, $erro1 . $erro2);
        header('Location: login.php');
        exit;
    }
} else {
    $erro1 = $inputs['text_cpf']['erro'];
    $erro2 = $inputs['text_cpf']['erro'];
    registrarLog(__METHOD__, $erro1 . $erro2);
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
        registrarLog(__METHOD__, "É ADMIN");
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
            registrarLog(__METHOD__, "Teve erro e retornamos Falso: " . $inputs['text_password']['erro'] . $inputs['text_cpf']['erro']);
            return false;
        }
        return true;
    } catch (Exception) {
        throw new Exception("Erro ao Validar Erro");
    }
}

function VereficarLogin($cpf, $password)
{
    
    $dados = fopen("ModuloDados/membros.csv", "r");
    while (($linha = fgetcsv($dados, 0, ",")) !== false) {
        if ($linha[0] == $cpf && $linha[1] == $password) {
            $_POST['usuario'] = $linha[2];
            $_SESSION['usuario'] = $_POST['usuario'];
            registrarLog(__METHOD__, "Acertou CPF e Senha: $linha[0] e $linha[1]");
            return true;
        }
    }
}
function registrarLog($metodo, $mensagem)
{
    $mensagem = $metodo . " - " . $mensagem;
    $arquivo = __DIR__ . "/ModuloDados/logErros.txt";

    $dataHora = date("Y-m-d H:i:s");
    $linha = "[$dataHora] $mensagem" . PHP_EOL;
    file_put_contents($arquivo, $linha, FILE_APPEND);
}
