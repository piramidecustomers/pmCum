<?php
    $idPedido = $_POST["idPedido"];
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

    include('Conexion.php');
    include('Sesion.php');

    if ($formaPagoCuenta == "Efectivo") $formaPagoCuenta = 1;
    if ($formaPagoCuenta == "Tarjeta") $formaPagoCuenta = 2;
    if ($formaPagoCuenta == "Gift Card") $formaPagoCuenta = 3;
    if ($formaPagoCuenta == "PayPhone") $formaPagoCuenta = 6;
    if ($formaPagoCuenta == "Otra") $formaPagoCuenta = 5;

    if($formaPagoDelivery == "Efectivo") $formaPagoDelivery = 1;
    if($formaPagoDelivery == "Tarjeta") $formaPagoDelivery = 2;
    if($formaPagoDelivery == "PayPhone") $formaPagoDelivery = 6;
    if($formaPagoDelivery == "Otra") $formaPagoDelivery = 5;
    if($formaPagoDelivery == "Sin Delivery") { $formaPagoDelivery = 4; $precioDelivery = 0;}

    //echo $telefono." ".$restaurante." ".$fecha." ".$horaEntrega." ".$numeroMesa." ".$orden." ".$observaciones." ".$formaPagoCuenta." ".$formaPagoDelivery." ".$precioDelivery;

    
    $query = "UPDATE pedidos SET fecha='$fecha', horaEntrega='$horaEntrega', numeroMesa='$numeroMesa', orden='$orden', 
                observaciones='$observaciones', formaPagoCuenta=$formaPagoCuenta, formaPagoDelivery=$formaPagoDelivery, 
                precioDelivery=$precioDelivery 
                WHERE idRestaurante=$restaurante AND idPedido=$idPedido AND 
                    idCliente= (SELECT idCliente FROM clientes WHERE telefono = '$telefono' AND idRestaurante = $restaurante);";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die("<script language='javascript'>alert('Hubo un error...'); window.history.back(-1);</script>" ); 
    
    $close = mysqli_close($conexion) or die("Error en la desconexion");

    header("Location: EdicionPedidoExitosa.php?idPedido=$idPedido");
    //echo "<script>window.open('ReportePedido.php', '_blank');</script>";
    
        

?>
