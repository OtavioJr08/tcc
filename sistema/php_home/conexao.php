<?php 
    
    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "brainseducation";

    //Linha para conexão ao Banco
    $conector = new mysqli($servidor,$usuario,$senha,$banco);
    
    //Verificando a conexão com o banco
    if(mysqli_connect_errno()) trigger_error(mysqli_connect_errno());

   // Alterar conjunto de caracteres para utf8
    mysqli_set_charset($conector,"utf8");



?>