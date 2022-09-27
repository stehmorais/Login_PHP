<?php
// para pegar registros do banco de dados
require_once 'db_connect.php';

session_start();

// Verificação de sessão para pagina restrita
if (!isset($_SESSION['logado'])) :
    header('Location: index.php');
endif;

//Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Restrita</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: consolas;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #111;
        }

        .scan {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .scan h1{
            color: white;
        }

        .scan .link{
            color: red;
            font-size: 25px;
            text-decoration: none;
        }

        .scan .fingerprint {
            position: relative;
            width: 300px;
            height: 380px;
            margin-top: 30px;
            background: url("./images/fingerPrint_01.png");
            background-size: 300px;
        }

        .scan .fingerprint::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("./images/fingerPrint_02.png");
            background-size: 300px;
            animation: animate 4s ease-in-out infinite;
        }

        @keyframes animate {

            0%,
            100% {
                height: 0%;
            }

            50% {
                height: 100%;
            }
        }

        .scan .fingerprint::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: #3fefef;
            border-radius: 8px;
            filter: drop-shadow(0 0 20px #3fefef) drop-shadow(0 0 60px #3fefef);
            animation: animate_line 4s ease-in-out infinite;
        }

        @keyframes animate_line {

            0%,
            100% {
                top: 0%;
            }

            50% {
                top: 100%;
            }
        }

        .scan h3 {
            text-transform: uppercase;
            font-size: 2em;
            letter-spacing: 2px;
            margin-top: 20px;
            color: #3fefef;
            filter: drop-shadow(0 0 20px #3fefef) drop-shadow(0 0 60px #3fefef);
            animation: animate_text 0.5s steps(1) infinite;
        }

        @keyframes animate_text {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="scan">
        <h1>Bem vinda <?php echo $_SESSION["nome_usuario"]; ?></h1>
            <a class="link" href="logout.php">Sair</a>
            <div class="fingerprint"></div>
        <h3>Scanning...</h3>
    </div>
</body>

</html>