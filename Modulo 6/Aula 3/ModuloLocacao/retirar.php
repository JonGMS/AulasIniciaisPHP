<?php
session_start();
require_once '../includes/auth.php';
verificarLogin();



foreach ($_SESSION['id_livro_locacao'] as $indice => $id_livro) {
    if ($id_livro == $_GET['livro_finalizacao']) {
        unset($_SESSION['id_livro_locacao'][$indice]);
    }
}

header('Location: locacao.php');
