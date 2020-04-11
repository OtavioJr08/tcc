<?php 
    if(isset($_POST['votar'])){
        
        include 'conexaoBD.php';
        session_start();

        $idPergunta = $_POST['id'];
        $nota = $_POST['nota'];
        $idUsuario=$_SESSION['id'];

        //VERIFICA SE PERGUNTA JÁ FOI AVALIADA PELO USUÁRIO
        $sql = "SELECT * from avaliar where fk_idComentario = $idPergunta and fk_idUsuario = $idUsuario";
        $consulta = $conector->query($sql);

        if($consulta->num_rows>0){

            $sql = "UPDATE avaliar SET nota = '$nota' WHERE fk_idComentario=$idPergunta and fk_idUsuario = $idUsuario";

            if ($conector->query($sql) === FALSE)
                echo "Error: " . $sql . "<br>" . $conector->error;

        }else{
            $sql = "INSERT INTO avaliar (nota,data_avaliacao ,fk_idUsuario,fk_idComentario)
            VALUES ('$nota', NOW(),'$idUsuario','$idPergunta')";

            if($conector->query($sql)===FALSE)
                echo "Error: " . $sql . "<br>" . $conector->error;
        }
            
        //Retorna a média para o usuário
        $sql="SELECT avg(nota) as 'media' from avaliar where fk_idComentario = '$idPergunta'";

        $consulta=$conector->query($sql);
        
        $dados=$consulta->fetch_array();
        
        $nota = $dados['media'];

        //atualiza a coluna média da pergunta
        $sql = "UPDATE comentario SET media = '$nota' where idComentario = $idPergunta";

        if ($conector->query($sql) === FALSE)
            echo "Error: " . $sql . "<br>" . $conector->error;

        $calculo = round($nota,1);
        die(json_encode(array('average' => $calculo)));

    }
 ?>

