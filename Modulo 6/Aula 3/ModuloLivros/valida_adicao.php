<?php
session_start();
require_once '../includes/auth.php';
require_once 'classe_livro.php';
verificarLogin();

$id = RetornarID();

$_SESSION['id_livro_locacao'] = $_GET['livro'];

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

function AlterarQuantidade($id_livro){
    $dados = fopen("../ModuloDados/livros.php","r");
    while(($linha = fgetcsv($dados, 0, ",")) !==false){
        $linhas[] = $linha;
    }
    fclose($dados);

    foreach ($linhas as &$linha) {
        if($linha[0] == $id_livro){
            $linha[3] = max(0, $linha[3]- 1);
        }
    }

    $dados = fopen("../ModuloDados/livros.csv", "w");
    foreach ($linhas as $linha){
        fputcsv($dados, $linha);
    }
    fclose($dados);

}
