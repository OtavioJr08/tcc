<?php 

    session_start();

    if(!isset($_SESSION['logado'])) //verifica se o usuário está logado para visitar a página
        header('Location: php_log/php_logout.php');

    include 'php_log/conexaoBD.php';

    $idPergunta=$_GET['idPergunta'];
    $sql="SELECT * FROM `comentario`as c inner join usuario as u on c.fk_idUsuario = u.idUsuario and c.idComentario = '$idPergunta'";
    // $sql="SELECT * from comentario where idComentario = '$idPergunta'";
    $consulta=$conector->query($sql);
    $dados=$consulta->fetch_array();

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
    <title>Responder - Brain's Education</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png">

    <!-- custom CSS -->
    <link href="css/responder_pergunta.css" rel="stylesheet" media="all">

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
                    <img src="images/logo.png"/>
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
                                <li>
                                    <a href="lista_conteudos.php">
                                        <i class="fas fa-book"></i>Conteúdos</a>
                                </li>
                                <li class="active has-sub">
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
                                    <a href="gerenciar_administradores">
                                        <i class="fa fa-user-shield"></i>Administradores</a>
                                </li>

                                <li class="has-sub">
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

                                <li class="active has-sub">
                                    <a class="js-arrow" href="duvias.php">
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
                                    <img src="images/logo-mobile.png" />
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
                        <img src="images/icon-white.png" />
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
                                <li>
                                    <a href="lista_conteudos.php">
                                        <i class="fas fa-book"></i>Conteúdos</a>
                                </li>
                                <li class="active has-sub">
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

                                <li class="has-sub">
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

                                <li class="active has-sub">
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
                                                <a href="duvidas.php">Dúvidas</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Responder</li>
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
                        <h3 class="title-2 m-b-40">Responder Pergunta</h3>

                        
                        <!-- ROW1 -->
                        <div class="row" >
                                    
                            <!-- COL1 -->
                            <div class="col-md-12">

                                <div class="responderPergunta">
                                
                                <a href="duvidas.php"><i class="fas fa-arrow-circle-left" style="margin-bottom:8px;"> Voltar</i></a>

                                
                                <?php 

                                    if($dados['visivel']==0){
                                        $sql="SELECT d.motivo, d.resposta from denunciar as d inner join comentario as c on c.idComentario = d.fk_idComentario and c.idComentario = $idPergunta";

                                        $consulta=$conector->query($sql);
                                        $dadosDenuncia=$consulta->fetch_array();
                                        ?>
                                        <br><br>

                                        

                                        <div class="card">
                                            <div class="card-header">
                                                PERGUNTA OCULTADA
                                            </div>
                                            <div class="card-body">
                                                <!-- <h5 class="card-title">Special title treatment</h5> -->
                                                <p class="card-text">
                                                    <p style='color:red;font-weight:bold;'>Sua pergunta foi denunciada por algum usuário. Após julgamento, algum administrador resolveu ocultá-la.</p>

                                                    <p><b>Denúncia:</b> <?php echo $dadosDenuncia['motivo']; ?></p>
                                                    
                                                    <p><b>Resposta do administrador: </b> <?php echo $dadosDenuncia['resposta'];?></p>
                                                </p>
                                                
                                            </div>
                                        </div>

                                        <br><br>
                                        <?php
                                    }
                                                    
                                ?>

                                <div class="row">
                                    
                                    <div class="col-md-1">
                                        <img src="<?php echo 'php_log/'.$dados['imagemPerfil'].''?>" style='max-width:58px;; max-height:60px; border-radius:30px;'>
                                    </div>
                                    
                                    <div class="col-md-11" style="padding-top:15px;">
                                        <p><?php echo "".$dados['nome']."  -  ".$dados['disciplina_pergunta']."  -  ".$dados['data_comentario']."";?></p>
                                        

                                    </div>

                                </div>

                                <br>

                                <p><?php echo $dados['descricao']?></p>
                
                                    <br>
                                <form action="php_log/php_responderPergunta.php?idUsuarioFez=<?php echo $dados['fk_idUsuario'];?>" method="post">

                                    <input type="hidden" name="inp_disciplina" value="<?php echo $dados['disciplina_pergunta'];?>">

                                    <input type="hidden" name="inp_idPergunta" value="<?php echo $dados['idComentario'];?>">


                                    <div class="row">

                                        <div class="col-md-2 col-xs-12">

                                            <?php

                                                $sql="SELECT avg(nota) as 'media' from avaliar where fk_idComentario = '$idPergunta'";

                                                if($consulta->num_rows==0){

                                                    $calculo=0;

                                                    echo "
                                                        <span class='ratingAverage' data-average=".$calculo."></span>
                                                        <div class='barra'>
                                                            <span class='bg'></span>
                                                            <span class='stars'>

                                                            ";
                                                            
                                                                for($i=1; $i<=5; $i++){
                                                            
                                                                    echo "<span class='star' data-id=".$idPergunta." data-vote=".$i.">
                                                                    <span class='starAbsolute'></span>
                                                                    </span>";
                                                                }
                                                        echo "</div>";
                                                    
                                                }else{

                                                    $consulta=$conector->query($sql); 

                                                    while($estrelas = $consulta->fetch_array()){
                                                        
                                                        $calculo = round($estrelas['media'],1);

                                                    
                                                    ?>


                                                    <span class="ratingAverage" data-average="<?php echo $calculo;?>"></span>
                                                    
                                                    <span class="question"></span>

                                                    <div class="barra">
                                                        <span class="bg"></span>
                                                        <span class="stars">
                                                    

                                                    <?php for($i=1; $i<=5; $i++):?>


                                                        <span class="star" data-id="<?php echo $idPergunta;?>" data-vote="<?php echo $i;?>">
                                                            <span class="starAbsolute"></span>
                                                        </span>
                                                <?php 
                                                    endfor;
                                                    
                                                    echo "</div>";
                                                }
                                                }
                                            ?>

                                        </div>

                                        <div class="col-md-1 col-xs-12">
                                            <p id='mostraMedia'><?php echo $calculo."pts";?></p>
                                        </div>
                                        
                                        <div class="col-md-9 col-xs-12">
                                            <span class="text-danger" style="padding:3px; border-radius:3px;" data-toggle="modal" data-target="#modalDenuncia"><b>Denunciar</b></span>
                                        </div>

                                    </div>
                                    
                                    <hr>

                                    <textarea name="tx_resp" class="form-control" id="respondertextarea" rows="3" style=""></textarea>    
                                    <br>

                                    <input type="submit" class="btn btn-success float-md-right" name="btn_enviarResposta" value="Responder">
                                
                                </form>

                                </div>
                                <!-- /responderPergunta-->
                                
                                <br>

                                <div class="respostas">

                                    <?php 

                                        $sql="SELECT * from comentario as c inner join usuario as u on u.idUsuario = c.fk_idUsuario and c.resposta='$idPergunta' ORDER BY idComentario";
                                        $consulta=$conector->query($sql);
                                        
                                        while($respostas=$consulta->fetch_array()){

                                            echo "
                                            
                                                <div class='row'>

                                                    <div class='col-md-1'>
                                                        <img style='max-width:52px; max-height:55px; border-radius:25px;' src='php_log/".$respostas['imagemPerfil']."'>
                                                    </div>
                                                    <div class='col-md-11'>

                                                        <p style='padding-top:15px;'>".$respostas['nome']."  -  ".$respostas['disciplina_pergunta']."  -  ".$respostas['data_comentario']."</p>

                                                        <p>".$respostas['descricao']."</p>
                                                    </div>


                                                </div>
                                                
                                                <hr>
                                            
                                            ";
                                        
                                        }   

                                        if($consulta->num_rows==0)
                                            echo "Não há respostas, seja o primeiro!";
                                            
                                    ?>

                                </div>
                                <!-- /Respostas -->
                            </div>
                            <!-- /COL1 -->

                                
                        </div>
                        <!-- /ROW1 -->


















                    </div>
                    <!-- /CONTEUDO -->
                </div>

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
                            
                        <input type="text" name="inp_idComentario" value="<?php echo $idPergunta;?>" style="display:none">

                        <div class="form-group">

                            <p>Escolha o motivo da denúncia:</p>
                            
                            <input type="radio" id="lb_ofensivo" name="inp_motivo" value="Conteúdo Ofensivo"> <label for="lb_ofensivo">Conteúdo Ofensivo</label><br>

                            <input type="radio" id="lb_inapropriada" name="inp_motivo" value="Pergunta Inapropriada"> <label for="lb_inapropriada">Pergunta Inapropriada</label><br>

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

                            $_SESSION['caminhoDenuncia']='pergunta';
                        
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
    <script src="js/responder_pergunta.js"></script>

    <!-- tineMCE Editor -->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=p65sfmlq1kfuqrrrrcvd2kf1zl53p3smazhwb00tjo26a9g0"></script>  

    <script>

        
        $(function(){
            var average = $('.ratingAverage').attr('data-average');
            function avaliacao(average){
                average = (Number(average)*20);
                $('.bg').css('width', 0);		
                $('.barra .bg').animate({width:average+'%'}, 500);
            }
            
            avaliacao(average);

            $('.star').on('mouseover', function(){
                var indexAtual = $('.star').index(this);
                for(var i=0; i<= indexAtual; i++){
                    $('.star:eq('+i+')').addClass('full');
                }
            });
            $('.star').on('mouseout', function(){
                $('.star').removeClass('full');
            });

            $('.star').on('click', function(){

                var voto = $(this).attr('data-vote');
                var idPergunta = $(this).attr('data-id');
            
                $.post('php_log/php_avaliarPergunta.php', {votar:'sim',nota:voto,id:idPergunta } , function(retorno){       
                    avaliacao(retorno.average);
                    $('#mostraMedia').html(retorno.average+"pts");		
                }, 'jSON');
                
            });

        });

    </script>

</body>

</html>
<!-- end document-->
