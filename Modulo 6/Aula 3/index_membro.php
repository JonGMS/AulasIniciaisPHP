<?php
// session_start();
// print_r($_SESSION['dados_membro']);

// $dados = fopen("ModuloDados/membros.csv", "r");
require_once "ModuloLocacao/classe_locacao.php";
?>


<div class="dados_membro">
    <div class="nome_membro">
        <?php echo $_SESSION['dados_membro']['nome'] ?>
    </div>
    <div class="data_cadastro">
        <div class="apresentacao_data">
            <p>Data de Cadastro</p>
            <div class="date"><?php echo $_SESSION['dados_membro']['data_cadastro'] ?></div>
        </div>

    </div>
</div>
<div class="apresentar_locacoes">
    <div class="painel_locacoes">
        <?php Locacao::ApresentarLocacaoMembro($_SESSION['dados_membro']['cpf']) ?>
    </div>
</div>
<div class="painel_edicao">



</div>