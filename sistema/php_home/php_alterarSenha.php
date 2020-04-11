<?php 

    if(isset($_POST['btn_enviar'])){

        session_start();

        include 'conexao.php';

        $email=$_POST['inp_email'];
        $senha=$_POST['inp_senha'];
        $senhaConfirma=$_POST['inp_senhaConfirma'];

        if($senha == $senhaConfirma){
            
            //Altero a senha    
            $sql="UPDATE usuario SET senha = '$senha' WHERE email = '$email'";
            $atualiza=$conector->query($sql);

            header('Location: ../entrar.php');
        }else{
            $_SESSION['msgEmailSenha']="<p style='color:red';>Senhas diferentes</p>";
            header("Location: ../alterar_senha.php?email=".$email);
        }
    }else{
        header('Location: ../index.php');
    }

?>