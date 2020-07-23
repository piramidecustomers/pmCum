<?php
    include('Sesion.php');
    include('ListadoPedidos.php');

    $artPorPagina = 10;

    $mysqli = new mysqli("localhost", "root", "catolica", "piramide_customers");
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
            $salida.='<div align="center"><nav align="center" aria-label="Page navigation example">
                        <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="buscarPedidos.php?page='.($_GET['page']-1).'">Anterior</a></li>';
            for ($i = 0; $i < $paginas; $i++){
                if ($_GET['page']==($i+1))
                $activo = "active"; else {$activo = '';}
                $salida.= '<li class="page-item" '.($activo).'><a class="page-link" href="buscarPedidos.php?page='.($i + 1).'">'.($i + 1).'</a></li>';
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