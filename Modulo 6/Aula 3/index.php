<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades PHP</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="style.css">
    <?php
    $estado_encomenda = "anulada";
    function Tabuada($numeroTabuada)
    {
        Calculo($numeroTabuada);
        $numeroTabuada++;
        return $numeroTabuada;
    }
    function Calculo($numeroFixo)
    {
        $contador = 0;
        while ($contador < 11) {
            $resultado = $numeroFixo * $contador;
            echo "$numeroFixo x $contador = $resultado <br>";
            $contador++;
        }
    }
    ?>
</head>

<body>
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
                <h3 class="titulo-aula">If e Else</h3>
                <?php
                $resultado = match ($estado_encomenda) {
                    'em processamento' => 'A encomenda está a ser tratada',
                    'anulada', 'cancelada' => 'A encomenda foi anulada ou cancelada',
                    'enviada' => 'A encomenda foi enviada.',
                    default => 'Estado da encomenda é desconhecida '
                };

                echo $resultado;
                ?>

                <div class="atividadeTabuada">
                    <?php
                        $numeroTabuada = 1;
                    ?>
                    <!-- <div class="tabuada0">
                        
                    </div> -->
                    <div class="tabuada1">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada2">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada3">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada4">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada5">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada6">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada7">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada8">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada9">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>
                    <div class="tabuada10">
                        <?php $numeroTabuada = Tabuada($numeroTabuada); ?>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>