<?php
session_start();
require_once '../includes/auth.php';
require_once 'classe_livro.php';
verificarLogin();

$inputs = [
    'text_nome' => ['value' => "", 'error' => ""],
    'text_autor'  => ['value' => "", 'error' => ""],
    'text_quantidade'  => ['value' => "", 'error' => ""],
    'generos'  => ['value' => "", 'error' => ""],
    'text_colecao'  => ['value' => "", 'error' => ""],
    'text_descricao'  => ['value' => "", 'error' => ""]
];

$nome = ValidarInput('text_nome', $inputs);

$autor = ValidarInput('text_autor', $inputs);

$quantidade = ValidarInput('text_quantidade', $inputs);

if (!isset($_POST['generos']) || empty($_POST['generos'])) {
    $inputs['text_genero']['error'] = "Selecione ao menos um gênero!";
    $genero = null;
} else {
    $genero = implode(",", $_POST['generos']);
}


$descricao = ValidarInput('text_descricao', $inputs);
ValidarDescricao($inputs);

$colecao = strtoupper($_POST['text_colecao']);



if (AnalizarErros($inputs)) {

    $id = uniqid();
    $imagem = SalvarImagem();
    $livro = new Livro($id, $nome, $autor, $quantidade, 'DISPONÍVEL', $genero, $colecao, $descricao, $imagem);
    $livro->Cadastrar();
    header('Location: livros.php');
    var_dump("Entrou Aqui");
    exit();
} else {
    header('Location: livros.php');
    exit();
}

function ValidarDescricao(&$inputs)
{
    if (strlen($_POST['text_descricao']) > 200) {
        $inputs['text_descricao']['error'] = "Descrição muito longa (max: 40)";
    }
}

function ValidarInput($inputName, &$inputs)
{
    if (!isset($_POST[$inputName]) || empty($_POST[$inputName])) {
        $inputs[$inputName]['error'] = "Campo Obrigatório!";
        return null;
    }
    return $_POST[$inputName];
}


function AnalizarErros(&$inputs)
{
    foreach ($inputs as $campo) {
        if (!empty($campo['error'])) {
            $_SESSION['inputs'] = $inputs;
            return false;
        }
    }
    return true;
}

function SalvarImagem()
{
    if (isset($_FILES['capa']) && $_FILES['capa']['error'] === 0) {

        $extensao = pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);
        $imagem = uniqid() . "." . $extensao;
        move_uploaded_file(
            $_FILES['capa']['tmp_name'],
            "../ModuloDados/images/" . $imagem
        );
        return $imagem;
    } else {
        return $imagem = null;
    }
}
