<?php 

    if(isset($_POST['btn_enviar'])){

        echo $_GET['idUsuarioFez'];

        session_start();

        include 'conexaoBD.php';

        $resposta = $_POST['inp_resposta'];
        $idConteudo = $_POST['inp_idConteudo'];
        $idComentario = $_POST['inp_idComentario']; //que será o valor do campo 'resposta'
        $idUsuarioRespondeu = $_POST['inp_idUsuarioRespondeu']; //id do usuário que respondeu
        $idSessao=$_GET['idSessao'];


        $sql = "INSERT INTO comentario(fk_idUsuario,fk_idConteudo, data_comentario, tipo, descricao, resposta) VALUES ('$idUsuarioRespondeu', '$idConteudo', NOW(), 'c', '$resposta', $idComentario)";

        if ($conector->query($sql)==true){

             //altero notificação
            // Se o próprio usuário que fez a pergunta respondê-la, não envia notificação. 

            if($_GET['idUsuarioFez']!=$_SESSION['id']){
                
                $sql="UPDATE comentario SET notificacao = 1 WHERE idComentario = $idComentario";

                if ($conector->query($sql) === TRUE) 
                    header('Location: ../exibir_conteudo.php?idSessao='.$idSessao.'');
                else 
                    echo "Error updating record: " . $conector->error;

            }else{
                header('Location: ../exibir_conteudo.php?idSessao='.$idSessao.'');
            }
        
        }else{
            echo "Error: " . $sqlInsereResposta . "<br>" . $conector->error; 
        }

    }
?>