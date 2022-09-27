 <?php
    // verificação de login p/ mudar de página
    // verificando qual solicitação foi usada para acessar a página
    if (isset($_POST['btn-enviar'])){
        $erros = array();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            if($_POST['nome'] == "Ester" and $_POST['senha'] == '86973'){
                $_SESSION['loggedin'] = TRUE;
                $_SESSION["nome"] = 'Ester';
                header("location: navegacao.php");
            }else{
                 $_SESSION['loggedin'] = FALSE;
                 $erros[] = "<li> Seu login falhou </li>";
            } 
        }
}

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Login</title>
    <style>
        h1{
            color: red;
            margin-bottom: 15px;
        }

        input{
            margin-top: 10px;
        }

        button{
            background-color: red;
        }
        
        button:hover{
            background-color: #cf3f3f;
            cursor: pointer;
        }
    </style>
</head>

<body>
   <div class="container">
    <h1>Login</h1>
    <br>
    <?php
    if (!empty($erros)) :            // se nao estiver vazio - ou seja se haver erros dentro do array
        foreach ($erros as $erro) : // vou percorrer o array e atribuir para variavel erro
            echo $erro;             // exibindo erros
        endforeach;
    endif;
    ?>
     <!-- especificando página que vai processar as informações e convertendo os caracteres especiais -->
    <form action ="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']);?>" method="POST">
        <input type="text" name="nome" placeholder="Ester">
        <br><br>
        <input type="password" name="senha" placeholder="86973">
        <br><br>
        <button type="submit" name="btn-enviar">Enviar</button>
    </form>
   </div> 
</body>

</html>