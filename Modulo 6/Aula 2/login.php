<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades PHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <script src="script.js"></script>
    <style>
        .a_link{
            margin-top: 20px;
        }
        .titulo_form{
            padding-top: 20px;
        }
        .formulario_post {
            background-color: rgb(236, 236, 236);
            height: 350px;
            text-align: center;
            margin-inline: 280px;
            border-radius: 20px;

        }

        .campo {
            margin-top: 10px;
        }

        input {
            border-radius: 20px;
            height: 40px;
            width: 250px;
            font-size: 15px;
            border: 0.1px solid grey;
            padding-left: 20px;
        }

        form {
            justify-content: center;
        }

        body {
            background-color: rgb(46, 46, 46);
        }

        .button_submit {
            margin-top: 30px;
            background-color: purple;
            color: white;
        }
    </style>

</head>

<body>

    <?php setcookie('cookiePersonalizado', 'conteudo_do_meu_cokkie', time() + 3600); ?>

    <header class="header-tela">
        <div class="cabecalho">
            <?php require_once "../../nav.php" ?>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="atividades">
            <div class="formulario_post">
                <div class="titulo_form">
                    <h3>Login</h3>
                </div>

                <form action="valida_login.php" method="post">
                    <div class="campo">
                        <label for="id_cpf">CPF:</label><br>
                        <input type="text" name="text_cpf" id="id_cpf"  ><br>
                        <!-- maxlength="11" minlength="11" -->
                    </div>
                    
                    <div class="campo">
                        <label for="id_password">Password</label><br>
                        <input type="password" name="text_password" id="id_password"><br>
                    </div>
                    <div class="a_link">
                        <a href="cadastro.php">Não possui cadastro?</a>
                    </div>
                    
                    <input class="button_submit" type="submit"  value="ENTRAR"> <!--onclick="ValidarCPF()"-->
                </form>

            </div>


        </div>
    </div>

</body>

</html>