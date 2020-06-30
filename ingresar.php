<?php  

    $tAlias = $_GET["usu"];
    $tClave = $_GET["contra"];
    //echo ("Hasta aqui todo bien " .$tAlias. " ".$tClave); 
    
    $semilla1='>Nv+m4\V5X';
    $semilla2='b8,MC5+$:;';
    //$tClave=md5(sha1(md5($semilla1.$tClave.$semilla2)));

    $server="localhost";
    $user="root";
    $pass="catolica";
    $bd="piramide_customers";

    $conexion = mysqli_connect($server, $user, $pass, $bd) or die ("Error en la conexion");

    $query = "SELECT usuario, idTipoUsu, idRestaurante FROM usuariospiramide WHERE usuario = '$tAlias' AND contrasennia='$tClave'";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 

    session_start();
    $_SESSION["w3xS[:Y8hM"] = null;

    if ($line = mysqli_fetch_array($resultado, MYSQLI_BOTH))
    {
        $_SESSION["w3xS[:Y8hM"] = "p5B8]K5v-]a2)B+z)";
        
        header('Location: MenuN.php');
        $tipoUsuario = $line['idTipoUsu'];
        $idRestaurante = $line['idRestaurante'];

        if ($tipoUsuario == 1) $_SESSION["IloUxS[]{}Y8jJ"] = "A57iLo0{}}[]{Ll78";
        $_SESSION["Usuario"] = $line['usuario'];
        $_SESSION["/78usioILKJ[[]][O"] = ($line['idRestaurante'] + 8989) * 3908;
    }
    else {
        unset($_SESSION['w3xS[:Y8hM']);
        session_destroy();
        header('Location: gmail.com');
    }

    $close = mysqli_close($conexion) or die("Error en la desconexion");

    //pg_free_result($result);
    //pg_close($dbconn);
    //header('Location: personas.php');

    exit;

?>