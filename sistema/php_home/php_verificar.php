<?php 

    if(isset($_GET['id'])){

        include 'conexao.php';

        $id=$_GET['id'];

        $sql="UPDATE usuario SET autenticado='1' WHERE idUsuario='$id'";
        $atualiza=$conector->query($sql);

        header('Location: ../entrar.php');

    }else{
        header('../index.php');
    }

?>