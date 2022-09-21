<?php
// Conexão
require_once 'db_connect.php';

// verificando se o login corresponde a algum usuario do nosso banco de dados
// Sessão

session_start();


// botão enviar

if (isset($_POST['btn-entrar'])) :
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

// verificando se os campos vieram vazios

    if (empty($login) or empty($senha)) :
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
    else :                                                           // verificando se esse login existe na nossa base de dados
        $sql = "SELECT login FROM usuarios WHERE login = '$login'"; // selecionando login passado no formulario
        $resultado = mysqli_query($connect, $sql);                  // armazenando o resultado em uma variavel

// agora vamos verificar se esse login existe no banco de dados

        if (mysqli_num_rows($resultado) > 0) :             // verificando se há linhas, ou seja, registros
             $senha = md5($senha);                        // criptografando senha antes de inserir no nosso select
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);
            if (mysqli_num_rows($resultado) == 1) :      // existindo uma correspondencia, é por que o login esta certo
                $dados = mysqli_fetch_array($resultado); // converte esse resultado em um array e atribuir a variavel dados
                mysqli_close($connect);   
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                $_SESSION['nome_usuario'] = $dados['nome'];
                header('Location: home.php');
                else: $erros[] = "<li> Usuário e senha inválidos </li>"; // ou seja == 0
            endif;
        else :
            $erros[] = "<li> Usuário inexistente </li>";                // ou seja < 0
        endif;
    endif;
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>

<body>
    <h1>Página de Login</h1>

    <!-- verificando se existe algum erro para ser exibido -->

    <?php
    if (!empty($erros)) :            // se nao estiver vazio - ou seja se haver erros dentro do array
        foreach ($erros as $erro) : // vou percorrer o array e atribuir para variavel erro
            echo $erro;             // exibindo erros
        endforeach;
    endif;
    ?>

    <hr>
    <!-- mesmo que seja na mesma página é interessante especificar a página que vai processar as informações -->

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        Login: <input type="text" name="login"><br>
        Senha: <input type="password" name="senha"><br>
        <button type="submit" name="btn-entrar">Entrar</button>
    </form>
</body>

</html>