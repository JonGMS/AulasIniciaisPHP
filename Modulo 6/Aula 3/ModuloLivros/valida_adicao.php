<?php
session_start();
require_once '../includes/auth.php';
require_once 'classe_livro.php';
verificarLogin();

$id = RetornarID();

if (!isset($_SESSION['id_livro_locacao'])) {
    $_SESSION['id_livro_locacao'] = [];
}
if (!isset($_SESSION['admin_relacoes'])) {
    $_SESSION['admin_relacoes'] = [];
}

if (isset($_GET['livro'])) {
    $idLivro = $_GET['livro'];

    if ($_SESSION['usuario'] != "ADMIN") {
        if (!in_array($idLivro, $_SESSION['id_livro_locacao'])) {
            $_SESSION['id_livro_locacao'][] = $idLivro;
        }
    } else {

        $idMembro = RetornarID();


        if (!isset($_SESSION['admin_relacoes'][$idMembro])) {
            $_SESSION['admin_relacoes'][$idMembro] = [];
        }

        if (!in_array($idLivro, $_SESSION['admin_relacoes'][$idMembro])) {
            $_SESSION['admin_relacoes'][$idMembro][] = $idLivro;
        }
    }
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
