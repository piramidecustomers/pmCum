<?php
    include('Sesion.php');
    ?>

<!DOCTYPE html>
<html lang="es"> 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<head>
    <title>Listado Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/styleListadoClientes.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <?php include ("menu.php");?>
    
    
</head>

<header>
    
</header>

<body>
    
    </br>
    <div class="Titulo">
        <h2 align="center"><strong>Listado de Clientes</strong></h2>
    </div>
    <div class="Contenido" align="center">
        </br></br>
        
        <div class="search">
            <label for="caja_busqueda" style="color:#FFFFFF; font-size:20px;">Buscar:</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda" style="text-align:center;" placeholder="Ej. Juan, Pérez, Soyapango, 00000000, etc." class="form-control input-text"></input>
        </div></br>

        <div id="datos">

        </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
</body>

</html>

