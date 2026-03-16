<?php
session_start();
require_once __DIR__ . '/includes/auth.php';
require_once 'ModuloLocacao/classe_locacao.php';
require_once 'ModuloLivros/classe_livro.php';
verificarLogin();
/*efetuar_devolucao.php?id_locacao=69a8cdc3ee735&id_membro=10987654321&livros[0]=699dfc2503960&livros[1]=69a104646c396*/

Locacao::Devolucao($_GET['id_locacao'], $_GET['id_membro']);

$arquivo = fopen(__DIR__ . "/ModuloDados/livros.csv", 'r');
$linhas = [];

while (($linha = fgetcsv($arquivo)) !== false) {
    $linhas[] = $linha;
}
fclose($arquivo);

foreach ($_GET['livros'] as $livroId) {
    foreach ($linhas as &$linha) {
        if ($livroId == $linha[0]) {
            $livro = new Livro(
                $livroId,
                $linha[1],
                $linha[2],
                $linha[3] + 1,
                "DISPONIVEL",
                $linha[5],
                $linha[6],
                $linha[7],
                $linha[8]
            );
            $livro->Editar();
        }
    }
}

unset($_SESSION['dadosLocacao']);

header('Location: index.php');

exit();
