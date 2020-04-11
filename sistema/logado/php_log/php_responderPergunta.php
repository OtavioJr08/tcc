<?php 

    if(isset($_POST['btn_enviarResposta'])){

        session_start();
        include 'conexaoBD.php';

        $resposta=$_POST['tx_resp'];
        $idUsuarioRespondeu = $_SESSION['id'];
        $idPergunta = $_POST['inp_idPergunta'];
        $disciplina= $_POST['inp_disciplina'];

        $sql = "INSERT INTO comentario (fk_idUsuario, descricao, tipo, resposta, disciplina_pergunta,data_comentario)
        VALUES ('$idUsuarioRespondeu', '$resposta', 'p', '$idPergunta', '$disciplina',NOW())";

        if ($conector->query($sql) === TRUE) {

            //altero notificação
            /*
                Se o próprio usuário que fez a pergunta respondê-la, não envia notificação.
            */ 
            if($_GET['idUsuarioFez']!=$_SESSION['id']){
                $sql="UPDATE comentario SET notificacao = 1 WHERE idComentario = $idPergunta";

                if ($conector->query($sql) === TRUE) 
                    header('Location: ../responder_pergunta.php?idPergunta='.$idPergunta);
                else 
                    echo "Error updating record: " . $conector->error;
            }else{
                header('Location: ../responder_pergunta.php?idPergunta='.$idPergunta);
            }
            
        } else {
            echo "Error: " . $sql . "<br>" . $conector->error;
        }

        $conector->close();

    }else{
        header('Location: ../../../index.php');
    }


?>