<?php
$host = "localhost";
$usuario = "root"; 
$password = ""; 
$database = "sistema_crud"; 

$conexao = mysqli_connect($host, $usuario, $password, $database) 
    or die("Falha na conexão: " . mysqli_connect_error()); 
?>
