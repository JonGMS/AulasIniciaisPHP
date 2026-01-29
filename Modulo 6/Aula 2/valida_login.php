<link rel="stylesheet" href="../../assets/style.css">
<?php
include_once 'dados.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Acesso inválido");
}
$cpf = isset($_POST['text_cpf']) ? $_POST['text_cpf'] : '';
$password = isset($_POST['text_password']) ? $_POST['text_password'] : '';
$status = " ";

$status = SelecionarLogin($cpf, $password); 
if($status != "ENTROU") {
    echo "<p>Login não concluido. </p>";
    require_once "login.php";
    die("");
}
