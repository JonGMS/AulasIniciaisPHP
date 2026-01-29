<link rel="stylesheet" href="../../assets/style.css">

<?php
include_once 'dados.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Acesso inválido");
}

$cpf = isset($_POST['text_cpf']) ? $_POST['text_cpf'] : '';

ValidarCPF($cpf);

$username = isset($_POST['text_username']) ? $_POST['text_username'] : '';

$password = isset($_POST['text_password']) ? $_POST['text_password'] : '';

Cadastrar($cpf, $username, $password);

function ValidarCPF($cpf)
{
    $cpf_convertido = (int) $cpf;
    if (strlen($cpf_convertido) < 11 || strlen($cpf_convertido) > 11 ||  !is_int($cpf_convertido)) {
        require_once "cadastro.php";
        die("CPF inválido");
    }
    VerificarRepticao($cpf);
}
function VerificarRepticao($cpf)
{
    if (file_exists("../Aula 1/dados.csv")) {
        $file = fopen("../Aula 1/dados.csv", "r");
        while (($linha = fgetcsv($file)) !== false) {
            if ($linha[0] == $cpf) {
                require_once "cadastro.php";
                die("CPF já cadastrado");
            }
        }
        fclose($file);
    }
}
