<?php 

    session_start();

    //Verifica se chegou via formulario
    if(isset($_POST['btn_cadastrar'])){
    
        // Recebe valores digitado nos campos do formulario
        $nome=$_POST['inp_nome'];
        // $sobrenome=$_POST['inp_sobrenome'];
        $email=$_POST['inp_email'];
        $senha=$_POST['inp_senha'];
        $conf_senha=$_POST['inp_confSenha'];

        //verifica se as senhas são iguais
        if($senha==$conf_senha){

            //Verifica se já tem e-mail e nome de usuario cadastrado
            
            //incui conexao com o banco de dados
            include "conexao.php";

            $sql = "SELECT * FROM usuario";
            $consulta = $conector->query($sql);

            $achou_email=0;
            
            while($dados=$consulta->fetch_array()){
                
                if($email==$dados['email']){
                    $achou_email++;
                    break;
                }
            }

            if($achou_email==0){ //Faz cadastro
                
                // $data = date("Y-m-d");

                $sql = "INSERT INTO usuario(nome,email,senha,data_cadastro) 
                VALUES ('$nome','$email','$conf_senha', NOW())";
                $resultado = mysqli_query($conector, $sql);

                //sessão para enviar o e-mail
                $_SESSION['email']=$email;

                //consulta para pegar o ID do usuário que acaba de ser cadastrado (utilizado para Verificar o e-mail)
                $sql2="SELECT * from usuario WHERE email='$email'";
                $resposta=$conector->query($sql2);

                while($idUltimo=$resposta->fetch_array()){
                    $_SESSION['idUltimo']=$idUltimo['idUsuario'];
                }
                
                include 'php_emailConfirmacao.php';

                header("location:../envio_verificacao.php?email=$email");
            
            }else if($achou_email>0){

                $_SESSION['msg']="<p style='color:red;'>E-mail já cadastrado</p>";
                
                header("location:../cadastrar.php");
                
            }

        }else{
            $_SESSION['msg']="<p style='color:red;'>Senhas Diferentes</p>";
            header("Location:../cadastrar.php");
        }
    
    }else{
        header("location:../index.php");
    }


?>