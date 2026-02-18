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
    <title>Membro</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/membro.css">


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
                    <h1 class="legenda-tipo">MEMBROS</h1>
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
            <div class="cadastrar_membro">
                <form action="cadastro_membro.php" method="post">
                    <h2>CADASTRAR</h2>
                    <div class="campo_cpf">
                        <label for="text_cpf">CPF</label><br>
                        <input type="text" name="text_cpf" id="text_cpf" maxlength="11"><br>
                    </div>

                    <div class="campo_nome">
                        <label for="text_nome">Nome</label><br>
                        <input type="text" name="text_nome" id="text_nome"><br>
                    </div>

                    <div class="campo_password">
                        <label for="text_password">Senha</label><br>
                        <input type="password" name="text_password" id="text_password"><br>
                    </div>


                    <div class="campo_telefone">
                        <label for="text_telefone">Telefone</label><br>
                        <input type="tel" name="text_telefone" id="text_telefone" placeholder="(DD) " maxlength="11" minlength="8"><br>
                    </div>

                    <div class="campo_endereco">
                        <label for="text_endereco">Endereço</label><br>
                        <input type="text" name="text_endereco" id="text_endereco"><br>
                    </div>
                    
                    
                    <input type="submit" value="CADASTRAR">
                </form>
            </div>
            <div class="listar_membro">

            </div>
        </div>
    </div>
</body>

</html>