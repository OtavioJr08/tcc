<?php 
    session_start();

    if(!isset($_SESSION['logado'])) //verifica se o usuário está logado para visitar a página
        header('Location: php_log/php_logout.php');

    if($_SESSION['tipo']==0)
        header('Location:inicio.php');

    include 'php_log/conexaoBD.php';
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
    <title>Denúncias - Brain's Education</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png">

    <!-- custom CSS -->
    <link href="css/denuncias.css" rel="stylesheet" media="all">

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
    
    <!-- LINK DataTables -->
    <link href="DataTables/jquery.dataTables.min.css" rel="stylesheet">
    
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
                                <li class=" has-sub">
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
                                <li class="active has-sub">
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
                <div class="logo" style="display:block">
                    <a href="#">
                        <img src="images/icon-white.png" alt="Cool Admin" />
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
                                <li class="active has-sub">
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
                                <li class=" has-sub">
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
                                <li class="active has-sub">
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
                                                <a href="inicio.php">Início</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Denúncias</li>
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
                        <h3 class="title-2 m-b-40">Denúncias</h3>
                        <div class="table-responsive">
                                <table class="table table-hover" id="tableDenuncias"  style="padding:5px;">
                                    <thead>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>Texto</th>
                                        <th>Motivo</th>
                                        <th>Data Denúncia</th>
                                        <th>Julgar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql="SELECT c.idComentario, c.descricao, c.disciplina_pergunta,c.data_comentario, u.idUsuario, u.nome, d.idDenuncia, d.idDenuncia, d.data_denuncia, d.motivo, d.resposta from comentario as c inner join usuario as u on c.fk_idUsuario = u.idUsuario inner join denunciar as d on d.fk_idComentario = c.idComentario and d.resposta is null";
                                            $consulta=$conector->query($sql);
                                            while($dados=$consulta->fetch_array()){
                                                $idPerg = $dados['idComentario'];                                   
                                                $descricaoPerg = $dados['descricao'];
                                                echo
                                                    "<tr class='linhas'>
                                                        <td>".$dados['idDenuncia']."</td>
                                                        <td>".$dados['descricao']."</td>
                                                        <td>".$dados['motivo']."</td>
                                                        <td>".$dados['data_denuncia']."</td>
                                                        <td>
                                                            <i data-toggle='modal' data-target='#modalApagar' type='button' class='fas fa-gavel btn btn-primary apagarPergunta' id='' idDenunciaApagar='".$dados['idDenuncia']."' descricaoPerguntaApagar='".$descricaoPerg."' idPerguntaApagar=".$dados['idComentario'].">
                                                            </i>
                                                        </td>                                                       
                                                    </tr>"
                                                ;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- </div>/PERGUNTAS -->
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
    <!-- Modal Confirmar -->
    <div class="modal fade" id="modalApagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ocultar pergunta?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">       
                    <p> Você está julgando a denúncia abaixo:</p>
                    <p style="font-style:italic" id="descricaoPerguntaApagarConfirmar"></p>
                    <p>Escreva o motivo dessa sua escolha para ficar registrado:</p>
                    <form action="php_log/php_ocultarComentario.php" method="post" id="formularioOcultar">
                        <div class="form-group">
                            <input type="radio" name="inp_escolha" id="ocultar" value="ocultar" required> <label for="ocultar">Ocultar</label><br>
                            <input type="radio" name="inp_escolha" id="absolver" value="absolver" required> <label for="absolver">Absolver</label><br>     
                            <label for="lb_resposta">Resposta</label> 
                            <textarea id="lb_resposta" class="md-textarea form-control" rows="3" name="txt_resposta" required></textarea>
                        </div>
                        <textarea name="txt_idOcultar" class="form-control" id="idPerguntaApagarConfirmar" rows="3" style="display:none;"></textarea>
                        <textarea name="txt_idDenuncia" class="form-control" id="idDenunciaApagarConfirmar" rows="3" style="display:none;"></textarea>       
                </div>
                <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name="inp_confirmar" value="Confirmar">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL CONFIRMAR -->

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
    <script src="js/denuncias.js"></script>

    <!-- script DataTables -->
    <script src="DataTables/jquery.dataTables.min.js"></script>

</body>

</html>
<!-- end document-->
