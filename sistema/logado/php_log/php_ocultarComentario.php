<?php 

    if(isset($_POST['inp_confirmar'])){

        include 'conexaoBD.php';
        session_start();

        $idComentario = $_POST['txt_idOcultar'];
        $resposta = $_POST['txt_resposta'];
        $idDenuncia = $_POST['txt_idDenuncia'];
        $escolha=$_POST['inp_escolha'];

        if($escolha=='ocultar'){

            // atualiza o comentário/pergunta, alterando o campo visível para 0
            $sql = "UPDATE comentario SET visivel='0' WHERE idComentario=$idComentario";

            if($conector->query($sql)===TRUE){

                //atualiza a denuncia
                $sql = "UPDATE denunciar SET resposta='$resposta', data_julgado=NOW() WHERE idDenuncia=$idDenuncia";

                if($conector->query($sql)===TRUE){

                    header('Location:../denuncias.php');
                }else{
                    echo "Error updating record: " . $conector->error;    
                }


            }else{
                echo "Error updating record: " . $conector->error;
            }

        }else{  //SE A ESCOLHA FOR ABSOLVER

            //atualiza a denuncia
            $sql = "UPDATE denunciar SET resposta='$resposta', data_julgado=NOW() WHERE idDenuncia=$idDenuncia";

            if($conector->query($sql)===TRUE){
                header('Location:../denuncias.php');
            }else{
                echo "Error updating record: " . $conector->error;    
            }
        }
        
        
    }else{
        header('Location:../../../index.php');
    }


?>