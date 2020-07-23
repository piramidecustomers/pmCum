<?php
    $idPedido = $_POST["idPedido"];
    
    include('Conexion.php');
    include('Sesion.php');

    
    $query = "UPDATE pedidos SET estado = 0 WHERE idPedido=$idPedido;";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die("<script language='javascript'>alert('Hubo un error...'); window.history.back(-1);</script>" ); 
    
    $close = mysqli_close($conexion) or die("Error en la desconexion");

    header("Location: ListadoPedidos.php");
        

?>

