

<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Acesso inválido");
}

$cpf = isset($_POST['text_cpf']) ? $_POST['text_cpf'] : '';

$username = isset($_POST['text_username']) ? $_POST['text_username'] : '';

$password = isset($_POST['text_password']) ? $_POST['text_password'] : '';

Cadastrar($cpf.PHP_EOL.$username.PHP_EOL.$password.PHP_EOL);

function Cadastrar($dados){
    file_put_contents('../Aula 1/dados.txt', $dados, time().FILE_APPEND );
}