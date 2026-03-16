<?php
session_start();
require_once 'includes/auth.php';
require_once "ModuloLocacao/classe_locacao.php";
verificarLogin();

$dados = ["id_locacao" =>[] ,"nome_membro" => [],"id_membro" => [] , "livros" => [''], "data_locacao" => [], "data_entrega" => [], "multa" => [], 'status' => []];

$id_locacao = $_GET['id_locacao'];

LocalizarMembro($dados);

$dadosCsv = fopen("ModuloDados/locacao.csv", "r");
while (false !== ($linha = fgetcsv($dadosCsv))) {
    if ($linha[0] == $_GET['id_locacao']) {
        $dados['id_locacao'] = $linha[0];

        $dados['data_locacao'] = $linha[3];

        $livros = explode(",", $linha[2]);
        $dados['livros'] = $livros;

        $dados['data_entrega'] = $linha[4];
        $status = Locacao::DefinirStatusMulta($linha[4], $linha[3], $dados);
    }
}

$_SESSION['dadosLocacao'] = $dados;

header('Location: index.php');

exit();


function LocalizarMembro(&$dados)
{
    $dadosCSV = fopen("ModuloDados/membros.csv", "r");
    while (false !== ($linha = fgetcsv($dadosCSV))) {
        if ($linha[0] == $_GET['id_membro']) {
            $dados['nome_membro'] =  $linha[2];
            $dados['id_membro'] = $_GET['id_membro'];
            return;
        }
    }
}
