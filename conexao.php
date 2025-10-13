<?php

$servidor = 'localhost';
$banco = 'VolleyConnect';
$port = 3306;
$usuario = 'root';
$senha = 'ifsp';

// Estabelece a conexão diretamente na variável $conn
$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $port);

// Verifica a conexão
if(!$conn)
{
    die('Erro: Não foi possível conectar ao MySql. ' . mysqli_connect_error());
}

// Opcional: definir charset para UTF-8 (recomendado)
mysqli_set_charset($conn, "utf8");

?>

