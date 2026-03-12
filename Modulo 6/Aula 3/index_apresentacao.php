<?php
session_start();
require_once 'includes/auth.php';
require_once "ModuloLocacao/classe_locacao.php";
verificarLogin();

$dados = ["nome_membro" => [], "livros" => [''], "data_locacao" => [], "data_entrega" => [], "multa" => [], 'status' => []];

$id_locacao = $_GET['id_locacao'];

LocalizarMembro($dados);

$dadosCsv = fopen("ModuloDados/locacao.csv", "r");
while (false !== ($linha = fgetcsv($dadosCsv))) {
    if ($linha[0] == $_GET['id_locacao']) {
        $dados['data_locacao'] = $linha[3];

        $livros = explode(",", $linha[2]);
        $dados['livros'] = $livros;

        $dados['data_entrega'] = $linha[4];
        $status = DefinirStatusMulta($linha[4], $linha[3], $dados);
    }
}

$_SESSION['dadosLocacao'] = $dados;

header('Location: index.php');

exit();

function DefinirStatusMulta($dataDevolucao, $dataLocacao, &$dados)
{
    $dateTimeLocacao = DateTime::createFromFormat('d/m/Y', $dataLocacao);

    $hoje = new DateTime();

    $dateTimeDevolucao = DateTime::createFromFormat('d/m/Y', $dataDevolucao);

    $diferenca = $hoje->diff($dateTimeLocacao);

    $diasPassados = $diferenca->days; //Line

    if ($diasPassados > 7) {

        $dados['status'] = "ATRASADO";

        $diasAtrasados = $diasPassados - 7;

        $dados['multa'] = $diasAtrasados * 0.5;

        return;
    }
    $dados['multa'] = 0;
    $dados['status'] = "ABERTO";
}
function LocalizarMembro(&$dados)
{
    $dadosCSV = fopen("ModuloDados/membros.csv", "r");
    while (false !== ($linha = fgetcsv($dadosCSV))) {
        if ($linha[0] == $_GET['id_membro']) {
            $dados['nome_membro'] =  $linha[2];
            return;
        }
    }
}
