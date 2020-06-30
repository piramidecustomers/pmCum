<HTML>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<head>
<title>Inicio</title>
<link rel="stylesheet" type="text/css" href="css/styleInicio.css">
</head>

<header>
    <?php include ("menu.php");?>
</header>

<body>
    
    <?php
        session_start();
        

        if(!strcmp($_SESSION["w3xS[:Y8hM"], "p5B8]K5v-]a2)B+z)") && !strcmp($_SESSION["IloUxS[]{}Y8jJ"], "A57iLo0{}}[]{Ll78"))
        { 
            //echo $_SESSION["/78usioILKJ[[]][O"]; jhlki
            
            $telefono= $_POST["jhlki"];
            $restaurante = $_SESSION["/78usioILKJ[[]][O"];
            $restaurante = ($restaurante/3908) - 8989;

            $server="localhost";
            $user="root";
            $pass="catolica";
            $bd="piramide_customers";

            $conexion = mysqli_connect($server, $user, $pass, $bd) or die ("Error en la conexion");

            $query = "SELECT idCliente, Nombres, Apellidos, Telefono, Direccion, puntoReferencia, observaciones, idTipoCliente FROM Clientes WHERE Telefono = '$telefono' AND idRestaurante=$restaurante";

            mysqli_set_charset($conexion, "utf8");

            $resultado = mysqli_query($conexion, $query) or die('Contacte al administrador'); 
                
        }
        else {
            header('Location: index.php');
        }
    ?>
    </br>
    <h2 align="center">Registro de Clientes</h2>
    </br>
    <div align="center">
        <form class="padre" action='Inicio.php' method='POST'>
            <div class="form-group row">
                <label for="telbusqueda" class="col-sm-4 col-form-label">Número de Teléfono</label>
                <div class="col-sm-4">
                    <input type="number" id="jhlki" name="jhlki" style="text-align:center" placeholder="00000000" class="form-control input-text" maxlength="8" inputmode="numeric" pattern="[0-9]*">
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="submit" value="Buscar" class="btn btn-success">
                    <a class="btn btn-success" href="Crear_Cli.php">Crear nuevo</a>
                </div>
            </div>
        </form>

        <form class="clientes"><div class="clientes2">
            </br>
            <?php if ($line = mysqli_fetch_array($resultado, MYSQLI_BOTH)){ ?>

            <h4 style="text-align:center">Editar Información del cliente</h4>
            </br>
            <div class="form-group" align="center">
                <div class="form-group col-md-4" align="center">
                
                <?php  
                    
                        echo "<label for='name'>Número de Teléfono</label>";
                        echo "<input type='text' id='lblNombre' name='lblNombre' style='text-align:center' placeholder='00000000' require class='form-control input-text' maxlength='8' inputmode='numeric' pattern='[0-9]*' value='$line[3]'>";
                    
                    ?>
                
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <?php 
                    echo "<input type='text' class='form-control' id='lblNombre' name='lblNombre' placeholder='Nombre' value='$line[1]'>";
                ?>
                </div>

                <div class="form-group col-md-6">
                <label for="inputPassword4">Apellidos</label>
                <?php 
                    echo "<input type='text' class='form-control' id='lblApellido' name='lblApellido' placeholder='Apellidos' value='$line[2]'>";
                ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Dirección</label>
                <?php 
                   echo "<textarea require class='form-control' id='lblDireccion' name='lblDireccion' rows='3' placeholder='Escriba la dirección...' >$line[4]</textarea>";
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
                                echo "<option>Problemático</option>";
                                echo "<option>Rojo</option>";
                            } 
                            if ($line[7]==2) {
                                echo "<option>Normal</option>";
                                echo "<option selected='selected'>Problemático</option>";
                                echo "<option>Rojo</option>";
                            }
                            if ($line[7]==3){
                                echo "<option>Normal</option>";
                                echo "<option>Problemático</option>";
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
                <div class="form-group col-md-5">
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-warning">Actualizar Cliente</button>
                </div>
                <div class="form-group col-md-7">
                </div>
                
            </div>
            <?php 
                        }
                        else {
                            echo "<div class='form-group'><h5 align='center'>No se ha encontrado ese número de teléfono.</h5</div>";                
                        }
                        $close = mysqli_close($conexion) or die("Error en la desconexion");
                    ?> 
            
            </form>
    </div>

</body>

</HTML>