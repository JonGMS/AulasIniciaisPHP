<?php

function CriarCSV()
{
    $caminho = "../Aula 1/dados.csv";
    if (file_exists($caminho)) {
        return $file = fopen("../Aula 1/dados.csv", 'a');
    }
    else{
        $file = fopen("../Aula 1/dados.csv", 'w'); //'W de write, colocando nosso CSV no ar
        $header = ['CPF', 'Username', 'password'];
        fputcsv($file, $header); // Cria o arquivo com suas respectivas colunas
        return $file;
    }
}

function Cadastrar($cpf, $username, $password)
{
    $file = CriarCSV();

    $linha = [$cpf, $username, $password];
    fputcsv($file, $linha);
}

function SelecionarLogin($cpf, $password)
{
    $dados = fopen("../Aula 1/dados.csv", "r");
    while (($linha = fgetcsv($dados, 0, ",")) !== false) {
        if ($linha[0] == $cpf && $linha[2] == $password) {
            require_once "../../nav.php";
            echo '<p>Login Ok!</p>';
            $status = "ENTROU";
            return $status;
        }
    }
}


$usuarios = [
    1 =>  ['username' => "Jon", 'password' => '123456'],
    2 =>  ['username' => "Duda", 'password' => '987654'],
    0 =>  ['username' => "admin", 'password' => '5467'],
];
