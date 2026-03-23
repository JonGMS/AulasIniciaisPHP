<?php 

// phpinfo();

use FFI\Exception;
//PHP Data Object
$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123';
try
{
    $ligacao = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

$estado = $ligacao->getAttribute(PDO::ATTR_CONNECTION_STATUS);
echo $estado;
}
catch(PDOException $err){
    echo 'ERRO: '.$err->getMessage();
}

$resultados = $ligacao->query("SELECT * FROM produtos");//->fetchAll(); //fetch() mostra só o primeiro dado

//PDO::ERRMODE_SILENT - Não apresenta erro
//PDO::ERRMODE_WARNING - Apresenta avisos
//PDO::ERRMODE_EXCEPTION - Dispara excepções que podem ser captadas no catch

echo '<pre>';
print_r($resultados);
echo('</pre>');
while($linha = $resultados->fetch()){
    echo 'Produto: '.$linha['nome']."<br>";
}
$ligacao = null;