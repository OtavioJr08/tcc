<!-- respostas
avaliar
denunciar -->

<?php 

    if(isset($_POST['inp_confirmar'])){

        session_start();
        include 'conexaoBD.php';
        
        $idPergunta = $_POST['tx_idPerg'];

        // VERIFICA SE HÁ RESPOSTAS
        $sqlBuscar = "SELECT resposta from comentario where resposta = '$idPergunta'";
        $consulta = $conector->query($sqlBuscar);

        if(($consulta->num_rows) > 0){ //se existe

            $sqlApagar = "DELETE from comentario where resposta = '$idPergunta'";

            if($conector->query($sqlApagar) === FALSE)
                echo "Error: " . $sqlApagar . "<br>" . $conector->error;

        }
        
        //VERIFICA SE HÁ AVALIAÇÕES
        $sqlBuscar = "SELECT fk_idComentario from avaliar where fk_idComentario = '$idPergunta'";
        $consulta = $conector->query($sqlBuscar);

        if(($consulta->num_rows)>0){
            $sqlApagar = "DELETE from avaliar where fk_idComentario = '$idPergunta'";

            if($conector->query($sqlApagar) === FALSE)
                echo "Error: " . $sqlApagar . "<br>" . $conector->error;

        }

        // VERIFICA SE HÁ DENÚNCIAR
        $sqlBuscar = "SELECT fk_idComentario from denunciar where fk_idComentario = '$idPergunta'";
        $consulta = $conector->query($sqlBuscar);

        if(($consulta->num_rows)>0){
            $sqlApagar = "DELETE from denunciar where fk_idComentario = '$idPergunta'";

            if($conector->query($sqlApagar) === FALSE)
                echo "Error: " . $sqlApagar . "<br>" . $conector->error;

        }


        // APAGA PERGUNTA
        $sqlApagar="DELETE FROM comentario WHERE idComentario = '$idPergunta'";

        if ($conector->query($sqlApagar) === TRUE) {

            header('Location: ../duvidas.php');
            
        } else {
            echo "Error: " . $sql . "<br>" . $conector->error;
        }
        

    }else{
        header('Location:../../../index.php');
    }


?>