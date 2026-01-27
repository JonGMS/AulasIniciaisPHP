<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../assets/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <style>
        .atividadeTabuada {
            display: grid;

            grid-template-columns: [tabuada1-inicio] 20% [tabuada1-end tabuada2-inicio] 20% [tabuada2-end tabuada3-inicio] 20% [tabuada3-end tabuada4-inicio] 20% [tabuada4-end tabuada5-inicio] 20% [tabuada5-end];
            grid-template-rows: [row1-inicio] 250px [row1-end row2-inicio] 250px [row2-end];
        }

        .tabuada1 {
            grid-column: tabuada1-inicio / tabuada1-end;
            grid-row: row1-inicio / row1-end;
        }

        .tabuada2 {
            grid-column: tabuada2-inicio / tabuada2-end;
            grid-row: row1-inicio / row1-end;
        }

        .tabuada3 {
            grid-column: tabuada3-inicio / tabuada3-end;
            grid-row: row1-inicio / row1-end;
        }

        .tabuada4 {
            grid-column: tabuada4-inicio / tabuada4-end;
            grid-row: row1-inicio / row1-end;
        }

        .tabuada5 {
            grid-column: tabuada5-inicio / tabuada5-end;
            grid-row: row1-inicio / row1-end;
        }

        .tabuada6 {
            grid-column: tabuada1-inicio / tabuada1-end;
            grid-row: row2-inicio / row2-end;
        }

        .tabuada7 {
            grid-column: tabuada2-inicio / tabuada2-end;
            grid-row: row2-inicio / row2-end;
        }

        .tabuada8 {
            grid-column: tabuada3-inicio / tabuada3-end;
            grid-row: row2-inicio / row2-end;
        }

        .tabuada9 {
            grid-column: tabuada4-inicio / tabuada4-end;
            grid-row: row2-inicio / row2-end;
        }

        .tabuada10 {
            grid-column: tabuada5-inicio / tabuada5-end;
            grid-row: row2-inicio / row2-end;
        }

        .tabuada1,
        .tabuada2,
        .tabuada3,
        .tabuada4,
        .tabuada5,
        .tabuada6,
        .tabuada7,
        .tabuada8,
        .tabuada9,
        .tabuada10 {
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .tabelas {
            width: 100%;
            border: solid 1px black;
            border-collapse: collapse;

        }

        .menuSimulacao {
            display: flex;
            align-items: center;
        }

        .button-simulacao {
            margin-inline-start: 10px;
            text-align: center;
            height: 20px;
            width: 100px;
            padding: 10px;
            background-color: darkslategray;
            border-radius: 10px;
            color: white;
        }

        .button-simulacao:hover {
            color: darkblue;
            background-color: lightseagreen;
            cursor: pointer;
        }

        th {
            background-color: darkslategray;
            color: white;
        }

        .notaReprovada {
            color: red;
        }

        .statusReprovado {
            background-color: rgb(251, 134, 134);
            color: rgb(137, 32, 32);
        }

        .notaAprovado {
            color: darkblue;
        }

        .statusAprovado {
            background-color: rgb(68, 224, 81);
            color: green;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
    <title>PHP - Variaveis</title>
</head>
<?php
session_start();
include_once "functions.php";
include_once "dados.php";
$alunos = DarNotas($alunos);
$alunos = FazerMedias($alunos);
require_once "../../nav.php";
?>

<body>
    <div class="content-wrapper">
        <div class="atividades">

            <h3 class="titulo-aula">Atividade Simulada</h3>


            <div class="menuSimulacao">
                <h3>Informática</h3>
                <div class="button-simulacao" onclick=>CLASSE</div>
                <div class="button-simulacao" onclick="">CARGOS</div>
            </div>

            <table class="tabelas">
                <div class="simulacao">
                    <?php Boletim($alunos) ?>
                </div>
            </table>
            <br>
            <hr>
            <br>
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
</body>

</html>