<?php 
    session_start();
    
    unset($_SESSION['logado']);
    unset($_SESSION['tipo']);
    unset($_SESSION['nome']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['idUltimo']);
    unset($_SESSION['msg']);
    unset($_SESSION['msgConteudo']);
    unset($_SESSION['msgEmailSenha']);
    unset($_SESSION['msgEditarConteudo']);
    unset($_SESSION['caminhoDenuncia']);
    unset($_SESSION['msgCadastroAdm']);
    session_destroy();

    header('Location: ../../entrar.php');

    exit();

    // Verificar as Sessões que estão ativas
    // foreach( $_SESSION as $index => $data ){
    //     echo $index, ' = ', $data; 
    //     echo "<br>";
    // }


?>
