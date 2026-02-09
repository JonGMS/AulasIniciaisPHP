<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (empty($_SESSION['usuario'])) {
    header('Location: ../Aula 3/login.php');
    return;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="/assets/style.css">

</head>

<body>

    <div class="content-wraper"> <?php require_once "painel.php" ?>

    </div>

</body>

</html>