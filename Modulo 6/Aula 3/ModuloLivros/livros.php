<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once '../includes/auth.php';
verificarLogin();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link rel="stylesheet" href="../assets/style.css">
    <?php 
        if($_SESSION['usuario'] == 'ADMIN'){
                echo "<link rel='stylesheet' href='../assets/livro_admin.css'>";
            }
            else{
                
                echo "<link rel='stylesheet' href='../assets/livro_membro.css'>";
            }
    ?>
</head>

<body>
    <header>
        <div class="painel-button">
            <a href="../index.php">
                <div class="buttom-menu"><img class="img-menu" src="../assets/images/Libros-menu.png" alt=""></div>
            </a>
        </div>

        <div class="painel-menu">
            <div class="painel-menu-grid">
                <div class="titulo">
                    <h1 class="legenda-tipo">LIVROS</h1>
                </div>

                <div class="campo-pesquisa">
                    <form class="formulario-pesquisa" action="" method="get">
                        <input type="text" name="" id="pesquisa">
                    </form>
                </div>
                <div class="conta-info">
                    <?php echo "<p class='nome-usuario'>" . $_SESSION['usuario'] . "</p>" ?>

                    <img class="imagem-perfil" src="../assets/images/MembroOffiline.png" alt="">
                </div>
            </div>

        </div>

    </header>
    <div class="content">
        <div class="menu-button">
            <div class="menu-fixed">

                <a href="../ModuloLivros/livros.php" class="button1-menu">
                    <div class="button1-menu">
                        <img src="" alt="">
                        LIVRO
                    </div>
                </a>

                <a href="../ModuloLocacao/locacao.php" class="button2-menu">
                    <div class="button2-menu">
                        <img src="" alt="">
                        LOCAÇÃO
                    </div>
                </a>

                <?php
                if ($_SESSION['usuario'] == 'ADMIN') {
                    echo
                    "<a href='../ModuloMembro/membro.php' class='button3-menu'><div class='button3-menu'>
                    <img src='' alt=''>
                    MEMBRO
                    </div></a>";
                }

                ?>

            </div>
        </div>

        <div class="content-wraper">
            <?php 
            if($_SESSION['usuario'] == 'ADMIN'){
                include "conteudo_livro_admin.php";
            }
            else{
                include "conteudo_livro_membro.php";
            }
            
            ?>
        </div>
    </div>
</body>

</html>