<!DOCTYPE html>
<html lang="en">
    <?php session_start()?> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades PHP</title>
    <link rel="stylesheet" href="../../assets/style.css">

    <?php
    $nome = "João";
    $frutas = ["Maçã", "Banana", "Tomate", "Abacaxi", "Pera", "Guavirova", "Guarana", "Maracuja"];
    array_push($frutas, "Tamarindo", "Goiaba");
    $frutas = array_reverse($frutas);

    $lojas = [
        'Lisboa' => 'lisboa@hotmail.com',
        'Porto' => 'porto@gmail.com',
        'Coimbra' => 'coimbra@gmail.com'
    ];
    $numero = random_int(1, 5);
    if ($numero == 1)
        $cidade = "Lisboa";
    else if ($numero == 2)
        $cidade = "Porto";
    else if ($numero == 3)
        $cidade = "Coimbra";
    else if ($numero == 4)
        $cidade = "Lages";
    else
        $cidade = "Garopaba";

    ?>
</head>

<body>

    <?php setcookie('cookiePersonalizado' , 'conteudo_do_meu_cokkie', time( )+3600);?>
    <header class="header-tela">
        <div class="cabecalho">
            <a href="../../index.html" class="link-header">
                <div class="button-header">HOME</div>
            </a>
            <a href="../../modulo.html" class="link-header">
                <div class="button-header">MODULOS</div>
            </a>
            <a href="" class="link-header">
                <div class="button-header">TRABALHOS</div>
            </a>
            <a href="https://github.com/JonGMS" class="link-header" target="_blak">
                <div class="button-header">GIT</div>
            </a>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="atividades">
            <div class="painel-tag">
                <h3 class="titulo-aula">Atividade 1</h3>
                <div class="atividade1">

                    <ul>
                        <?php for ($i = 0; $i < count($frutas); $i++)
                            echo "<li>$frutas[$i]</li>";
                        ?>
                    </ul>
                </div>
                <div class="atividade2">
                    <?php if ($nome == "João") : ?>
                        <p>O nome é João.</p>
                    <?php elseif ($nome == "Maria") : ?>
                        <p>O nome é Maria.</p>
                    <?php else : ?>
                        <p>Nome desconhecido.</p>
                    <?php endif; ?>
                </div>
                <div class="atividade3">

                    <?php

                    if (key_exists($cidade, $lojas)) {
                        echo "<h3>$cidade</h3> <p>$lojas[$cidade] </p>";
                    } else {
                        echo "<p>Não existe essa cidade! $cidade</p>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</body>

</html>