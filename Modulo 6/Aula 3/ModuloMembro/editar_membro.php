<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__.'/../includes/auth.php';
require_once 'classe_membro.php';
verificarLogin();

if (isset($_SESSION['inputs'])) {
    $inputs = $_SESSION['inputs'] ?? [];
    unset($_SESSION['inputs']);
}


?>

<form class="editar_membro" action="ModuloMembro/valida_editar_membro.php" method="post">
    <div class="formulario">
        <h2>EDITAR</h2>
        <div class="campo_cpf">
            <label for="text_cpf">CPF <?php echo Show_error('text_cpf', $inputs)?></label><br>
            <input type="text" name="text_cpf" id="text_cpf" maxlength="11" value=<?php echo $_SESSION['dados_membro']['cpf'] ?>><br>
        </div>

        <div class="campo_nome">
            <label for="text_nome">Nome <?php echo Show_error('text_nome', $inputs)?></label><br>
            <input type="text" name="text_nome" id="text_nome" value=<?php echo $_SESSION['dados_membro']['nome'] ?>><br>
        </div>

        <div class="campo_password">
            <label for="text_password">Senha <?php echo Show_error('text_password', $inputs)?></label><br>
            <input type="password" name="text_password" id="text_password" value=<?php echo $_SESSION['dados_membro']['senha'] ?>><br>
        </div>


        <div class="campo_telefone">
            <label for="text_telefone">Telefone <?php echo Show_error('text_telefone', $inputs)?></label><br>
            <input type="tel" name="text_telefone" id="text_telefone" placeholder="(DD) " maxlength="11" minlength="8" value=<?php echo $_SESSION['dados_membro']['telefone'] ?>><br>
        </div>

        <div class="campo_endereco">
            <label for="text_endereco">Endereço <?php echo Show_error('text_endereco', $inputs)?></label><br>
            <input type="text" name="text_endereco" id="text_endereco" value=<?php echo $_SESSION['dados_membro']['endereco'] ?>><br>
        </div>


        <input type="submit" value="EDITAR">
    </div>

</form>