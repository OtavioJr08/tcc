<?php 

    if(isset($_POST['btn_conteudo']) && isset($_GET['idConteudo'])){

        include 'conexaoBD.php';
        session_start();

        $idConteudo=$_GET['idConteudo'];
        $conteudo=$_POST['editor'];

        $sql="UPDATE conteudo SET conteudo='$conteudo' WHERE idConteudo='$idConteudo'";
        $update = mysqli_query($conector, $sql);

        $_SESSION['msgEditarConteudo']="<p style='color:green; text-align:center;'>Atualizado com sucesso!</p>";  
        header('Location:../editar_conteudo.php?idConteudo='.$idConteudo.'');

    }else{
        header('Location:../../../index.php');
    }


?>