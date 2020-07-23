<?php
        include('Sesion.php');
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else {
            $page = 1;
        }
    ?>
<!DOCTYPE html>
<html lang="es"> 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <title>Listado Pedidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php include ("menu.php");?>

    <link rel="stylesheet" type="text/css" href="css/styleListadoPedidos.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    
</head>

<header>
    
</header>

<body>
    
    </br>
    <div class="Titulo">
        <h2 align="center"><strong>Listado de Pedidos</strong></h2>
    </div>
    <div class="Contenido" align="center">
        </br></br>
        
        <div class="search">
            <label for="caja_busqueda" style="color:#FFFFFF; font-size:20px;">Buscar:</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda" style="text-align:center;" readonly placeholder="Sin funcionamiento aún." class="form-control input-text"></input>
        </div></br>

        <div id="datos">
            <?php
                
                //include('ListadoPedidos.php');

                $artPorPagina = 10;
                $mysqli = new mysqli("bleamcorspmyl7wd2a35-mysql.services.clever-cloud.com", "uuq9udaawurdnlyo", "vqWXOIK2P1U1yhdmMOu9", "bleamcorspmyl7wd2a35");
                //$mysqli = new mysqli("localhost", "root", "catolica", "piramide_customers");
                //$mysqli = new mysqli("localhost", "id14177438_adminpiramide", "Customers2020_", "id14177438_piramide");
                
                $salida = "";
                $query = "SELECT p.idPedido, CONCAT(c.Nombres, ' ', c.Apellidos) AS Cliente, r.Restaurante, p.fecha, p.horaEntrega, p.numeroMesa, p.orden, 
                                p.observaciones, f.formaPago, ff.formaPago AS Delivery, p.precioDelivery FROM pedidos p
                            INNER JOIN clientes c ON p.idCliente = c.idCliente
                            INNER JOIN restaurantes r ON p.idRestaurante = r.idRestaurante
                            INNER JOIN formaspago f ON p.formaPagoCuenta = f.idFormaPago
                            INNER JOIN formaspago ff ON p.formaPagoDelivery = ff.idFormaPago
                            WHERE p.idRestaurante = $restaurante AND p.estado = 1
                            ORDER BY p.idPedido DESC;";

                if(isset($_POST['consulta'])){
                    $q = $mysqli->real_escape_string($_POST['consulta']);

                    $query = "SELECT idCliente, Nombres, Apellidos, Telefono, Direccion FROM clientes 
                                WHERE (Telefono LIKE '%".$q."%' OR Apellidos LIKE '%".$q."%' OR Nombres LIKE '%".$q."%' OR Direccion LIKE '%".$q."%') 
                                AND idRestaurante = 1;";
                }

                $resultado = $mysqli->query($query); 
                $cantidadPaginas = $resultado->num_rows;; 
                $paginas = $cantidadPaginas / $artPorPagina;
                $paginas = ceil($paginas);
                echo $paginas;
                
                if($resultado->num_rows > 0) {
                    $salida.="<table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>Cliente</th>
                                <th scope='col'>Fecha</th>
                                <th scope='col'>Hora Entrega</th>
                                <th scopet='col'>Orden</th>
                                <th scopet='col'>Observaciones</th>
                                <th scopet='col'>F. Pago Cta.</th>
                                <th scopet='col'>F. Pago Del.</th>
                                <th scopet='col'>Precio Del.</th>
                                <th scopet='col'></th>
                                <th scopet='col'></th>
                                <th scopet='col'></th>
                            </tr>
                        </thead>
                        <tbody>";

                        while($fila = $resultado->fetch_assoc()){
                            $salida.="<tr>
                                <td>".$fila['Cliente']."</td>
                                <td>".$fila['fecha']."</td>
                                <td>".$fila['horaEntrega']."</td>
                                <td>".$fila['orden']."</td>
                                <td>".$fila['observaciones']."</td>
                                <td>".$fila['formaPago']."</td>
                                <td>".$fila['Delivery']."</td>
                                <td>".$fila['precioDelivery']."</td>
                                <td>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <form action='ReportePedido.php' method='post' target='_blank'>
                                                <button class='btn btn-info'><i class='fa fa-print fa-lg' aria-hidden='true'></i></button>
                                                <input type='hidden' id='idPedido' name='idPedido' value='".$fila['idPedido']."'>
                                            </form>
                                        </div>
                                        <div class='col-md'>
                                            <form action='EditandoPedido.php' method='post'>
                                                <button class='btn btn-warning'><i class='fa fa-pencil fa-lg' aria-hidden='true'></i></button>
                                                <input type='hidden' id='idPedido' name='idPedido' value='".$fila['idPedido']."'>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </td>
                                    
                                <td>
                                    <div class = 'row'>
                                        <div class='col-sm-1'></div>
                                        <div class='col-md-6'>
                                            <form action='EliminarPedido.php' method='post'>
                                            <button class='btn btn-danger'><i class='fa fa-trash fa-lg' aria-hidden='true'></i></button>
                                            <input type='hidden' id='idPedido' name='idPedido' value='".$fila['idPedido']."'>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    
                                </td>
                                </tr>";
                        }

                        $salida.="</tbody></table><br><br>";
                        $salida.='</div><div align="center"><nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="ListadoPedidos.php?page='.($page-1).'">Anterior</a></li>';
                        for ($i = 0; $i < $paginas; $i++){
                            if ($page==($i+1))
                            $activo = "active"; else {$activo = '';}
                            $salida.= '<li class="page-item" '.($activo).'><a class="page-link" href="ListadoPedidos.php?page='.($i + 1).'">'.($i + 1).'</a></li>';
                        }
                        $salida.= '<li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                                    </ul>
                                </nav><br></div>';
                }
                else {
                    $salida.="<table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>Cliente</th>
                                <th scope='col'>Fecha</th>
                                <th scope='col'>Hora Entrega</th>
                                <th scopet='col'>Mesa</th>
                                <th scopet='col'>Orden</th>
                                <th scopet='col'>Observaciones</th>
                                <th scopet='col'>F. Pago Cta.</th>
                                <th scopet='col'>F. Pago Del.</th>
                                <th scopet='col'>Precio Del.</th>
                                <th scopet='col'></th>
                                <th scopet='col'></th>
                                <th scopet='col'></th>
                            </tr>
                    </thead>
                    <tbody>";
                        $salida.="</tbody></table>";
                    $salida.="<h4 align='center'>No hay datos relacionados a esa búsqueda.</h4>";
                }

                echo $salida;

                $mysqli->close();
            ?>

        </div>

    </div>

    <script src="js/jquery.min.js"></script>
    
</body>

</html>

