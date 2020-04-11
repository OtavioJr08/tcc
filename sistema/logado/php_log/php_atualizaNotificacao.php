<?php 

    if(isset($_GET['idComentario']) || isset($_GET['idConteudo'])){

        include 'conexaoBD.php';

        $idComentario = $_GET['idComentario']; //pergunta ou comentario do conteudo

        if(isset($_GET['idConteudo'])){

            $idConteudo = $_GET['idConteudo'];

            $busca="SELECT fk_idSessao from conteudo where idConteudo = $idConteudo";
            $consulta = $conector->query($busca);

            $dado = $consulta->fetch_array();

            $idSessao = $dado['fk_idSessao'];

            $sql="UPDATE comentario SET notificacao = 0 WHERE idComentario = $idComentario";

            if ($conector->query($sql) === TRUE) 
                header('Location: ../exibir_conteudo.php?idSessao='.$idSessao);
            else 
                echo "Error updating record: " . $conector->error;



        }else{ //se a notificação for uma pergunta

            $sql="UPDATE comentario SET notificacao = 0 WHERE idComentario = $idComentario";

            if ($conector->query($sql) === TRUE) 
                header('Location: ../responder_pergunta.php?idPergunta='.$idComentario);
            else 
                echo "Error updating record: " . $conector->error;
        }
        
    }

?>