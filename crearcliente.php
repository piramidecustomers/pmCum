<?php  

    $telefono = $_POST["txtTelefono"];
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $direccion = $_POST["txtDireccion"];
    $puntoReferencia = $_POST["txtPuntoReferencia"];
    $observaciones = $_POST["txtObservaciones"];
    $tipoCli = $_POST["comboTipoCliente"];
    

    session_start();
    $restaurante = $_SESSION["/78usioILKJ[[]][O"];
    $restaurante = ($restaurante/3908) - 8989;

    if ($tipoCli == "Normal") $tipoCliente = 1;
    if ($tipoCli == "Problemático") $tipoCliente = 2;
    if ($tipoCli == "Rojo") $tipoCliente = 3;
    
    $server="localhost";
    $user="root";
    $pass="catolica";
    $bd="piramide_customers";

    $conexion = mysqli_connect($server, $user, $pass, $bd) or die ("Error en la conexion");

    $query = "INSERT INTO clientes (Nombres, Apellidos, Telefono, Direccion, puntoReferencia, observaciones, idTipoCliente, 
                idRestaurante, estado) VALUES ('$nombre', '$apellido', '$telefono', '$direccion', '$puntoReferencia', '$observaciones', 
                $tipoCliente, $restaurante, 1);";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die("<script language='javascript'>alert('Ese número ya existe, pruebe con otro.'); window.history.back(-1);</script>" ); 


    $close = mysqli_close($conexion) or die("Error en la desconexion");
    $location = 'Location: MenuN.php';
    header($location);

    exit;

?>