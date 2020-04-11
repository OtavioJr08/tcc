<?php

if(isset($_POST['btn_enviar'])){
        
    include 'conexaoBD.php';
    session_start();    

    $disciplina=$_POST['opt_disc'];
    $pergunta=$_POST['tx_perg'];
    $idUsuario=$_SESSION['id'];

    echo $disciplina;
    echo "<br>";
    echo $pergunta;
    echo "<br>";
    echo $idUsuario;
    
    $sql = "INSERT INTO comentario(fk_idUsuario, data_comentario, tipo, descricao, disciplina_pergunta, resposta,visivel) VALUES ('$idUsuario', NOW(), 'p', '$pergunta','$disciplina','0','1')";

    if ($conector->query($sql) === TRUE) {

        header('Location: ../duvidas.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $conector->error;
    }

}else{
    header('Location: ../../../index.php');
}



?>