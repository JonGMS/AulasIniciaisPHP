<?php
session_start();
require_once '../includes/auth.php';
require_once 'classe_livro.php';
verificarLogin();

$id = RetornarID();

if (!isset($_SESSION['id_livro_locacao'])) {
    $_SESSION['id_livro_locacao'] = [];
}

foreach ($_SESSION['id_livro_locacao'] as  $indice => $id_livro) {
    if ($_GET['livro'] == $_SESSION['id_livro_locacao'][$indice]) {
        header('Location: livros.php');

        exit();
    }
}


if (isset($_GET['livro'])) {
    $_SESSION['id_livro_locacao'][] = $_GET['livro'];
}

header('Location: livros.php');

exit();


function RetornarID()
{
    if ($_SESSION['usuario'] == 'ADMIN') {
        return $_POST['membro'];
    } else {
        return $_SESSION['cpf_login'];
    }
}

