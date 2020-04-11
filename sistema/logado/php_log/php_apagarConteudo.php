<?php 

    if(isset($_POST['inp_confirmar'])){

        $idConteudo=$_POST['tx_idCont'];
        $idSessao=$_POST['tx_idSessao'];

        session_start();
        include 'conexaoBD.php';

        //VERIFICA SE HÁ COMENTÁRIOS
        $sqlBuscar = "SELECT idComentario from comentario where fk_idConteudo = '$idConteudo'";
        $consulta = $conector->query($sqlBuscar);

        if($consulta->num_rows>0){//se tem chave estrangeira, apaga

            while($dados=$consulta->fetch_array()){
                $idComentario= $dados['idComentario'];
                $sqlApagarDenuncia = "DELETE from denunciar where fk_idComentario = '$idComentario'";
                $conector->query($sqlApagarDenuncia);
            }
            
            $sqlApagar = "DELETE from comentario where fk_idConteudo = '$idConteudo'";

            if($conector->query($sqlApagar)===FALSE)
                echo "Error: " . $sqlApagar . "<br>" . $conector->error;
        }

        // APAGA CONTEÚDO
        $sql="DELETE FROM conteudo WHERE idConteudo = '$idConteudo'";
        $delete=$conector->query($sql);

        if($delete == true){

            $sql = "UPDATE sessao SET uso = 0 WHERE idSessao = $idSessao";
            $conector->query($sql);

            header('Location: ../gerenciar_conteudos.php');
        }else{
            header('Location: ../gerenciar_conteudos.php');
        }    

    }else{
        header('Location: ../../../index.php');
    }

?>