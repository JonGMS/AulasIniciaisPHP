<?php
    setcookie('cookiePersonalizado', 'conteudo_do_meu_cokkie', time() + 3600);

    session_start();
    $inputs = [];

    if(isset($_SESSION['inputs'])){
        $inputs = $_SESSION['inputs'];
        unset($_SESSION['inputs']);
    }
    function show_error($campo){
        global $inputs;
        if(key_exists($campo, $inputs)){
            if(!empty($inputs[$campo]['erro'])){
                return '<span class="text-danger"><small><i>'.$inputs[$campo]['erro'].'</i><small></span>';
            }
            else{
                return '';
            }
        }
        else{
            return '';
        }
    }
    function show_value($campo){
        global $inputs;
        if(key_exists($campo,$inputs)){
            if(!empty($inputs[$campo]['value'])){
                return $inputs[$campo]['value'];
            }
        }
        else{
            return '';
        }
    }
    print_r($inputs)
    
?>
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
        .a_link {
            margin-top: 20px;
        }

        .titulo_form {
            padding-top: 20px;
        }

        .formulario_post {
            background-color: rgb(236, 236, 236);
            height: 420px;
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


    <header class="header-tela">
        <div class="cabecalho">
            <?php require_once "../../nav.php" ?>
        </div>
    </header>
    <div class="content-wrapper">
        <div class="atividades">
            <div class="formulario_post">
                <div class="titulo_form">
                    <h3>Cadastro</h3>
                </div>

                <form action="valida_cadastro.php" method="post">
                    <div class="campo">
                        <label for="id_CPF">CPF:</label><br>
                        <input type="text" name="text_cpf" id="id_cpf" maxlength="11" minlength="11" value=<?php echo show_value('text_cpf') ?>><br>
                        <?php echo show_error('text_cpf') ?>
                    </div>
                    <div class="campo">
                        <label for="id_username">Nome:</label><br>
                        <input type="text" name="text_username" id="id_username" minlength="3" maxlength="20" value=<?php echo show_value('text_username') ?>><br>
                        <?php echo show_error('text_username') ?>
                    </div>

                    <div class="campo">
                        <label for="id_password">Password</label><br>
                        <input type="password" name="text_password" id="id_password" value=<?php echo show_value('text_password') ?>><br>
                        <?php
                        echo show_error('text_password') ?>
                    </div>
                    <div class="a_link">
                        <a href="login.php">login</a>
                    </div>
                    <input class="button_submit" type="submit" onclick="ValidarCPF()" value="CADASTRAR">
                </form>
            </div>
        </div>
    </div>

</body>

</html>