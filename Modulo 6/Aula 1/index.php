<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../assets/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <style> 
        .menuSimulacao{
            display: flex;
            align-items: center;
        }
        .button-simulacao{
            margin-inline-start: 10px;
            text-align: center;
            height: 20px;
            width: 100px;
            padding: 10px;
            background-color: darkslategray;
            border-radius: 10px;
            color: white;
        }
        .button-simulacao:hover{
            color: darkblue;
            background-color: white;
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
include_once "functions.php";
include_once "dados.php";
$alunos = DarNotas($alunos);
$alunos = FazerMedias($alunos);

?>

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
            
            <h3 class="titulo-aula">Atividade Simulada</h3>


            <div class="menuSimulacao">
                <h3>Informática</h3>
                <div class="button-simulacao">CLASSE</div>
                <div class="button-simulacao">CARGOS</div>
            </div>
            <table style="width:100%; border: solid 1px black;border-collapse: collapse;">
                <tr style=>
                    <th>NOME</th>
                    <th>1º SEMESTRE</th>
                    <th>2º SEMESTRE</th>
                    <th>3º SEMESTRE</th>
                    <th>4º SEMESTRE</th>
                    <th>MÉDIA</th>
                    <th>STATUS</th>
                </tr>
                <?php
                Boletim($alunos)
                ?>
            </table>
        </div>
    </div>
</body>

</html>