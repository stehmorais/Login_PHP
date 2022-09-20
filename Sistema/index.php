 <?php
    // verificação de login p/ mudar de página
    // verificando qual solicitação foi usada para acessar a página
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        if($_POST['nome'] == "Ester" and $_POST['senha'] == '86973'){
            $_SESSION['loggedin'] = TRUE;
            $_SESSION["nome"] = 'Ester';
            header("location: navegacao.php");
    }else{
        $_SESSION['loggedin'] = FALSE;
        echo "Seu Login falhou"; 
        } 
    }
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
   <h1>Bem vindo a sua área de Login</h1>
   
    <!-- especificando página que vai processar as informações e convertendo os caracteres especiais -->
   <form action ="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']);?>" method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" placeholder="Ester"><br>
    <label>Senha:</label>
    <input type="password" name="senha"><br>
    <button type="submit" name="btn-enviar">Enviar</button>
   </form>
   
</body>

</html>