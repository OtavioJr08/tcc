<?php

//Verifica se entrou via formulário
if(isset($_POST["btn_enviar"])){

    session_start();

    include "conexao.php";

    // Recebe valores digitado nos campos do formulario
    $email=$_POST["inp_email"];
    $senha=$_POST["inp_senha"];

        $sql="SELECT * FROM usuario";
        $consulta=$conector->query($sql);

        $achou=0;

        while($dados = $consulta->fetch_array()){
            
            if($email==$dados['email']){

                if($senha==$dados['senha']){
                    $achou++;
                    $nomeCompleto=$dados['nome'];
                    $palavras=explode(' ', $nomeCompleto);
                    $_SESSION['nome']=$palavras[0];
                    $_SESSION['id']=$dados['idUsuario'];
                    $autenticado=$dados['autenticado'];
                    $_SESSION['imagem_perfil']=$dados['imagemPerfil'];
                    $tipo=$dados['tipo'];
                    $autenticado=$dados['autenticado'];
                }
            }
        }

        if($achou>0){

            //verifica se o usuário validou seu e-mail
            if($autenticado==1){

                //Sessão de controle para verificar se o usuário está logado
                $_SESSION['logado']=1;

                //Sessão para verificar o tipo de usuário e garantir que o administrador não acesse páginas do usuário comum e vice versa
                $_SESSION['tipo']=$tipo;
               
                header("Location: ../logado/inicio.php");

            }else{
                $_SESSION['msg']="<p style='color:red;'>Você não confirmou seu e-mail! Verifique sua caixa de entrada.</p>";
                header("Location:../entrar.php");
            }
        }else if($achou == 0){
            $_SESSION['msg']="<p style='color:red;'>Dados inválidos</p>";
            header("Location:../entrar.php");
        }
    
    }else{
        header("Location:../entrar.php");
}


?>