<?php  

    $tAlias = $_GET["usu"];
    $tClave = $_GET["contra"];
    
    $semilla1='>Nv+m4\V5X';
    $semilla2='b8,MC5+$:;';
    $tClave=md5(sha1(md5($semilla1.$tClave.$semilla2)));

    $server="bleamcorspmyl7wd2a35-mysql.services.clever-cloud.com";
    $user="uuq9udaawurdnlyo";
    $pass="vqWXOIK2P1U1yhdmMOu9";
    $bd="bleamcorspmyl7wd2a35";

    $conexion = mysqli_connect($server, $user, $pass, $bd) or die ("Error en la conexion");

    $query = "SELECT usuario, idTipoUsu, u.idRestaurante, r.restaurante FROM usuariospiramide u
                INNER JOIN restaurantes r ON u.idRestaurante = r.idRestaurante
                WHERE u.usuario = '$tAlias' AND contrasennia='6825a95bd545ebdf21f53299720d8a3a';";

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

        $_SESSION["IloUxS[]{}Y8jJ"] = "A57iLo0{}}[]{Ll78";
        $_SESSION["Usuario"] = $line['usuario'];
        $_SESSION["/78usioILKJ[[]][O"] = ($line['idRestaurante'] + 8989) * 3908;
        $_SESSION["restauranteOnline"] = $line['restaurante'];
        
        if($tipoUsuario == 3) $_SESSION["rodartsinimda"] = "sey";
    }
    else {
        unset($_SESSION['w3xS[:Y8hM']);
        session_destroy();
        header('Location: index.php');
    }

    $close = mysqli_close($conexion) or die("Error en la desconexion");

    exit;

?>