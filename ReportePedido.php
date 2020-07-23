<?php

    session_start();
            

    if(!strcmp($_SESSION["w3xS[:Y8hM"], "p5B8]K5v-]a2)B+z)") && !strcmp($_SESSION["IloUxS[]{}Y8jJ"], "A57iLo0{}}[]{Ll78"))
    { 
        //echo $_SESSION["/78usioILKJ[[]][O"]; jhlki
        
        $idPedido = $_POST['idPedido'];
        $restaurante = $_SESSION["/78usioILKJ[[]][O"];
        $restaurante = ($restaurante/3908) - 8989;

        include('Conexion.php');

        $query = "SELECT p.idPedido, CONCAT(c.Nombres, ' ', c.Apellidos), r.Restaurante, c.Telefono, c.Direccion, c.puntoReferencia, p.fecha, p.horaEntrega, p.numeroMesa, p.orden, 
                    p.observaciones, f.formaPago, ff.formaPago, p.precioDelivery FROM pedidos p
                INNER JOIN clientes c ON p.idCliente = c.idCliente
                INNER JOIN restaurantes r ON p.idRestaurante = r.idRestaurante
                INNER JOIN formaspago f ON p.formaPagoCuenta = f.idFormaPago
                INNER JOIN formaspago ff ON p.formaPagoDelivery = ff.idFormaPago
                WHERE p.idRestaurante =$restaurante AND p.idPedido = $idPedido
                ORDER BY p.idPedido;";

        mysqli_set_charset($conexion, "utf8");

        $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 

        if ($line = mysqli_fetch_array($resultado, MYSQLI_BOTH)){}
            
    }
    else {
        header('Location: index.php');
    }

    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {
    // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('images/logo.png',150,8,13);
            // Arial bold 15
            $this->SetFont('Arial','B',16);
            // Movernos a la derecha
            $this->Cell(70);
            // Título
            $this->Cell(240,10,"Pedido",0,0,'C');
            // Salto de línea
            $this->Ln(20);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',6);
            // Número de página
            $this->Cell(0,10,utf8_decode('Esta página no tiene ninguna validez legal.'),0,0,'R');
        }
    }

    $pdf = new PDF('L','mm','Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(370,5,utf8_decode(''.$line[2]), 0, 1, 'C', 0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(370,10,utf8_decode('Fecha: '.$line[6]), 0, 1, 'C', 0);
    
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(370,10,utf8_decode('Número de mesa: _________'), 0, 1, 'C', 0);
    $pdf->Cell(200,5,'', 0, 1, 'C', 0);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(370, 10, utf8_decode('Cliente: '.$line[1].'     Tel.: '.$line[3]), 0, 1, 'C', 0);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(370, 10, utf8_decode('Hora de Entrega: '.$line[7]), 0, 1, 'C', 0);

    $pdf->SetFont('Arial','B',12);
    //$pdf->Cell(70, 5, utf8_decode(''), 0, 1, 'C', 0);
    //$pdf->Cell(200, 10, utf8_decode('Dirección:'), 0, 0, 'C', 0);
    //$pdf->Cell(70, 5, utf8_decode(''), 0, 1, 'C', 0);
    $pdf->SetFont('Arial','',9);
    //$pdf->Cell(200, 10, utf8_decode($line[4]), 0, 1, 'C', 0);
    $pdf->SetX(150);
    $pdf->MultiCell(100, 5, utf8_decode('Dirección: '.$line[4]), 0, 'L');

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(70, 5, utf8_decode(''), 0, 1, 'C', 0);
    //$pdf->Cell(200, 10, utf8_decode('Punto de Referencia:'), 0, 0, 'C', 0);
    //$pdf->Cell(70, 5, utf8_decode(''), 0, 1, 'C', 0);
    $pdf->SetFont('Arial','',9);
    //$pdf->Cell(200, 10, utf8_decode($line[5]), 0, 1, 'C', 0);
    $pdf->SetX(150);
    $pdf->MultiCell(100, 5, utf8_decode('Punto de Referencia: '.$line[5]));

    $pdf->SetFont('Arial','B',9);
    //$pdf->Cell(70, 5, utf8_decode(''), 0, 1, 'C', 0);
    $pdf->Cell(370, 10, utf8_decode('Orden:'), 0, 1, 'C', 0);
    $pdf->SetFont('Arial','',8);
    $pdf->SetX(150);
    $pdf->MultiCell(0, 5, utf8_decode($line[9]), 0, 'L');

    $pdf->SetFont('Arial','B',11);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(70, 5, utf8_decode(''), 0, 1, 'C', 0);
    $pdf->SetX(150);
    $pdf->MultiCell(0, 5, utf8_decode('Observaciones: '.$line[10]));

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(70, 5, utf8_decode(''), 0, 1, 'C', 0);
    $pdf->Cell(370, 5, utf8_decode('Forma de pago Cuenta: '.$line[11]), 0, 1, 'C', 0);
    
    $pdf->SetFont('Arial','B',8);
    
    $pdf->Cell(370, 5, utf8_decode('Forma de pago Delivery: '.$line[12]), 0, 1, 'C', 0); 

    $pdf->SetFont('Arial','B',8);
    
    $pdf->Cell(370, 5, utf8_decode('Precio Delivery: $'.$line[13]), 0, 1, 'C', 0); 

    $pdf->Output();

?>