<?php
if (empty($_SESSION['usuario'])) {
    header('Location: ../Aula 3/login.php');
    return;
}

?>