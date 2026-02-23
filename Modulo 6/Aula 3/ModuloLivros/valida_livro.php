<?php
session_start();
require_once '../includes/auth.php';
require_once 'classe_livro.php';
verificarLogin();

$inputs = [
    'text_nome' => ['value' => "" , 'error' => ""],
    'text_autor'  => ['value' => "" , 'error' => ""],
    'text_quantidade'  => ['value' => "" , 'error' => ""],
    'text_genero'  => ['value' => "" , 'error' => ""],
    'text_colecao'  => ['value' => "" , 'error' => ""],
    'text_descricao'  => ['value' => "" , 'error' => ""]
];

$nome = ValidarInput('text_nome', $inputs);

$autor = ValidarInput('text_autor', $inputs);

$quantidade = ValidarInput('text_quantidade', $inputs);

$genero = ValidarInput('text_genero', $inputs);

$descricao = ValidarInput('text_descricao', $inputs);

$id = DefinirId(); //Fazer

$status = 'DISPONÍVEL';

$colecao = $_POST['text_descricao'];

$livro = new Livro($id, $nome, $autor, $quantidade, $status, $genero, $colecao, $descricao);

$livro->Cadastrar();

function ValidarInput($inputName, &$inputs){
    if (!isset($_POST[$inputName]) || empty($_POST[$inputName])) {
        $inputs[$inputName]['erro'] = "Campo Obrigatório!";
        return null;
    }
    return $_POST[$inputName];
}
function DefinirId(){
    $id =0;
    return $id; 
}
?>