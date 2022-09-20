<?php
session_start();

// só vou conseguir acessar o cadastro, se eu estiver logada
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
    <h1>Cadastro de aluno</h1>
    <form action="dados.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome"><br>
        <label>Sobrenome:</label><br>
        <input type="text" name="sobrenome"><br>
        <label>RA:</label><br>
        <input type="number" name="ra"><br>
        <button type="submit" name="btn-cadastrar">Cadastrar</button>
   </form>
   
</body>
</html>