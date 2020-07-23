<?php
    include('Conexion.php');
    include('Sesion.php');

    $Nombre = $_POST["txtNombres"];
    $Apellido = $_POST["txtApellidos"];

    if (!empty($_POST["txtPassword"])){
        $tClave = $_POST["txtPassword"];
        $semilla1='>Nv+m4\V5X';
        $semilla2='b8,MC5+$:;';
        $tClave=md5(sha1(md5($semilla1.$tClave.$semilla2)));

        $query = "UPDATE usuariospiramide SET Nombre='$Nombre', Apellido='$Apellido', contrasennia='$tClave'
                WHERE usuario = '$usuario';";

    }
    else {
        $query = "UPDATE usuariospiramide SET Nombre='$Nombre', Apellido='$Apellido'
                WHERE usuario = '$usuario';";   
    }
    
    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die("<script language='javascript'>alert('Hubo un error...'); window.history.back(-1);</script>" ); 
    
    $close = mysqli_close($conexion) or die("Error en la desconexion");

    echo "<script language='javascript'>alert('Guardado Éxitosamente'); </script>";

    header("Location: Perfil.php");
    
?>
