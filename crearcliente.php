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

    $tipoCliente = 1;
    if ($tipoCli == "Normal") $tipoCliente = 1;
    if ($tipoCli == "Delicado") $tipoCliente = 2;
    if ($tipoCli == "Rojo") $tipoCliente = 3;
    
    $server="localhost";
    $user="id14177438_adminpiramide";
    $pass="Customers2020_";
    $bd="id14177438_piramide";

    $conexion = mysqli_connect($server, $user, $pass, $bd) or die ("Error en la conexion");

    $query = "INSERT INTO clientes (Nombres, Apellidos, Telefono, Direccion, puntoReferencia, observaciones, idTipoCliente, 
                idRestaurante, estado) VALUES ('$nombre', '$apellido', '$telefono', '$direccion', '$puntoReferencia', '$observaciones', 
                $tipoCliente, $restaurante, 1);";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador');
    //echo $restaurante;
    
    
    $close = mysqli_close($conexion) or die("Error en la desconexion");
    $location = 'Location: CreacionExitosa.php?guardado='.$telefono;
    header($location);
    
    exit;

?>

