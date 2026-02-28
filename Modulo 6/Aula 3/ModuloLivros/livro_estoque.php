<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$dados = fopen('../ModuloDados/livros.csv', 'r');
while (($linha = fgetcsv($dados, 0, ",")) !== false) {
    if ($_GET['livro'] == $linha[0]) {
        $generos = explode(",", $linha[5]);
        $_SESSION['nome'] = $linha[1];
        $_SESSION['autor'] = $linha[2];
        $_SESSION['descricao'] = $linha[7];
        $_SESSION['imagem'] = $linha[8];
        for ($i = 0; $i < count($generos); $i++) {
            $_SESSION['genero'][$i] = $generos[$i];
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/estoque.css">
    <!-- #4B4B44
 -->
    <title><?php echo $_SESSION['nome'] ?></title>
</head>

<body>
    <header>
        <div class="painel-button">
            <a href="index.php">
                <div class="buttom-menu"><img class="img-menu" src="../assets/images/Libros-menu.png" alt=""></div>
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
                    <p class="nome-usuario"><?php echo $_SESSION['usuario'] ?></p>
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
            <div class="painel_apresentacao">
                <div class="painel_imagem">
                    <img src="<?php echo "../ModuloDados/images/" . $_SESSION['imagem'] ?>" alt="">
                </div>
                <div class="painel_opcoes">
                    <div class="panel">
                        <div class="painel_nome">
                            <?php echo $_SESSION['nome'] ?>
                        </div>
                        <div class="painel_descricao">
                            <?php echo $_SESSION['descricao'] ?>
                        </div>
                        <div class="painel_autor">
                            <?php echo $_SESSION['autor'] ?>
                        </div>
                        <div class="painel_genero">
                            <?php
                            for ($i = 0; $i < count($_SESSION['genero']); $i++) {
                                echo "<span class='tag'>" . $_SESSION['genero'][$i] . "</span>";
                            }
                            ?>
                            <span class="tag">Fantasia</span>
                        </div>
                        <form action="valida_adicao.php?<?php echo $_GET['livro']  ?>" method="post">



                            <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'ADMIN'): ?>
                                <div class="buttons">
                                    <a href="conteudo_livro_admin.php">
                                        <div class="button_editar botao">Editar</div>
                                    </a>
                                    <a href="conteudo_livro_admin.php">
                                        <div class="button_editar botao">Excluir</div>
                                    </a>
                                </div>


                                <div class="cadastrar_locacao">
                                    <label for="membro">Membro: </label><br>
                                    <select class="select_membros" name="membro" id="membro">
                                        <?php
                                        $dados = fopen('../ModuloDados/membros.csv', 'r');
                                        while (($linha = fgetcsv($dados, 0, ",")) !== false) {
                                            if ($linha[0] == 'CPF' || $linha[0] == 'ADMIN') {
                                                continue;
                                            }
                                            echo "<option value='" . $linha[0] . "'>" . $linha[2] . "</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            <?php endif; ?>
                            <input class="submit" type="submit" value="ADICIONAR LIVRO">
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>

</html>