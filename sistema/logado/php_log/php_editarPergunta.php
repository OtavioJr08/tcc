<?php 

    if(isset($_POST['btn_editar'])){

        include 'conexaoBD.php';
        session_start();

        $disciplina = $_POST['opt_disc'];
        $descricao = $_POST['tx_editar'];
        $idPergunta = $_POST['idPerguntaEditar'];

        $sql="UPDATE comentario SET descricao = '$descricao', disciplina_pergunta = '$disciplina', data_atualizacao = NOW() WHERE idComentario='$idPergunta'";

        if($conector->query($sql) === TRUE){

            header('Location: ../duvidas.php');

        }else{
            echo "Error: " . $sql . "<br>" . $conector->error;
        }

    }else{
        header('Location:../../../index.php');
    }




?>