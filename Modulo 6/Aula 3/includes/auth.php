<?php
function verificarLogin()
{
    if (empty($_SESSION['usuario'])) {
        header('Location: ../login.php');
        return;
    }
}

function Show_error($campo, &$inputs)
{

    if (!is_array($inputs)) {
        return '';
    }
    if (key_exists($campo, $inputs)) {
        if (!empty($inputs[$campo]['erro'])) {
            return '<span class="msg-error"><small><i>' . $inputs[$campo]['erro'] . '</i></small></span>';
        } else {
            return '';
        }
    } else {
        return '';
    }
}

function LogDebug($mensagem) {
    file_put_contents(
        "../ModuloDados/debug.log",
        date("d/m/Y H:i:s") . " - " . $mensagem . PHP_EOL,
        FILE_APPEND
    );
}
