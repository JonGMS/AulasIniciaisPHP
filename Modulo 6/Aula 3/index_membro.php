<?php
// session_start();
// print_r($_SESSION['dados_membro']);

// $dados = fopen("ModuloDados/membros.csv", "r");
require_once "ModuloLocacao/classe_locacao.php";
?>

<div class="content_membro">
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
        <a href="index.php?painel=Estoque">
            <div class="buttonEditar">
                <img src="assets/images/buttonEstoque.png" alt="">
            </div>
        </a>
        <a href="index.php?painel=Editar">
            <div class="buttonEditar">
                <img src="assets/images/buttonEditar.png" alt="">
            </div>
        </a>
    </div>
    <div class="apresentar_locacoes">
        <div class="painel_locacoes">
            <?php Locacao::ApresentarLocacaoMembro($_SESSION['dados_membro']['cpf']) ?>
        </div>
    </div>

</div>
<div class="painel_acoes">
    <?php
    if (isset($_GET['painel']))
        if ($_GET['painel'] == "Estoque") {

            if (!isset($_SESSION['id_livro_locacao'])) {
                echo 'Nenhum livro adicionado - Vamos mudar isso?';
            }
            if (isset($_SESSION['id_livro_locacao'])) : ?>

            <div class="painel_overflow">
                <h3>LIVROS SELECIONADOS</h3>
                <div class="lista_locacao">
                    <?php Locacao::ListarAdicoesIndex();
                    ?>
                </div>
            </div>

    <?php endif;
        }
    if (isset($_GET['painel'])) {
        if ($_GET['painel'] == "Editar") {
            include __DIR__ . "/ModuloMembro/editar_membro.php";
        }
    }

    ?>
</div>