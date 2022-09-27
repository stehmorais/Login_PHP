<?php

// rececendo dados do formuláro com post
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$ra = $_POST['ra'];

// criando variavel para armazenar meu arquivo txt
$arquivo = "arquivo.txt";

//verificando que se o arquivo não existir, vai tentar cria-lo, se existir, vai estar abrindo para escrita

if(!file_exists($arquivo)){
    $arquivoAberto = fopen($arquivo, "w");
} else {
    $arquivoAberto = fopen($arquivo, "a");
}

// escrevendo no arquivo
fwrite($arquivoAberto, "Nome: $nome | Sobrenome: $sobrenome | Ra: $ra\n");
// forçando escrita dos dados apontados para o arquivoAberto
fflush($arquivoAberto);
// fechando o arquivo aberto
fclose($arquivoAberto);


// mostrando os dados cadastrados
// abrindo para leitura
$arquivoAberto = fopen($arquivo, "r");
while (!feof($arquivoAberto)) { // enquanto nao for o final do arquivo
        $line = fgets($arquivoAberto); // pegando conteudo de cada linha
        echo $line ."<br>"; // exibindo linhas do conteudo escrito no arquivo txt
    }
fclose($arquivoAberto); 

?>