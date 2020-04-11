<?php 

    if(isset($_POST['btn_enviar'])){

        include 'conexaoBD.php';
        session_start();

        $idComentario=$_POST['inp_idComentario'];
        $idUsuario=$_SESSION['id'];     
        $idSessao=$_POST['inp_idSessao'];

        if($_POST['inp_outroMotivo']=='')
            $motivo=$_POST['inp_motivo'];
        else
            $motivo=$_POST['inp_outroMotivo'];

        $sql = "INSERT INTO denunciar (fk_idUsuario, fk_idComentario, data_denuncia,motivo)
        VALUES ('$idUsuario','$idComentario',NOW(),'$motivo')";

        if ($conector->query($sql) === TRUE) {

            

            if($_SESSION['tipo']==0){

                if($_SESSION['caminhoDenuncia']=='comentario'){
                
                    if(isset($_SESSION['caminhoDenuncia']))
                        unset($_SESSION['caminhoDenuncia']);

                    
                    
                    header("Location: ../exibir_conteudo.php?idSessao=".$idSessao."");
                
                }else if($_SESSION['caminhoDenuncia']=='pergunta'){
                
                    
                    if(isset($_SESSION['caminhoDenuncia']))
                        unset($_SESSION['caminhoDenuncia']);


                    header("Location:../responder_pergunta.php?idPergunta=$idComentario");
                
                }
                
                    
            }else if($_SESSION['tipo']==1){
                
                if($_SESSION['caminhoDenuncia']=='comentario'){
                
                    if(isset($_SESSION['caminhoDenuncia']))
                        unset($_SESSION['caminhoDenuncia']);

                    $idConteudo=$_POST['inp_idConteudo'];
                    
                    header("Location: ../exibir_conteudo.php?idSessao=".$idSessao."");
                
                }else if($_SESSION['caminhoDenuncia']=='pergunta'){
                
                    
                    if(isset($_SESSION['caminhoDenuncia']))
                        unset($_SESSION['caminhoDenuncia']);


                    header("Location:../responder_pergunta.php?idPergunta=$idComentario");
                
                }
                
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conector->error;
        }

    }else{
        header('Location:../../../index.php');
    }


?>