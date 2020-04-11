<?php 
    session_start();

    if(!isset($_SESSION['logado'])) //verifica se o usuário está logado para visitar a página
        header('Location: php_log/php_logout.php');

    include 'php_log/conexaoBD.php';


    //busco o nome da disciplina, sessão e conteúdo de acordo com o que o usuário clicou

    $idSessao = $_GET['idSessao'];

    $sql="SELECT * FROM conteudo as c INNER JOIN sessao as s on fk_idSessao = idSessao INNER JOIN disciplina as d on s.fk_idDisciplina = d.idDisciplina inner join usuario as u on c.fk_idUsuario = u.idUsuario WHERE  s.idSessao = '$idSessao'"; 

    $consulta=$conector->query($sql);

    $dados=$consulta->fetch_array();

    $idConteudo=$dados['idConteudo'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?php echo $dados['nomeSessao']; ?> - Brain's Education</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png">

    <!-- custom CSS -->
    <link href="css/exibir_conteudo.css" rel="stylesheet" media="all">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    
    <!-- CSS ÍCONES -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="images/logo.png" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="php_log/<?php echo $_SESSION['imagem_perfil'];?>" />
                    </div>
                    <h4 class="name"><?php echo $_SESSION['nome'];?></h4>
                    <a href="php_log/php_logout.php">Sair</a>
                </div>
                
                <?php 

                    if($_SESSION['tipo']==0){

                        ?>

                        <nav class="navbar-sidebar2">
                            <ul class="list-unstyled navbar__list">
                                <li class="has-sub">
                                    <a class="js-arrow" href="inicio.php">
                                        <i class="fas fas fa-home"></i>Início
                                    </a>
                                </li>

                                <li>
                                    <a href="perfil.php">
                                    <i class="fa fa-user"></i>
                                        Perfil
                                    </a>
                                        
                                    
                                </li>
                                <li class="active has-sub">
                                    <a href="lista_conteudos.php">
                                        <i class="fas fa-book"></i>Conteúdos</a>
                                </li>
                                <li >
                                    <a class="js-arrow" href="duvidas.php">
                                        <i class="fas fa-question-circle"></i>Dúvidas
                                    </a>
                                    
                                </li>
                                
                            </ul>
                        </nav>

                        <?php 



                    }else if($_SESSION['tipo']==1){

                        ?>


                        <nav class="navbar-sidebar2">
                            <ul class="list-unstyled navbar__list">
                                <li class="has-sub">
                                    <a class="js-arrow" href="inicio.php">
                                        <i class="fas fas fa-home"></i>Início
                                    </a>
                                </li>

                                <li>
                                    <a href="perfil.php">
                                    <i class="fa fa-user"></i>
                                        Perfil
                                    </a>
                                     
                                </li>

                                <li>
                                    <a href="gerenciar_administradores.php">
                                        <i class="fa fa-user-shield"></i>Administradores</a>
                                </li>

                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-book"></i>Conteúdos
                                        <span class="arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="gerenciar_conteudos.php">
                                                <i class="fas fa-cog"></i>Gerenciar Conteúdos</a>
                                        </li>
                                        <li>
                                            <a href="criar_conteudo.php">
                                                <i class="fas fa-plus-circle"></i>Criar Conteúdos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="lista_conteudos.php">
                                                <i class="fas fa-eye"></i>Visualizar Conteúdos</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="has-sub">
                                    <a class="js-arrow" href="denuncias.php">
                                        <i class="fas fa-exclamation-triangle"></i>Denúncias
                                    </a>
                                    
                                </li>

                                <li class="has-sub">
                                    <a class="js-arrow" href="duvidas.php">
                                        <i class="fas fa-question-circle"></i>Dúvidas
                                    </a>
                                    
                                </li>
                                
                            </ul>
                        </nav>


                        <?php 

                    }
                
                ?>


            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/logo-mobile.png"/>
                                </a>
                            </div>
                            <div class="header-button2">
                                
                                <!-- NOTIFICAÇÕES -->
                                    <?php 
                                    
                                    $idUsuario = $_SESSION['id'];

                                    $slqNotificacao = "SELECT * FROM comentario WHERE notificacao = '1' and fk_idUsuario = $idUsuario ORDER BY tipo";

                                    $consultaNotificacao = $conector->query($slqNotificacao);

                                    if($consultaNotificacao -> num_rows==0){

                                    ?>  
                                        <div class="header-button-item js-item-menu">
                                            <i class="zmdi zmdi-notifications"></i>
                                            <div class="notifi-dropdown js-dropdown">
                                                <div class="notifi__title">
                                                    <p>Nenhuma notificação.</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php

                                    }else{ //tem notificação

                                    ?>
                                        <div class="header-button-item has-noti js-item-menu">
                                            <i class="zmdi zmdi-notifications"></i>
                                            <div class="notifi-dropdown js-dropdown">
                                                <div class="notifi__title">
                                                    <p>Você tem <?php echo $consultaNotificacao->num_rows;?> noficações</p>
                                                </div>
                                                <?php 

                                                    while($notificacao=$consultaNotificacao->fetch_array()){

                                                        if($notificacao['tipo']=='p'){

                                                        ?>
                                                            <div class="notifi__item"  onclick=location.href='php_log/php_atualizaNotificacao.php?idComentario=<?php echo $notificacao["idComentario"];?>' >
                                                                <div class="bg-c1 img-cir img-40">
                                                                    <i class="zmdi zmdi-email-open"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p>Sua pergunta foi respondida.</p>
                                                                    <span class="date"><?php echo $notificacao['data_comentario'];?></span>
                                                                </div>
                                                            </div>

                                                        <?php


                                                        }else{

                                                        ?>
                                                            <div class="notifi__item"  onclick=location.href='php_log/php_atualizaNotificacao.php?idComentario=<?php echo $notificacao["idComentario"];?>&idConteudo=<?php echo $notificacao["fk_idConteudo"];?>' >
                                                                <div class="bg-c1 img-cir img-40">
                                                                    <i class="zmdi zmdi-email-open"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p>Alguém respondeu seu comentário.</p>
                                                                    <span class="date"><?php echo $notificacao['data_comentario'];?></span>
                                                                </div>
                                                            </div>

                                                        <?php


                                                        }

                                                        

                                                    }
                                                
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                        
                                    }
                                
                                ?>
                                <!-- END NOTIFICAÇÕES -->

                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="perfil.php">
                                                <i class="zmdi zmdi-account"></i>Perfil</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="php_log/php_logout.php">
                                                <i class="zmdi zmdi-settings"></i>Sair</a>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon-white.png"/>
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="php_log/<?php echo $_SESSION['imagem_perfil'];?>" />
                        </div>
                        <h4 class="name"><?php echo $_SESSION['nome'];?></h4>
                        <a href="php_log/php_logout.php">Sair</a>
                    </div>
                    <?php 

                    if($_SESSION['tipo']==0){

                        ?>

                        <nav class="navbar-sidebar2">
                            <ul class="list-unstyled navbar__list">
                                <li class="has-sub">
                                    <a class="js-arrow" href="inicio.php">
                                        <i class="fas fas fa-home"></i>Início
                                    </a>
                                </li>

                                <li>
                                    <a href="perfil.php">
                                    <i class="fa fa-user"></i>
                                        Perfil
                                    </a>
                                        
                                    
                                </li>
                                <li class="active has-sub">
                                    <a href="lista_conteudos.php">
                                        <i class="fas fa-book"></i>Conteúdos</a>
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="duvidas.php">
                                        <i class="fas fa-question-circle"></i>Dúvidas
                                    </a>
                                    
                                </li>
                                
                            </ul>
                        </nav>

                        <?php 



                    }else if($_SESSION['tipo']==1){

                        ?>


                        <nav class="navbar-sidebar2">
                            <ul class="list-unstyled navbar__list">
                                <li class="has-sub">
                                    <a class="js-arrow" href="inicio.php">
                                        <i class="fas fas fa-home"></i>Início
                                    </a>
                                </li>

                                <li>
                                    <a href="perfil.php">
                                    <i class="fa fa-user"></i>
                                        Perfil
                                    </a>
                                     
                                </li>

                                <li>
                                    <a href="gerenciar_administradores.php">
                                        <i class="fa fa-user-shield"></i>Administradores</a>
                                </li>

                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-book"></i>Conteúdos
                                        <span class="arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="gerenciar_conteudos.php">
                                                <i class="fas fa-cog"></i>Gerenciar Conteúdos</a>
                                        </li>
                                        <li>
                                            <a href="criar_conteudo.php">
                                                <i class="fas fa-plus-circle"></i>Criar Conteúdos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="lista_conteudos.php">
                                                <i class="fas fa-eye"></i>Visualizar Conteúdos</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="has-sub">
                                    <a class="js-arrow" href="denuncias.php">
                                        <i class="fas fa-exclamation-triangle"></i>Denúncias
                                    </a>
                                    
                                </li>

                                <li class="has-sub">
                                    <a class="js-arrow" href="duvidas.php">
                                        <i class="fas fa-question-circle"></i>Dúvidas
                                    </a>
                                    
                                </li>
                                
                            </ul>
                        </nav>


                        <?php 

                    }
                
                ?>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">Você está aqui:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="lista_conteudos.php">Conteúdos</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item"><?php echo $dados['nomeDisciplina'];?></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- PAINEL -->
            <div class="container painel">

                <div class="au-card">
                    
                
                    <!-- CONTEUDO -->
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40"><a href="lista_conteudos.php">Conteúdos</a> > <?php echo $dados['nomeDisciplina'];?></h3>

                            <!-- CONTAINER CONTEUDO -->
                            <div class="container">

                                <!-- ROW -->
                                <div class="row">
                                
                                    <div class="col-md-12 col-xs-12">

                                    
                                        <h4><?php echo $dados['nomeSessao'];?></h4>
                                        <p style="font-size:13px;"><i class="fas fa-user-edit"></i> <?php echo $dados['nome']; ?>  &nbsp  <i class="fas fa-calendar-alt"></i> <?php echo $dados['data_criacao']; ?> </p>
                                        <?php echo $dados['conteudo'];?>
                                        <br><br><br>
                                    </div>
                                            

                                </div>
                                <!-- /ROW -->

                            </div>
                            <!-- /CONTAINER CONTEUDO -->

                    </div>
                    <!-- /CONTEUDO -->
                </div>

                <!-- COMENTÁRIOS -->
                <div class="row">
                            
                    <!-- FAZER COMENTÁRIO -->
                    <div class="col-md-12 col-xs-12">
                                
                        <hr>
                                
                        <div class="md-form">
                                    
                            <form action="php_log/php_postarComentario.php?idSessao=<?php echo $idSessao?>&idConteudo=<?php echo $idConteudo?>" method="post">

                                <i class="fas fa-pencil-alt prefix"></i><label for="form10">&nbsp <b>Faça um comentário</b> </label>
                                <textarea id="form10" class="md-textarea form-control" rows="3" name="txt_comentario" required></textarea>
                                
                                <br>

                                <input class="btn btn-success" type="submit" name="inp_comentar" value="Comentar" id="">

                            </form>

                        </div>
                    </div>
                    <!-- /FAZER COMENTÁRIOS -->

                            

                    <!-- EXIBIR COMENTÁRIOS -->
                    <div class="col-md-12 col-xs-12">
                            
                        <br>
                        
                        <div class="container" style="background-color: #dee2e6;">



                            <?php 
                                $id=0;
                                $sql2="SELECT c.idComentario, c.descricao, c.data_comentario, u.nome,  u.imagemPerfil, u.idUsuario FROM comentario as c INNER JOIN usuario as u on c.fK_idUsuario = u.idUsuario WHERE c.tipo = 'c' and c.resposta = '0' and c.visivel='1' and fk_idConteudo = '".$idConteudo."' order by c.idComentario ";
                                $consulta2=$conector->query($sql2);

                                while($dados2=$consulta2->fetch_array()){
                                
                                    echo "
                                    
                                    <div class='row' style='padding-top:10px;'>

                                        <div class='col-md-1' >

                                            <img src='php_log/".$dados2['imagemPerfil']."' style='width:50px; height:50px; border-radius:25px;'>
                                        
                                        </div>

                                        <div class='col-md-11'> 
                                    
                                            <p style='font-size:14px;'><b style='font-size:18px;'>".$dados2['nome']."</b> - ".$dados2['data_comentario']." <span class='denunciarId'  data-toggle='modal' idComentario='".$dados2['idComentario']."'data-target='#modalDenuncia' style='color:#B21D1D'>Denunciar</span></p>

                                            <p>".$dados2['descricao']."</p>
                                        
                                        
                                            <p class='respostas' data-toggle='collapse' href='#respostas".$id."' role='button' aria-expanded='false' aria-controls='collapseExample'>Respostas</p>

                                            <div class='collapse' id='respostas".$id."'>

                                                <div class='card card-body'>
                                                

                                                    ";

                                                    $sqlRespostas="SELECT c.idComentario, c.descricao, c.data_comentario, u.nome, u.imagemPerfil from comentario as c 
                                                    inner join usuario as u on c.fK_idUsuario = u.idUsuario where  c.visivel='1'and resposta = '".$dados2['idComentario']."' order by c.idComentario ";
                                                
                                                    $consultaRespostas = $conector->query($sqlRespostas);
                                                    
                                                    $contar=0;
                                                    //respostas
                                                    while($dadosRespostas=$consultaRespostas->fetch_array()){

                                                        echo "

                                                            <div class='container'>
                                                            
                                                                <div class='row'>
                                                                    <div class='col-md-1 img-cir'>
                                                                    <img src='php_log/".$dadosRespostas['imagemPerfil']."' style='max-width:80px; max-height:42px; border-radius:30px;'>
                                                                    </div>

                                                                    <div col-md-11>
                                                                        <p style='font-size:14px;'><b style='font-size:18px;'>".$dadosRespostas['nome']."</b> - ".$dadosRespostas['data_comentario']." <span class='denunciarId'  data-toggle='modal' idComentario='".$dadosRespostas['idComentario']."'data-target='#modalDenuncia'>Denunciar</span></p>

                                                                        <p>".$dadosRespostas['descricao']."</p>
                                                                    
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        
                                                        ";
                                                    
                                                        echo "<hr>";
                                                        
                                                        $contar++;
                                                    }
                                                    
                                                    if($contar==0)
                                                        echo "Nenhuma resposta";

                                                    echo "<form action='php_log/php_respostaComentario.php?idSessao=".$idSessao."&idUsuarioFez=".$dados2['idUsuario']."' method='post'>
                                            
                                                        <div class='form-group'>
                                                            
                                                            <br>
                                                            <div class='input-group mb-3'>
                                                            
                                                                <input type='text' class='form-control' name='inp_resposta' placeholder='Digite aqui sua resposta' aria-describedby='button-addon2'>
                                                                
                                                                <div class='input-group-append'>
                                                                    <button name='btn_enviar' class='btn btn-secondary' type='submit' id='button-addon2'>Enviar</button>
                                                                </div>
                                                            
                                                            </div>
                                                        
                                                        </div>

                                                        <input style='display:none;' type=text' name='inp_idComentario' value='".$dados2['idComentario']."'>

                                                        <input style='display:none;' type=text' name='inp_idUsuarioRespondeu' value='".$_SESSION['id']."'>

                                                        <input style='display:none;' type=text' name='inp_idConteudo' value='".$idConteudo."'>

                                                        
                                                    </form>
                
                                        
                                                    
                                                </div>
                                            </div>
                                            
                                            

                                    </div>    

                                    </div>";

                                    
                                    echo "<hr>";
                                
                                    "<p style='padding-top:25px;'> 
                                    
                                        <img src='https://www.signalunlimited.com/product_images/icons/icon-circle-150x150-singleuser.png' style='width:50px; height:50px;'>
                                        
                                        &nbsp".$dados2['nome']."
                                        
                                    </p> ";
                                    $id++;
                                }
                            
                            ?>

                                

                        </div>
                    </div>
                    <!-- /EXIBIR COMENTÁRIOS -->
                        
                </div>
                <!-- /COMENTÁRIOS -->

            </div>
            <!-- /PAINEL -->


            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2019 <a href="#">Brain's Education</a>. Todos os direitos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- MODAL's -->
    <!-- MODAL Denúncia -->
  <div class="modal fade" id="modalDenuncia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="align=center">Denunciar Pergunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="php_log/php_fazerDenuncia.php" method="post">
                            
                        <textarea name="inp_idComentario"  style="display:none;" class="idComentarioDenunciar"id="" cols="30" rows="10"></textarea>

                        <input type="text" style="display:none;" name="inp_idSessao" value="<?php echo $idSessao;?>">

                        <div class="form-group">

                            <p>Escolha o motivo da denúncia:</p>
                            
                            <input type="radio" id="lb_ofensivo" name="inp_motivo" value="Conteúdo Ofensivo"> <label for="lb_ofensivo">Conteúdo Ofensivo</label><br>

                            <input type="radio" id="lb_inapropriada" name="inp_motivo" value="Pergunta Inapropriada"> <label for="lb_inapropriada">Comentário Inapropriado</label><br>

                            <input type="radio" id="lb_publicidade" name="inp_motivo" value="Publicidade"> <label for="lb_publicidade">Publicidade</label><br>

                            <input type="radio" id="lb_incorreta" name="inp_motivo" value="Materia Incorreta"> <label for="lb_incorreta">Matéria Incorreta</label><br>

                            <input type="radio" id="lb_outro" value="Materia Incorreta" data-toggle="collapse" href="#outroMotivo" role="button" aria-expanded="false" aria-controls="collapseExample">
                            
                            <label for="lb_outro" data-toggle="collapse" href="#outroMotivo" role="button" aria-expanded="false" aria-controls="collapseExample">Outro</label>

                            <div class="collapse" id="outroMotivo">
                            
                                <div class="card card-body">
                                    <textarea id="" class="md-textarea form-control" rows="3" name="inp_outroMotivo" placeholder="Escreva aqui o motivo de sua denúncia."></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="btn_enviar" class="btn btn-primary" >Enviar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right;">Fechar</button>

                        <?php 
                            $_SESSION['caminhoDenuncia']='comentario';
                        ?>

                    </form>

                </div>
                
            
            </div>
        </div>
    </div>
    <!-- MODAL Denúncia -->
    

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <!-- Custom JS-->
    <script src="js/exibir_conteudo.js"></script>

</body>

</html>
<!-- end document-->
