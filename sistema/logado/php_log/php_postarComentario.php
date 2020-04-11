<?php 

    if(isset($_POST['inp_comentar'])){
        
        include 'conexaoBD.php';
        session_start();    

        $comentario=$_POST['txt_comentario'];
        $idUsuario=$_SESSION['id'];
        $idSessao=$_GET['idSessao'];
        $idConteudo=$_GET['idConteudo'];
        
        $sql = "INSERT INTO comentario(fk_idUsuario,fk_idConteudo, data_comentario, tipo, descricao, resposta,visivel) VALUES ('$idUsuario', '$idConteudo', NOW(), 'c', '$comentario','0','1')";
            
        $resultado = mysqli_query($conector, $sql);

        header('Location: ../exibir_conteudo.php?idSessao='.$idSessao.'');

    }else{
        header('Location: ../../../index.php');
    }


?>