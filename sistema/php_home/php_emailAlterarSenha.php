<?php

    if(isset($_POST["btn_enviar"])){

        session_start();

        include 'conexao.php';
        require '../phpmailer/PHPMailerAutoload.php';
       
        $email=$_POST['inp_email'];
       
        $Mailer = new PHPMailer();
        
        //Define que será usado SMTP
        $Mailer->IsSMTP();
        
        //Enviar e-mail em HTML
        $Mailer->isHTML(true);
        
        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';
        
        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'ssl';
        
        //nome do servidor
        $Mailer->Host = 'smtp.gmail.com';
        //Porta de saida de e-mail 
        $Mailer->Port = 465;
        
        //Dados do e-mail de saida - autenticação
        $Mailer->Username = '';
        $Mailer->Password = '';
        
        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = '';
        
        //Nome do Remetente
        $Mailer->FromName = "Brain's Education";
        
        //Assunto da mensagem
        $Mailer->Subject = "Alterar senha - Brain's Education ";
        
        //Corpo da Mensagem
        $Mailer->Body = "
        
            <p>Clique no link abaixo para escolher sua nova senha:</p>
            <br>
            <a href='localhost/newTcc/php_home/../alterar_senha.php?email=".$email."'>Alterar senha</a>
        ";
        
        //Corpo da mensagem em texto
        $Mailer->AltBody = 'Conteudo do E-mail em texto';
        
        //Destinatario 
        $Mailer->AddAddress($email);
        
        if($Mailer->Send()){
            $_SESSION['msgEmailSenha']="<p style='color:green';>Enviado com sucesso!</p>";
            header('Location:../esqueci_senha.php');
        }else{
            $_SESSION['msgEmailSenha']="<p style='color:red';>Falha ao enviar</p>";
            header('Location:../esqueci_senha.php');
        }

    }else{
        header('Location: ../index.php');
    }
	
?>
