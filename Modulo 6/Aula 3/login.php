<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/login.css">
    <title>Login</title>
</head>

<body>
    <div class="formulario_login">
        <h1 class="titulo_login">LOGIN</h1>
        <form action="validar_login.php" method="post">
            <div class="formulario">
                <div class="campo_cpf">

                    <label for="text_cpf">CPF:</label>

                    <input type="text" name="text_cpf" id="text_cpf" class="input_cpf" maxlength="11">

                </div>
                <div class="campo_password">

                    <label for="text_password">SENHA:</label>

                    <input type="password" name="text_password" id="text_password"
                        class="input_password">

                </div>
                <div class="button_entrar">
                    <input type="submit" value="ENTRAR" class="entrar">
                </div>
            </div>

        </form>
    </div>

</body>

</html>