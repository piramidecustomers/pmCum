<?php
    include('Sesion.php');
?>
<HTML>
    
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<head>
    
    <title>Crear Cliente</title>
    <link rel="stylesheet" type="text/css" href="css/styleInicio.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {	
        $('#txtTelefono').on('keyup', function() {
            $('#result-username');
     
            var username = $(this).val();		
            var dataString = 'txtTelefono='+username;
     
            $.ajax({
                type: "POST",
                url: "ComprobarCli.php",
                data: dataString,
                success: function(data) {
                    $('#result-username').fadeIn(1000).html(data);
                }
            });
        });              
    });    
    </script>

</head>

<header>
    <?php include ("menu.php");?>
</header>

<body>

    </br>
    <h2 align="center">Creando nuevo Cliente</h2>
    </br>
    <div align="center">
        
        <form class="clientes" action='crearcliente.php' method='POST'><div class="clientes2">
            </br>
            
            
            <div class="form-group" align="center">
                <div class="form-group col-md-4" align="center">
                    <label for="name">Número de Teléfono</label>
                    <input type='text' id='txtTelefono' name='txtTelefono' style='text-align:center' placeholder='00000000' required class='form-control input-text' maxlength='8' inputmode='numeric' pattern='[0-9]*' >
                    <div id="result-username"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type='text' class='form-control' id='txtNombre' name='txtNombre' placeholder='Nombre' required>
                
                </div>

                <div class="form-group col-md-6">
                <label for="inputPassword4">Apellidos</label>
                <input type='text' class='form-control' id='txtApellido' name='txtApellido' placeholder='Apellidos' required>
                
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Dirección</label>
                <textarea required class='form-control' id='txtDireccion' name='txtDireccion' rows='3' placeholder='Escriba la dirección...' ></textarea>
                
            </div>
            <div class="form-group">
                <label for="inputAddress">Punto de Referencia</label>
                <textarea class='form-control' id='txtPuntoReferencia' name='txtPuntoReferencia' rows='3' placeholder='Escriba punto de referencia...'></textarea>
                
            </div>
            <div class="form-group">
                <label for="inputAddress">Observaciones</label>
                <textarea class="form-control" id="txtObservaciones" name="txtObservaciones" rows="3" placeholder="Observaciones..." ></textarea>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    
                </div>
                <div class="form-group col-md-2">
                    <h5>Tipo de cliente</h5>
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="comboTipoCliente" id="comboTipoCliente">
                        <option>Normal</option>
                        <option>Delicado</option>
                        <option>Rojo</option>
                        
                    </select>
                </div> 
                                             
                <div class="form-group col-md-5">
                    
                </div>
                
            </div>
            </br>
            <div class="form-row">
                <div class="form-group col-md-5">
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-success">Crear Nuevo Cliente</button>
                </div>
                <div class="form-group col-md-7">
                </div>
                
            </div>
            
            
        </form>
    </div>


</body>

</HTML>