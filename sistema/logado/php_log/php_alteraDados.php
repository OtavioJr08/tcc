<?php

    // Verifica se veio através de formulário
    if(isset($_POST['btn_enviar'])){

        session_start();
        include "conexaoBD.php";
     
        if(isset($_SESSION['id']) || isset($_SESSION['nome'])){
            unset($_SESSION['id']);
            unset($_SESSION['nome']);
        }
        
        $nome=$_POST['inp_nome'];
        $email=$_POST['inp_email'];
        $senha=$_POST['inp_senha'];
        $id=$_POST['inp_id'];
        $foto = $_FILES["inp_foto"];

        if(empty($foto["type"])){
    
            $result_usuario = "UPDATE usuario SET nome='$nome', email='$email',senha='$senha' WHERE idUsuario='$id'";
            $resultado_usuario = mysqli_query($conector, $result_usuario);

            $sql="SELECT * FROM usuario where idUsuario = '$id'";
            $consulta=$conector->query($sql);
            $dados=$consulta->fetch_array();  

            $nomeCompleto=$dados['nome'];
            $palavras=explode(' ', $nomeCompleto);
            $_SESSION['nome']=$palavras[0];  

            $_SESSION['id']=$dados['idUsuario'];
           

            if(mysqli_affected_rows($conector)){

                $_SESSION['msg'] = "<p style='color:green;'>Dados alterados com sucesso</p>";
                header("Location: ../perfil.php");
                
            }else{
                $_SESSION['msg'] = "<p style='color:red;'>Erro na alteração</p>";
                header("Location: ../perfil.php");
            
            }
        }else{
            
            //Verificamos se o arquivo se trata de imagem 
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $_SESSION['msg'] = "<p style='color:red;'>Isso não é uma imagem</p>";
                
                $sql="SELECT * FROM usuario where idUsuario = '$id'";
                $consulta=$conector->query($sql);
                $dados=$consulta->fetch_array();   

                $nomeCompleto=$dados['nome'];
                $palavras=explode(' ', $nomeCompleto);
                $_SESSION['nome']=$palavras[0]; 

                $_SESSION['id']=$dados['idUsuario'];
                // $_SESSION['nome']=$dados['nome'];

                header("Location:../perfil.php");

            }else{

                //Definindo as dimensões da imagem
                $largura=150; //150px
                $altura=150; //150px

                //criando um vetor com as dimensões da imagem
                $dimensoes=getimagesize($foto["tmp_name"]);

                if($dimensoes[0]< $largura || $dimensoes[1] < $altura){
                    $_SESSION['msg']="<p style='color:red;'>A imagem deve ter no mínimo 150x150 pixels</p>";
                        
                    $sql="SELECT * FROM usuario where idUsuario = '$id'";
                    $consulta=$conector->query($sql);
                    $dados=$consulta->fetch_array();    

                    $nomeCompleto=$dados['nome'];
                    $palavras=explode(' ', $nomeCompleto);
                    $_SESSION['nome']=$palavras[0];

                    $_SESSION['id']=$dados['idUsuario'];
                    // $_SESSION['nome']=$dados['nome'];

                    header("Location:../perfil.php");

                    
                }else{

                    //Recuperamos a extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

                    //buscamos a próxima id e criamos um nome amigável e único para a imagem
                    // $sql = "show table status like 'usuario'";
                    // $consulta = $conector->query($sql);
                    // $linha = $consulta->fetch_array();
                    $nome_imagem = $id . "." . $ext[1] ;

                    //Criamos o caminho completo para a imagem
                    $caminho_imagem = "imagensPerfil/" . $nome_imagem;

                    //Move a imagem da pasta temporária para a nossa pasta
                    move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                    $result_usuario = "UPDATE usuario SET nome='$nome', email='$email',senha='$senha', imagemPerfil='$caminho_imagem' WHERE idUsuario='$id'";
                    $resultado_usuario = mysqli_query($conector, $result_usuario);

                    $sql="SELECT * FROM usuario where idUsuario = '$id'";
                    $consulta=$conector->query($sql);
                    $dados=$consulta->fetch_array();    

                    $nomeCompleto=$dados['nome'];
                    $palavras=explode(' ', $nomeCompleto);
                    $_SESSION['nome']=$palavras[0];

                    $_SESSION['id']=$dados['idUsuario'];
                    // $_SESSION['nome']=$dados['nome'];
                   
                    // unset($_SESSION['imagem_perfil']);

                    $_SESSION['imagem_perfil']=$dados['imagemPerfil'];

                    if(mysqli_affected_rows($conector)){

                        $_SESSION['msg'] = "<p style='color:green;'>Dados alterados com sucesso</p>";
                        header("Location: ../perfil.php");
                        
                    }else{
                        $_SESSION['msg'] = "<p style='color:red;'>Erro na alteração</p>";
                        header("Location: perfil.php");
                    }
                }
            }
        }
    }else{
        header("Location:../../../index.php");
    }
    
?>