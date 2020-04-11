<?php 

    if(isset($_POST['btn_disciplina'])){

        session_start();

        include 'conexaoBD.php';

        $nome=$_POST['inp_disciplina'];

        //Verifico se já existe a disciplina
        $sql="SELECT * FROM disciplina WHERE nomeDisciplina = '$nome'";
        $consulta = $conector->query($sql);

        //Caso não encontre nada (retornou nenhuma linha), faz a inserção da nova disciplina
        if(mysqli_num_rows($consulta)==0){
            
            $sql = "INSERT INTO disciplina(nomeDisciplina) VALUES (?)"; 
            $consulta = $conector->prepare($sql); 
            $consulta->bind_param("s",$nome); 
            $consulta->execute();

            if($consulta->affected_rows > 0){
                $_SESSION['msgConteudo']="<p style='color:green; text-align:center;'>Disciplina Cadastrada com sucesso!</p>";
                header('Location: ../criar_conteudo.php');
            }else{
                $_SESSION['msgConteudo']="<p style='color: red; text-align:center;'>Disciplina não cadastrada!</p>";
                header('Location: ../criar_conteudo.php');
            }
        }else{
            $_SESSION['msgConteudo']="<p style='color: red; text-align:center;'>Disciplina já existe!</p>";
            header('Location: ../criar_conteudo.php');
        }

    }else{
        header();
    }

?>