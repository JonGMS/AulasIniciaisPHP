<?php
session_start();
require_once __DIR__ . '/includes/auth.php';
require_once 'ModuloLocacao/classe_locacao.php';
require_once 'ModuloLivros/classe_livro.php';
verificarLogin();

Locacao::Devolucao($_GET['id_locacao'], $_GET['id_membro']);

// 🔒 Validação do parâmetro
if (!isset($_GET['livros']) || empty($_GET['livros'])) {
    header("Location: livros.php");
    exit();
}


$caminho = __DIR__ . "/ModuloDados/livros.csv";

// 🔒 Verifica se o arquivo existe
if (!file_exists($caminho)) {
    echo "Erro: Arquivo de livros não encontrado.";
    exit();
}

// 🔒 Abre o arquivo com trava (evita conflito)
$arquivo = fopen($caminho, 'c+');

if (!$arquivo) {
    echo "Erro ao abrir o arquivo.";
    exit();
}

flock($arquivo, LOCK_EX); // trava o arquivo

$linhas = [];
$livroEncontrado = false;

// Lê todas as linhas
while (($dados = fgetcsv($arquivo)) !== false) {

    // Estrutura:
    // [0] ID
    // [1] Nome
    // [2] Autor
    // [3] Quantidade
    // [4] Imagem (opcional)
    for($i = 0; $i < count($_GET['livros']); $i++){
        $idLivro = $_GET['livros'][$i];
    }
    

    if ($dados[0] == $idLivro) {
        $dados[3] = (int)$dados[3] + 1;
        $dados[4] = "DISPONIVEL";
        $livroEncontrado = true;
    }

    $linhas[] = $dados;
}

// 🔒 Volta pro início do arquivo
rewind($arquivo);

// 🔥 Limpa o arquivo antes de reescrever
ftruncate($arquivo, 0);

// 🔄 Reescreve tudo
foreach ($linhas as $linha) {
    fputcsv($arquivo, $linha);
}

// 🔓 Libera o arquivo
flock($arquivo, LOCK_UN);
fclose($arquivo);

// ⚠️ Caso não encontre o livro
if (!$livroEncontrado) {
    echo "Livro não encontrado.";
    exit();
}

unset($_SESSION['dadosLocacao']);

// 🔁 Redireciona
header("Location: index.php");
exit();