<?php 
// Conexão com banco de dados

//variavel com dados do meu banco de dados
$servername = "localhost"; // endereço do nosso servidor local
$username = "root"; // login phpmyadmin
$password = ""; // login phpmyadmin
$db_name = "sistemalogin";  // nome do meu banco de dados   

//conectando com banco de dados
// msqli suporte para programação procedural e orientada a objeto
$connect = mysqli_connect($servername, $username, $password, $db_name);

// verificando se há erros de conexão com o banco
if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;