<?php
    
    include('Sesion.php');
    

    //$mysqli = new mysqli("localhost", "id14177438_adminpiramide", "Customers2020_", "id14177438_piramide");
    //$mysqli = new mysqli("localhost", "root", "catolica", "piramide_customers");
    $mysqli = new mysqli("bleamcorspmyl7wd2a35-mysql.services.clever-cloud.com", "uuq9udaawurdnlyo", "vqWXOIK2P1U1yhdmMOu9", "bleamcorspmyl7wd2a35");
    
    $salida = "";
    $query = "SELECT idCliente, Nombres, Apellidos, Telefono, Direccion FROM clientes WHERE idRestaurante = $restaurante;";

    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);

        $query = "SELECT idCliente, Nombres, Apellidos, Telefono, Direccion FROM clientes 
                    WHERE (Telefono LIKE '%".$q."%' OR Apellidos LIKE '%".$q."%' OR Nombres LIKE '%".$q."%' OR Direccion LIKE '%".$q."%') 
                    AND idRestaurante = $restaurante;";
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0) {
        $salida.="<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Nombres</th>
                    <th scope='col'>Apellidos</th>
                    <th scope='col'>Teléfono</th>
                    <th scope='col'>Dirección</th>
                    <th scopet='col'>Acción</th>
                </tr>
            </thead>
            <tbody>";

            while($fila = $resultado->fetch_assoc()){
                $salida.="<tr>
                    <td>".$fila['Nombres']."</td>
                    <td>".$fila['Apellidos']."</td>
                    <td>".$fila['Telefono']."</td>
                    <td>".$fila['Direccion']."</td>
                    <td>
                        <form action='Inicio.php' method='post'>
                            <button class='btn btn-info'>Ver más...</button>
                            <input type='hidden' id='jhlki' name='jhlki' value='".$fila['Telefono']."'>
                        </form>
                    </td>
                    </tr>";
            }

            $salida.="</tbody></table>";
    }
    else {
        $salida.="<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Nombres</th>
                    <th scope='col'>Apellidos</th>
                    <th scope='col'>Teléfono</th>
                    <th scope='col'>Dirección</th>
                    <th scopet='col'>Acción</th>
                </tr>
            </thead>
            <tbody>";
            $salida.="</tbody></table>";
        $salida.="<h4 align='center'>No hay datos</h4>";
    }

    echo $salida;

    $mysqli->close();
?>