<?php
    include('Sesion.php');
    include('Conexion.php');
?>


<!DOCTYPE html>
<html lang="es"> 

<head>
<title>Buscar Clientes</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/styleInicio.css">
</head>

<header>
    <?php include ("menu.php");?>
</header>

<body>
    
    <?php
        
            if (isset($_POST["jhlki"])){
                $telefono= $_POST["jhlki"];
            }
            else {
                $telefono= 0;
            }
            

            $query = "SELECT idCliente, Nombres, Apellidos, Telefono, Direccion, puntoReferencia, observaciones, idTipoCliente FROM clientes WHERE Telefono = '$telefono' AND idRestaurante=$restaurante";

            mysqli_set_charset($conexion, "utf8");

            $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 
                
        
    ?>
    </br>
    <h2 align="center">Buscar Clientes</h2>
    </br>
    <div align="center">
        <form class="padre" action='Inicio.php' method='POST'>
            <div class="form-group row">
                <label for="telbusqueda" class="col-sm-4 col-form-label">Número de Teléfono</label>
                <div class="col-sm-4">
                    <input type="number" id="jhlki" name="jhlki" style="text-align:center" placeholder="00000000" class="form-control input-text" maxlength="8" inputmode="numeric" pattern="[0-9]*" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="submit" value="Buscar" class="btn btn-success">
                    
                </div>
            </div>
        </form>
        </br>
        <form class="clientes" action='ActualizarCliente.php' method='POST'><div class="clientes2">
            </br>
            <?php if ($line = mysqli_fetch_array($resultado, MYSQLI_BOTH)){ ?>

            <h4 style="text-align:center">Editar Información del cliente</h4>
            </br>
            <div class="form-group" align="center">
                <div class="form-group col-md-4" align="center">
                
                <?php  
                    
                        echo "<label for='name'>Número de Teléfono</label>";
                        echo "<input type='text' readonly id='txtTelefono' name='txtTelefono' style='text-align:center' placeholder='00000000' require class='form-control input-text' maxlength='8' inputmode='numeric' pattern='[0-9]*' value='$line[3]'>";
                    
                    ?>
                
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <?php 
                    echo "<input type='text' class='form-control' id='txtNombre' name='txtNombre' placeholder='Nombre' value='$line[1]'>";
                    $cliente = $line[1];
                ?>
                </div>

                <div class="form-group col-md-6">
                <label for="inputPassword4">Apellidos</label>
                <?php 
                    echo "<input type='text' class='form-control' id='txtApellido' name='txtApellido' placeholder='Apellidos' value='$line[2]'>";
                    $cliente = $cliente.$line[2];
                ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Dirección</label>
                <?php 
                   echo "<textarea require class='form-control' id='txtDireccion' name='txtDireccion' rows='3' placeholder='Escriba la dirección...' >$line[4]</textarea>";
                ?>
            </div>
            <div class="form-group">
                <label for="inputAddress">Punto de Referencia</label>
                <?php 
                    echo "<textarea class='form-control' id='txtPuntoReferencia' name='txtPuntoReferencia' rows='3' placeholder='Escriba punto de referencia...'>$line[5]</textarea>";
                ?>
            </div>
            <div class="form-group">
                <label for="inputAddress">Observaciones</label>
                <textarea class="form-control" id="txtObservaciones" name="txtObservaciones" rows="3" placeholder="Observaciones..." ><?php echo $line[6]; ?></textarea>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    
                </div>
                <div class="form-group col-md-2">
                    <h5>Tipo de cliente</h5>
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="comboTipoCliente">
                        <?php 
                            if($line[7]==1) {
                                echo "<option selected='selected'>Normal</option>";
                                echo "<option>Delicado</option>";
                                echo "<option>Rojo</option>";
                            } 
                            if ($line[7]==2) {
                                echo "<option>Normal</option>";
                                echo "<option selected='selected'>Delicado</option>";
                                echo "<option>Rojo</option>";
                            }
                            if ($line[7]==3){
                                echo "<option>Normal</option>";
                                echo "<option>Delicado</option>";
                                echo "<option selected='selected'>Rojo</option>";
                            }
                        ?>
                        

                    </select>
                </div> 
                                             
                <div class="form-group col-md-5">
                    
                </div>
                
            </div>
            </br>
            <div class="form-row">
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-warning">Actualizar Cliente</button>
                    
                </div>
                <div class="form-group col-md-2">
                <a type="button" class="btn btn-primary" href="RealizarPedido.php?telefono=<?php echo $telefono; ?>&cliente=<?php echo $cliente;?>">
                    Realizar Pedido >>
                    </a>
                </div>
                
            </div>
            <?php 
                        }
                        else {
                            if($telefono != 0){
                                echo "<div class='form-group' align='center'><h5 align='center'>No se ha encontrado el número de teléfono $telefono.</h5>";
                                echo "<a class='btn btn-danger' href='Crear_Cli2.php?telefono=$telefono' >Agregar nuevo número...</a></div><br><br>";                
                            }
                            else{
                                echo "<div class='form-group' align='center'><h5>No ha buscado ningún número.</h5></div><br><br>";
                            }
                            
                        }
                        $close = mysqli_close($conexion) or die("Error en la desconexion");
                    ?> 
            
            </form>
    </div>

</body>

</html>