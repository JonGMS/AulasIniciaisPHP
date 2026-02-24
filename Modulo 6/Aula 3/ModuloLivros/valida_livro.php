<?php
session_start();
require_once '../includes/auth.php';
require_once 'classe_livro.php';
verificarLogin();

$inputs = [
    'text_nome' => ['value' => "", 'error' => ""],
    'text_autor'  => ['value' => "", 'error' => ""],
    'text_quantidade'  => ['value' => "", 'error' => ""],
    'text_genero'  => ['value' => "", 'error' => ""],
    'text_colecao'  => ['value' => "", 'error' => ""],
    'text_descricao'  => ['value' => "", 'error' => ""]
];

$nome = ValidarInput('text_nome', $inputs);

$autor = ValidarInput('text_autor', $inputs);

$quantidade = ValidarInput('text_quantidade', $inputs);

$genero = ValidarInput('text_genero', $inputs);

$descricao = ValidarInput('text_descricao', $inputs);
ValidarDescricao();

$colecao = $_POST['text_colecao'];

$imagem = 'LocalDaImagem'; //fazer

if (AnalizarErros($inputs)) {

    $id = DefinirId(); //Fazer
    $livro = new Livro($id, $nome, $autor, $quantidade, 'DISPONÍVEL', $genero, $colecao, $descricao, $imagem);
    $livro->Cadastrar();
    header('Location: livros.php');
    exit();
}
else{
    header('Location: livros.php');
    exit();
}

function ValidarDescricao(){
    if(strlen($_POST['text_descricao']) > 40){
        $inputs['text_descricao']['error'] = "Descrição muito longa (max: 40)";
    }
}

function ValidarInput($inputName, &$inputs)
{
    if (!isset($_POST[$inputName]) || empty($_POST[$inputName])) {
        $inputs[$inputName]['erro'] = "Campo Obrigatório!";
        return null;
    }
    return $_POST[$inputName];
}

function DefinirId()
{
    $id = 0;
    return $id;
}

function AnalizarErros(&$inputs)
{
    if (isset($inputs['text_nome']['error']) || isset($inputs['text_autor']['error']) || isset($inputs['text_quantidade']['error']) || isset($inputs['text_genero']['error']) || isset($inputs['text_descricao']['error'])) {
        $_SESSION['inputs'] = $inputs;
        return false;
    }
    return true;
}
