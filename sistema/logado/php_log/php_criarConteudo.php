<?php 

    if(isset($_POST['btn_conteudo'])){


        if(!empty($_POST['editor'])){
            
            include 'conexaoBD.php';

            session_start();

            $idDisciplina=$_POST['opt_disc'];
            $idSessao=$_POST['opt_sessao'];
            $conteudo=$_POST['editor'];

            $sql="SELECT * from disciplina as d inner join sessao as s on idDisciplina = fk_idDisciplina inner join conteudo as c on s.idSessao = c.fk_idSessao where d.idDisciplina = '$idDisciplina' and s.idSessao = '$idSessao'";

            if(($conector->query($sql)->num_rows)>0){
                $_SESSION['msgConteudo']= "<p style='color:red; text-align:center;'>Esse conteúdo já foi criado. Você pode editá-lo em <a style='color:blue' href=gerenciar_conteudos.php>Gerenciar Conteúdos</a></p><br>";
                header('Location: ../criar_conteudo.php');
            }else{
                $idUsuario=$_SESSION['id'];

                //busca id da sessão escolhida
                // $sqlId="SELECT idSessao FROM sessao WHERE nomeSessao = '$sessao'";
                // $consulta=$conector->query($sqlId);

                // while($dados=$consulta->fetch_array()){
                    // $idSessao=$dados['idSessao'];
                // }

                $sql = "INSERT INTO conteudo(conteudo,fk_idUsuario,fk_idSessao, data_criacao) 
                VALUES ('$conteudo', '$idUsuario', '$idSessao', NOW())";
                $resultado = mysqli_query($conector, $sql);

                $sql = "UPDATE sessao SET uso=1 WHERE idSessao = $idSessao";

                if ($conector->query($sql) === TRUE) {

                    $_SESSION['msgConteudo']= "<p style='color:green; text-align:center;'>Conteúdo publicado com sucesso!</p>";

                    header('Location: ../criar_conteudo.php');
                    
                } else {
                    echo "Error updating record: " . $conector->error;
                }
                
            }
            
            
        }else{
            $_SESSION['msgConteudo']= "<p style='color:red; text-align:center;'>Preencha todos os campos</p>";
            header('Location: ../criar_conteudo.php');
        }

        

    }else{
        header('Location: ../../../index.php');
    }


?>