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
    <link rel="stylesheet" href="styles/style.css">
    <title>Cadastro</title>
    <style>

        .container{
            text-align: center;
        }

        h1{
            color: purple;
        }
        button{
            background-color: purple;
            margin-top: 15px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
   <div class="container">
    <h1>Cadastro de aluno</h1>
    <br>
    <form action="dados.php" method="POST">
        <input type="text" name="nome" placeholder="Nome">
        <br><br>
        <input type="text" name="sobrenome" placeholder="Sobrenome">
        <br><br>
        <input type="number" name="ra" placeholder="RA">
        <button type="submit" name="btn-cadastrar">Cadastrar</button>
    </form>
   </div> 
</body>
</html>