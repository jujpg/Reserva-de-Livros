<?php
$user = "root"; 
$password = ""; 
$database = "biblioteca"; 

# O hostname deve ser sempre localhost 
$hostname = "localhost"; 

# Conecta com o servidor de banco de dados 
$conn = new mysqli( $hostname, $user, $password, $database ) or die( ' Erro na conexão ' ); 

?>