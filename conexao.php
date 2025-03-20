<?php
$host = "localhost"
$usuario = "root"; 
$password = ""; 
$database = "Sistema_CRUD"; 

$conexao = mysql_connect( $host, $usuario, $password, $database ) or die("Falha na  conexão: ".mysql_connect_error()); 

?>