<?php  

    $tAlias = $_GET["usu"];
    $tClave = $_GET["contra"];
    $Nombre = $_GET["nombre"];
    $Apellido = $_GET["apellido"];
    $idRestaurante = $_GET["idRestaurante"];
    
    $semilla1='>Nv+m4\V5X';
    $semilla2='b8,MC5+$:;';
    $tClave=md5(sha1(md5($semilla1.$tClave.$semilla2)));

    //$server="localhost";
    $server="localhost";
    $user="id14177438_adminpiramide";
    $pass="Customers2020_";
    $bd="id14177438_piramide";

    $conexion = mysqli_connect($server, $user, $pass, $bd) or die ("Error en la conexion");

    $query = "INSERT INTO usuariospiramide (usuario, contrasennia, idTipoUsu, Nombre, Apellido, idRestaurante, estado) 
                VALUES ('$tAlias', '$tClave', 1, '$Nombre', '$Apellido', $idRestaurante, 1);";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 

    $close = mysqli_close($conexion) or die("Error en la desconexion");

    //pg_free_result($result);
    //pg_close($dbconn);
    //header('Location: personas.php');

    exit;

?>