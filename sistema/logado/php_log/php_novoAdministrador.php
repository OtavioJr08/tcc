<?php 

    if(isset($_POST['btn_cadastrar'])){

        include 'conexaoBD.php';
        session_start();

        $email=$_POST['inp_email'];
        $senha=$_POST['inp_senha'];
        $nome=$_POST['inp_nome'];

        $sql="SELECT email from usuario where email='$email'";
        $consulta=$conector->query($sql);

        if($consulta->num_rows>0){
            $_SESSION['msgCadastroAdm']="<p style='color:red;'>Já existe um usuário com esse e-mail.</p>";
            header('Location:../gerenciar_administradores.php');
        }else{


            $sql="INSERT INTO usuario (nome,email,senha,data_cadastro,tipo,autenticado) values ('$nome','$email','$senha',NOW(), '1','1')"; 

            if($conector->query($sql)===TRUE){

                //ENVIA UM E-MAIL PARA A PESSOA QUE ACABOU DE SER CADASTRADA COMO ADMINISTRADOR
                require '../../phpmailer/PHPMailerAutoload.php';
        
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
                $Mailer->Username = 'otaviojr08@gmail.com';
                $Mailer->Password = '$$$Liverpool';
                
                //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
                $Mailer->From = 'otaviojr08@gmail.com';
                
                //Nome do Remetente
                $Mailer->FromName = "Brain's Education";
                
                //Assunto da mensagem
                $Mailer->Subject = "Cadastro - Brain's Education";
                
                //Corpo da Mensagem
                $Mailer->Body = "
                
                    <h4>Você agora é administrador do Brain's Education</h4>
                    
                    <p>Segue abaixo as informações para acessar o sistema:</p>
            
                    <p>E-mail: ".$email."</p>
                    <p>Senha: ".$senha."</p>                
                
                ";
                
                //Corpo da mensagem em texto
                $Mailer->AltBody = '';
                
                //Destinatario 
                $Mailer->AddAddress($email);
                
                if($Mailer->Send()){
                    header('Location:../gerenciar_administradores.php');
                    echo "E-mail enviado com sucesso";
                }else{
                    echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
                }

            }else{
                echo "Error: " . $sql . "<br>" . $conector->error;
            }


        }      

    }else{
        header('Location:../../../index.php');
    }

?>