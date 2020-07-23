<?php
        include('Sesion.php');
        include('Conexion.php');

        if(isset($_POST['idPedido'])){
            $idPedido = $_POST['idPedido'];
        }
        else {
            $idPedido = 0;
        }

        $query = "SELECT CONCAT(c.Nombres, ' ' ,c.Apellidos), c.Telefono, fecha, horaEntrega, numeroMesa, orden, p.observaciones, formaPagoCuenta, formaPagoDelivery, precioDelivery FROM pedidos p
                    INNER JOIN clientes c ON p.idCliente = c.idCliente
                    WHERE idPedido = $idPedido AND p.idRestaurante = $restaurante;";

        mysqli_set_charset($conexion, "utf8");

        $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 

        if ($line = mysqli_fetch_array($resultado, MYSQLI_BOTH)){
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Pedido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/stylePedido.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script>
        $( function() {
            $("#cmbFormaPagoDelivery").change( function() {
                if ($(this).val() === "Sin Delivery") {
                    $("#txtPrecioDelivery").prop("disabled", true);
                    $("#txtPrecioDelivery").prop("value", "Sin Delivery");
                } else {
                    $("#txtPrecioDelivery").prop("disabled", false);
                    $("#txtPrecioDelivery").prop("value", "");
                }
            });
        });
    </script>

</head>

<header>
    <?php include ("menu.php");?>
</header>

<body>
    
    <br><br>
    <h4 style="text-align:center; color: #FFFFFF;">Editando Pedido</h4><br><br>

    <div align="center" class="clientes">
        <br>
        <form action="ListadoPedidos.php">
            <button type="submit" class="btn btn-info"><< Regresar</button>
        </form>
        
        <form action="GuardarEdicionPedido.php" method="POST" >           
            <br><br>
            
            <input type='hidden' id="idPedido" name="idPedido" value="<?php echo $idPedido; ?>">

            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-5">
                    <label for="NumeroTelefono">Número de Teléfono</label>
                    <input type="text" id="txtTelefono" name="txtTelefono" style="text-align:center" placeholder="00000000" require class="form-control input-text" maxlength="8" inputmode="numeric" pattern="[0-9]*" value="<?php echo $line[1]; ?>" readonly>
                    
                </div>

                <div class="form-group col-md-5">
                    <label for="Cliente">Cliente</label>
                    <input type="text" class="form-control" style="text-align:center" id="txtCliente" name="txtCliente" value="<?php echo $line[0]; ?>" readonly>
                </div>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-1"></div>

                <div class="form-group col-md-1" style="text-align:center">
                    <label for="fecha" >Fecha</label>
                    
                </div>

                <div class="form-group col-md-2">   
                    <input type="date" id="txtFecha" name="txtFecha"  style="text-align:center" required class="form-control input-text" value="<?php echo $line[2]; ?>">
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="HoraEntrega">Hora de Entrega</label>
                    
                </div>

                <div class="form-group col-md-1">
                    <input type="text" class="form-control" style="text-align:center" id="txtHoraEntrega" name="txtHoraEntrega" placeholder="Ej. 12:55" value="<?php echo $line[3]; ?>">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="NumeroMesa">Número de Mesa</label>
                    
                </div>

                <div class="form-group col-md-1 ">
                    <input type="text" class="form-control" style="text-align:center" id="txtNumeroMesa" name="txtNumeroMesa" placeholder="Ej. 10" <?php echo $line[4]; ?>>
                </div>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-1"></div>

                <div class="form-group col-md-10" style="text-align: left">
                    <label for="orden">Orden</label>
                    <textarea class='form-control' id='txtOrden' name='txtOrden' rows='10' placeholder='Escriba la orden...' required ><?php echo $line[5]; ?></textarea>
                </div>

                <div class="form-group col-md-1"></div>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-1"></div>

                <div class="form-group col-md-10" style="text-align: left">
                    <label for="observaciones">Observaciones</label>
                    <textarea class='form-control' id='txtObservaciones' name='txtObservaciones' rows='5' placeholder='Escriba alguna observación...' ><?php echo $line[6]; ?></textarea>
                </div>

                <div class="form-group col-md-1"></div>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-3"></div>

                <div class="form-group col-md-2">
                    <label for="FormaPago">Forma de pago Cuenta</label>
                </div>     

                <div class="form-group col-md-3">
                    
                    <select class="form-control" name="cmbFormaPagoCuenta" id="cmbFormaPagoCuenta">
                        <?php  
                            if ($line[7]==1){
                                echo "<option selected='selected'>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option>Otra</option>";
                            }else if ($line[7] == 2){
                                echo "<option>Efectivo</option>
                                        <option selected='selected'>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option>Otra</option>";
                            }else if ($line[7] == 3){
                                echo "<option>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option selected='selected'>Gift Card</option>
                                        <option>Otra</option>";
                            }else if ($line[7] == 5){
                                echo "<option>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option selected='selected'>Otra</option>";
                            }
                            else if ($line[7] == 6){
                                echo "<option>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option selected='selected'>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option>Otra</option>";
                            }
                        ?>
                        
                    </select>                    
                </div>

            </div> <br><br>

            <div class="form-row">
                <div class="form-group col-md-1"></div>

                <div class="form-group col-md-2">
                    <label for="FormaPagoDelivery">Forma de pago Delivery</label>
                </div> 

                <div class="form-group col-md-3">
                    
                    <select class="form-control" name="cmbFormaPagoDelivery" id="cmbFormaPagoDelivery">
                    <?php  
                            if ($line[8]==1){
                                echo "<option>Sin Delivery</option>
                                        <option selected='selected'>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option>Otra</option>";
                            }else if ($line[8] == 2){
                                echo "<option>Sin Delivery</option>
                                        <option>Efectivo</option>
                                        <option selected='selected'>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option>Otra</option>";
                            }else if ($line[8] == 3){
                                echo "<option>Sin Delivery</option>
                                        <option>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option selected='selected'>Gift Card</option>
                                        <option>Otra</option>";
                            }else if ($line[8] == 4){
                                echo "<option selected='selected'>Sin Delivery</option>
                                        <option>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option>Otra</option>";
                            }
                            else if ($line[8] == 5){
                                echo "<option>Sin Delivery</option>
                                        <option>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option selected='selected'>Otra</option>";
                            }
                            else if ($line[8] == 6){
                                echo "<option>Sin Delivery</option>
                                        <option>Efectivo</option>
                                        <option>Tarjeta</option>
                                        <option selected='selected'>PayPhone</option>
                                        <option>Gift Card</option>
                                        <option>Otra</option>";
                            }
                        ?>
                        
                    </select>  
                </div>

                <div class="form-group col-md-2">
                <label for="PrecioDelivery">Precio Delivery</label>
                </div> 

                <div class="form-group col-md-2">
                    
                    <input type="text" class="form-control" style="text-align:center" required id="txtPrecioDelivery" name="txtPrecioDelivery" placeholder="Ejemplo:    2.50" value="<?php echo $line[9]; ?>">
                </div>
            </div>
            
            <br><br>

            <div class="form-row">
                <div class="form-group col-md-5"></div>

                <div class="form-group col-md-2" >
                    <button type="submit" class="btn btn-success">Guardar Pedido</button>
                </div>

                <div class="form-group col-md-1"></div>
            </div>


            <br><br><br>
        </form>
    </div>
    
    <?php 
        }
        else {
            echo "<h3>Hubo un error inesperado... Contacte con el Administrador.</h3><a class='btn btn-danger' href='MenuN.php' value='Ir a menu...'>Ir a Menu</a>";
        }

        $close = mysqli_close($conexion) or die("Error en la desconexion");

    ?>
    
</body>
</html>