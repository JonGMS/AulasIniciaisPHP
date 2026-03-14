<?php
session_start();
require_once '../includes/auth.php';
require_once "classe_locacao.php";
verificarLogin();

$id = uniqid();

if ($_SESSION['usuario'] == "ADMIN") {
    $membro = $_GET['membro'];
} else {
    $_SESSION['cpf_login'];
}

$dataLocacao = date('d/m/Y');

$dataEntrega = date('d/m/Y', strtotime("+7 days"));

$livro = $_POST['livro']; // array de IDs
$livrosString = implode(",", $livro); // "idlivro1,idlivro2"

$locacao = new Locacao($id, $membro, $livrosString, $dataLocacao, $dataEntrega, "ABERTO", "0,00");

$locacao->Cadastrar();

$locacao->AlterarQuantidade($livro);

unset($_SESSION['id_livro_locacao']);

header('Location: ../index.php');

exit();
