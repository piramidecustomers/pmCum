<?php
    include('Sesion.php');
    $guardado =  $_GET["guardado"];
    ?>

<HTML>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<head>
<title>Cliente Creado</title>
<link rel="stylesheet" type="text/css" href="css/styleInicio.css">
</head>

<header>
    <?php include ("menu.php");?>
</header>

<body>

    </br></br></br></br>
    <div align="center">
        <form class="padre" action='Inicio.php' method='POST'>
            <div class="form-group row">
                <label for="telbusqueda" class="col-sm-4 col-form-label">Número de Teléfono a consultar</label>
                <div class="col-sm-4">
                    <input type="number" id="jhlki" name="jhlki" value="<?php echo $guardado; ?>" readonly style="text-align:center" >
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="submit" value="Continuar" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</body>

</HTML>
