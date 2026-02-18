<?php
function verificarLogin()
{
    if (empty($_SESSION['usuario'])) {
    header('Location: ../login.php');
    return;
}
}
