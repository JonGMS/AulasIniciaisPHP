<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('../../montserrat/Montserrat-Light.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Montserrat';
        }

        .modulo1,
        .modulo2,
        .modulo3,.modulo4, .modulo5, .modulo6 {
            width: 100%;
            height: 100%;
            margin-left: 30px;
        }

        .modulos {
            display: flex;

        }

        .aula {
            border: solid 1px rgb(114, 114, 114);
            height: 25px;
            margin-top: 2px;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: rgb(114, 114, 114);
            text-align: center;
        }
    </style>
    <title>CADERNO - MODULOS</title>
</head>

<body>
    <?php require_once "nav.php";?>
    <div class="content-wrapper">
        <div class="atividades">
            <h2 class="titulo-aula">Modulos</h2>
            <div class="modulos">
                <div class="modulo1">
                    <!-- Adicionar atalhos -->
                    <p class="subtitulo">Modulo 1</p>
                    <a href="Modulo 1/Aula 1/noticia.html">
                        <div class="aula">Formatação de Texto - Listas</div>
                    </a>
                    <a href="Modulo 1/Aula 2/index.html">
                        <div class="aula">Navegação - Imagem</div>
                    </a>
                    <a href="Modulo 1/Aula 3/index.html">
                        <div class="aula">Classe</div>
                    </a>
                    <a href="Modulo 1/Aula 4/index.html">
                        <div class="aula">Evento - Principio</div>
                    </a>
                    <a href="Modulo 1/Aula 5/index.html">
                        <div class="aula">Botão - Primeira experiencia</div>
                    </a>
                </div>
                <div class="modulo2">
                    <p class="subtitulo">Modulo 2</p>
                    <a href="Modulo 2/Aula 7 - Exercicios/index.html">
                        <div class="aula">Tabelas</div>
                    </a>
                    <a href="Modulo 2/Aula 7 - Modulo 2/index.html">
                        <div class="aula">Elementos de Tabelas</div>
                    </a>
                    </a>
                    <a href="Modulo 2/aula 8 - Formulario/contato.html" target="_blank">
                        <div class="aula">Formulario - Input</div>
                    </a>
                    </a>
                    <a href="Modulo 2/aula 9/index.html" target="_blank">
                        <div class="aula">Formulario - Elementos</div>
                    </a>
                </div>
                <div class="modulo3">
                    <p class="subtitulo">Modulo 3</p>
                    <a href="Modulo 3/Aula 1/index.html">
                        <div class="aula">Fontes</div>
                    </a>
                    <a href="Modulo 3/Aula 2/index.html">
                        <div class="aula">Gradação</div>
                    </a>
                    <a href="Modulo 3/Aula 3/index.html">
                        <div class="aula">Responsividade</div>
                    </a>
                    <a href="Modulo 3/Aula 4/index.html">
                        <div class="aula">FlexBox</div>
                    </a>
                    <a href="Modulo 3/Aula 5/index.html">
                        <div class="aula">Grid</div>
                    </a>
                    <a href="Modulo 3/Aula 6/index.html">
                        <div class="aula">CSS Media Queries</div>
                    </a>
                </div>
            </div>
            <div class="modulos">
                <div class="modulo4">
                    <p class="subtitulo">Modulo 4 - JS</p>
                    <a href="Modulo 4/Aula 1/index.html">
                        <div class="aula">Tipos de Variaveis</div>
                    </a>
                    <a href="Modulo 4/Aula 2/index.html">
                        <div class="aula">Function</div>
                    </a>
                    <a href="Modulo 4/Aula 3/index.html">
                        <div class="aula">Objeto</div>
                    </a>
                    <a href="Modulo 4/Aula 4/index.html">
                        <div class="aula">GetElement</div>
                    </a>
                </div>
                <div class="modulo5">
                    <p class="subtitulo">Modulo 5 - BootStrap</p>
                    <a href="#">
                        <div class="aula">Tipos de Variaveis</div>
                    </a>
                    <a href="#">
                        <div class="aula">Function</div>
                    </a>
                    <a href="#">
                        <div class="aula">Objeto</div>
                    </a>
                    <a href="#">
                        <div class="aula">GetElement</div>
                    </a>
                
                </div>
                <div class="modulo6">
                    <p class="subtitulo">Modulo 6 - PHP</p>
                    <a href="Modulo 6/Aula 1/index.php">
                        <div class="aula">Tipos de Variaveis</div>
                    </a>
                    <a href="Modulo 6/Aula 2/login.php">
                        <div class="aula">Atividades</div>
                    </a>
                    <a href="">
                        <div class="aula"></div>
                    </a>
                    <a href="">
                        <div class="aula"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>




</body>

</html>