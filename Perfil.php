<?php
    include('Sesion.php');
    include('Conexion.php');

    $query = "SELECT Nombre, Apellido FROM usuariospiramide WHERE usuario = '$usuario';";

    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 

    if ($line = mysqli_fetch_array($resultado, MYSQLI_BOTH)){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pérfil</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/stylePedido.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<header>
    <?php include ("menu.php");?>
</header>

<body>
<br><br>
    <h4 style="text-align:center; color: #FFFFFF;">Mi Pérfil</h4><br><br>

    <div align="center" class="clientes">
        <br>
        
        <form action="GuardarPerfil.php" method="POST" >           
            <br><br>
            
            <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-5">
                    <label for="Cliente">Nombres:</label>
                    <input type="text" class="form-control" style="text-align:center" id="txtNombres" required name="txtNombres" value="<?php echo $line[0]; ?>">
                </div>

                <div class="form-group col-md-5">
                    <label for="Cliente">Apellidos:</label>
                    <input type="text" class="form-control" style="text-align:center" id="txtApellidos" required name="txtApellidos" value="<?php echo $line[1]; ?>" >
                </div>

            </div><br>

            <div class="form-row">
                <div class="form-group col-md-4"></div>
                
                <div class="form-group col-md-4">
                    <label for="Cliente">Nueva Password:</label>
                    <input type="password" class="form-control" style="text-align:center" id="txtPassword" minlength="8" name="txtPassword" value="" placeholder="***********" >
                </div>
            </div><br>

            
            <div class="form-row">
                <div class="form-group col-md-5"></div>

                <div class="form-group col-md-2" >
                    <button type="submit" class="btn btn-success">Guardar</button>
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