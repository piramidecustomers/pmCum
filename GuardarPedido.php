<?php
    $telefono = $_POST["txtTelefono"];
    $fecha = $_POST["txtFecha"];
    $horaEntrega = $_POST["txtHoraEntrega"];
    $numeroMesa = $_POST["txtNumeroMesa"];
    $orden = $_POST["txtOrden"];
    $observaciones = $_POST["txtObservaciones"];
    $formaPagoCuenta = $_POST["cmbFormaPagoCuenta"];
    $formaPagoDelivery = $_POST["cmbFormaPagoDelivery"];
    $precioDelivery = 0;
    
    if(isset($_POST["txtPrecioDelivery"])){
        $precioDelivery = $_POST["txtPrecioDelivery"];
        
    }

    include('Sesion.php');
    include('Conexion.php');

    if ($formaPagoCuenta == "Efectivo") $formaPagoCuenta = 1;
    if ($formaPagoCuenta == "Tarjeta") $formaPagoCuenta = 2;
    if ($formaPagoCuenta == "Gift Card") $formaPagoCuenta = 3;
    if ($formaPagoCuenta == "PayPhone") $formaPagoCuenta = 6;
    if ($formaPagoCuenta == "Otra") $formaPagoCuenta = 5;

    if($formaPagoDelivery == "Efectivo") $formaPagoDelivery = 1;
    if($formaPagoDelivery == "Tarjeta") $formaPagoDelivery = 2;
    if($formaPagoDelivery == "PayPhone") $formaPagoDelivery = 6;
    if($formaPagoDelivery == "Otra") $formaPagoDelivery = 5;
    if($formaPagoDelivery == "Sin Delivery") $formaPagoDelivery = 4;

    //echo $telefono." ".$restaurante." ".$fecha." ".$horaEntrega." ".$numeroMesa." ".$orden." ".$observaciones." ".$formaPagoCuenta." ".$formaPagoDelivery." ".$precioDelivery;


    $query = "INSERT INTO pedidos (idCliente, idRestaurante, fecha, horaEntrega, numeroMesa, orden, observaciones, formaPagoCuenta, 
                formaPagoDelivery, precioDelivery) 
              VALUES ((SELECT idCliente FROM clientes WHERE telefono = '$telefono' AND idRestaurante =$restaurante), $restaurante, '$fecha', '$horaEntrega', 
                '$numeroMesa', '$orden', '$observaciones', $formaPagoCuenta, $formaPagoDelivery, $precioDelivery);";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die("<script language='javascript'>alert('Hubo un error...'); window.history.back(-1);</script>" ); 
    
    $close = mysqli_close($conexion) or die("Error en la desconexion");


    include('Conexion.php');
    
    $query = "  SELECT idPedido FROM pedidos 
                WHERE idCliente = (SELECT idCliente FROM clientes WHERE telefono='$telefono' AND idRestaurante=$restaurante) 
                    AND idRestaurante = $restaurante
                ORDER BY idPedido DESC
                LIMIT 1;";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 

    if ($line = mysqli_fetch_array($resultado, MYSQLI_BOTH)){}
    
    $idPedido = $line[0];

    $close = mysqli_close($conexion) or die("Error en la desconexion");
    
    //echo "<script type=\"text/javascript\">alert(\"Pedido guardado con éxito.\");</script>"; 
    header("Location: PedidoExitoso.php?idPedido=$idPedido");
    //echo "<script>window.open('ReportePedido.php', '_blank');</script>";
    
    

    

?>