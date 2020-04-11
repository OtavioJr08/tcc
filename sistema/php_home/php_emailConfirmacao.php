<?php

    session_start();
	require '../phpmailer/PHPMailerAutoload.php';
	
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
	$Mailer->Subject = "Confirmar E-mail - Brain's Education ";
	
	//Corpo da Mensagem
    $Mailer->Body = "
    
        <h4>Último passo!</h4>
        <hr>
        <p>Clique no link abaixo e automaticamente você poderá utilizar o Brain's Education:</p>
        <br>
        <a href='localhost/newTcc/php_home/php_verificar.php?id=".$_SESSION['idUltimo']."'>VERIFICAR E-MAIL</a>
    ";
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'Conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress($_SESSION['email']);
	
	if($Mailer->Send()){
        echo "E-mail enviado com sucesso";
        unset($_SESSION['email']);
        unset($_SESSION['idUltimo']);
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
?>
