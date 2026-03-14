<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once 'includes/auth.php';
require_once 'ModuloLocacao/classe_locacao.php';
require_once 'ModuloLivros/classe_livro.php';
verificarLogin();

if (isset($_SESSION['dadosLocacao'])) {

    $dadosLocacao = $_SESSION['dadosLocacao'];
}

function show_value($campo)
{
    global $dadosLocacao;
    if (isset($_SESSION['dadosLocacao'])) {

        if (key_exists($campo, $dadosLocacao)) {
            if (!empty($dadosLocacao[$campo])) {
                return $dadosLocacao[$campo];
            }
        } else {
            echo '<pre>';
            print_r($dadosLocacao);
            echo '</pre>';
        }
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/style.css">
    <?php if($_SESSION['usuario'] == "ADMIN") : ?>
    <link rel="stylesheet" href="assets/index_admin.css">
    <?php endif;
    if($_SESSION['usuario'] != "ADMIN" ) :
    ?>
    <link rel="stylesheet" href="assets/index_membro.css">
    <?php endif ?>

</head>

<body>
    <header>
        <div class="painel-button">
            <a href="index.php">
                <div class="buttom-menu"><img class="img-menu" src="assets/images/Libros-menu.png" alt=""></div>
            </a>
        </div>

        <div class="painel-menu">
            <div class="painel-menu-grid">
                <div class="titulo">
                    <h1 class="legenda-tipo">MENU</h1>
                </div>

                <div class="campo-pesquisa">
                    <form class="formulario-pesquisa" action="" method="get">
                        <input type="text" name="" id="pesquisa">
                    </form>
                </div>
                <div class="conta-info">
                    <?php echo "<p class='nome-usuario'>" . $_SESSION['usuario'] . "</p>" ?>
                    <img class="imagem-perfil" src="assets/images/MembroOffiline.png" alt="">
                </div>
            </div>

        </div>

    </header>
    <div class="content">
        <div class="menu-button">
            <div class="menu-fixed">

                <a href="ModuloLivros/livros.php" class="button1-menu">
                    <div class="button1-menu">
                        <img src="" alt="">
                        LIVRO
                    </div>
                </a>

                <a href="ModuloLocacao/locacao.php" class="button2-menu">
                    <div class="button2-menu">
                        <img src="" alt="">
                        LOCAÇÃO
                    </div>
                </a>

                <?php
                if ($_SESSION['usuario'] == 'ADMIN') {
                    echo
                    "<a href='ModuloMembro/membro.php' class='button3-menu'><div class='button3-menu'>
                    <img src='' alt=''>
                    MEMBRO
                    </div></a>";
                }

                ?>

            </div>
        </div>

        <div class="content-wraper">
            <div class="painel_index">
                <?php if ($_SESSION['usuario'] == "ADMIN"): ?>
                    <div class="locacao_overflow">
                        <div class="legenda">
                            <div class="nomem_membro">
                                <p style="margin-left: 25px;">MEMBRO</p>
                            </div>
                            <div class="numeroLivros">
                                <p>Nº LIVROS</p>
                            </div>
                            <div class="data_devolucao">
                                <p>DEVOLUÇÃO</p>
                            </div>
                            <div class="status">
                                <p>STATUS</p>
                            </div>

                        </div>

                        <div class="lista_locacoes">
                            <?php Locacao::ApresentarLocacaoAdmin() ?>
                        </div>

                    </div>
                
                <div class="dadosLocacao">
                    <div class="nome_apresentacao">
                        <?php echo show_value('nome_membro') ?>
                    </div>

                    <div class="painelLivros">
                        <div class="painelOverflow">
                            <div class="lista_livros">
                                <div class="overflow_livro">
                                    <?php Livro::ApresentarLivros($dadosLocacao['livros']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="datas">
                        <div class="dataLocacao">
                            <?php echo show_value('data_locacao') ?>
                        </div>
                        <div class="dataDevolucao">
                            <?php echo show_value('data_entrega') ?>
                        </div>

                        <?php
                        if ($dadosLocacao['status'] == 'ABERTO') {
                            echo "<div class='status_livro_aberto'>" .
                                show_value('status') .
                                "</div>";
                        } else {
                            echo "<div class='status_livro_atrasado'>" .
                                show_value('status') .
                                "</div>";
                        }

                        ?>
                        <div class="multa">
                            <?php echo show_value('multa'); ?>
                        </div>
                    </div>

                </div>
                <?php endif ;
                    if($_SESSION['usuario'] != "ADMIN"){
                        include 'index_membro.php';
                    }
                ?>

   
            </div>

        </div>
    </div>
</body>

</html>