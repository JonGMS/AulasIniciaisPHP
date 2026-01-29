<link rel="stylesheet" href="../../assets/style.css">
<?php
include_once 'dados.php';



if ($usuarios == null) {
    die("Usuarios não chamados.");
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Acesso inválido");
}

$username = isset($_POST['text_username']) ? $_POST['text_username'] : '';
$password = isset($_POST['text_password']) ? $_POST['text_password'] : '';
$status = " ";

for ($i = 0; $i < count($usuarios); $i++) {
    if ($usuarios[$i]['username'] == $username && $usuarios[$i]['password'] == $password) {
        require_once "../../nav.php";
        echo '<p>Login Ok!</p>';
        $status = "ENTROU";
    }
}
if ($status != "ENTROU") {
    echo "<p>Login não concluido. </p>";
    require_once "login.php";
    die("");
}
