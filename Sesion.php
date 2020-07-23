<?php
    session_start();

    $inactivo = 900;
 
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();
            header("Location: index.php"); 
        }
    }
 
    $_SESSION['tiempo'] = time();
        
    if(!isset($_SESSION["w3xS[:Y8hM"]) && !isset($_SESSION["IloUxS[]{}Y8jJ"]))
    { 
        
        header('Location: index.php');
        exit();
    }
    else {
        if(!strcmp($_SESSION["w3xS[:Y8hM"], "p5B8]K5v-]a2)B+z)") && !strcmp($_SESSION["IloUxS[]{}Y8jJ"], "A57iLo0{}}[]{Ll78"))
        { 
            
            $restaurante = $_SESSION["/78usioILKJ[[]][O"];
            $restaurante = ($restaurante/3908) - 8989;
            $usuario = $_SESSION["Usuario"];
            $restauranteOnline = $_SESSION["restauranteOnline"];
                
        }
        else {
            header('Location: index.php');
        }
    }
?>