<?php 

    if(isset($_POST['btn_sessao'])){

        session_start();

        include 'conexaoBD.php';

        $nome=$_POST['inp_sessao'];
        $disciplina=$_POST['opt_disc'];

        //busco o id da disciplina escolhida
        $query="SELECT * from disciplina";
        $consulta2 = $conector->query($query);
        $cont=0;
        while($dados=$consulta2->fetch_array()){
            if($dados['nomeDisciplina']==$disciplina){
                $idDisciplina=$dados['idDisciplina'];        
            }
        }
        // $dados=$consulta2->fetch_array();
        // $idDisciplina=$dados['idDisciplina'];

        //Verifico se já existe a sessão
        $sql2="SELECT * FROM sessao WHERE nomeSessao = '$nome'";
        $consulta3 =$conector->query($sql2);

        //Caso não encontre nada (retornou nenhuma linha), faz a inserção da nova sessão
        if(mysqli_num_rows($consulta3)==0){
            
            $sql = "INSERT INTO sessao(nomeSessao,fk_idDisciplina) VALUES (?,?)"; 
            $consulta = $conector->prepare($sql); 
            $consulta->bind_param("ss",$nome, $idDisciplina); 
            $consulta->execute();

            if( $consulta->affected_rows){
                $_SESSION['msgConteudo']="<p style='color:green; text-align:center;'>Sessão Cadastrada com sucesso!</p>";
                header('Location: ../criar_conteudo.php');
            }else{
                $_SESSION['msgConteudo']="<p style='color: red; text-align:center;'>Sessão não cadastrada!</p>";
                header('Location: ../criar_conteudo.php');
            }
        }else{
            $_SESSION['msgConteudo']="<p style='color: red; text-align:center;'>Sessão já existe!</p>";
            header('Location: ../criar_conteudo.php');
        }

    }else{
        header();
    }

?>