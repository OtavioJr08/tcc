<?php

    if(isset($_POST["btn_enviar"])){

        session_start();

        include 'conexao.php';
        require '../phpmailer/PHPMailerAutoload.php';
       
        $nome = $_POST['inp_nome'];
        $sobrenome = $_POST['inp_sobrenome'];
        $email = $_POST['inp_email'];
        $mensagem = $_POST['txt_mensagem'];

       
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
        $Mailer->Subject = "Brain's Education - Mensagem de Contato";
        
        //Corpo da Mensagem
        $Mailer->Body = "
        
            <p>Nome: ".$nome." ".$sobrenome."</p>
            <p>Mensagem: ".$mensagem."</p>
        ";
        
        //Corpo da mensagem em texto
        $Mailer->AltBody = "";
        
        //Destinatario 
        $Mailer->AddAddress($email);
        
        if($Mailer->Send()){
            // $_SESSION['msgEmailSenha']="<p style='color:green';>Enviado com sucesso!</p>";
            header('Location:../index.php');
        }else{
            // $_SESSION['msgEmailSenha']="<p style='color:red';>Falha ao enviar</p>";
            echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
            header('Location:../index.php');
        }

    }else{
        header('Location: ../index.php');
    }
	
?>
