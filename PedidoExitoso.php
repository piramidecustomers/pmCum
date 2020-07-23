<?php
        include('Sesion.php');
        $idPedido = $_GET["idPedido"];
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Éxitoso</title>
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
    
    <br> <br>
    <h2 align="center">Pedido realizado con éxito.</h2>
    <br><br><br><br>

    <div align="center" class = "clientes">
        
        <br>
        <div class="container">
            <h4>Acciones</h4><br>
            <div class="row">
                <div class="col-sm">
                
                    <form action="Inicio.php" method="POST">
                        <button type="submit" class="btn btn-info"><< Continuar Búsqueda de Clientes</button>
                        <input type='hidden' id="jhlki" name="jhlki" value="0">
                    </form>
                </div>

                <div class="col-sm">
                
                    <form action="ListadoPedidos.php">
                        <button type="submit" class="btn btn-warning">Listado de Pedidos</button>
                        
                    </form>
                </div>
                
                <div class="col-sm">
                    <form action="ReportePedido.php" method="POST" target="_blank">
                        <button type="submit" class="btn btn-success">Generar Orden de Pedido >></button>
                        <input type='hidden' id="idPedido" name="idPedido" value="<?php echo $idPedido; ?>">
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <br>
    </div>
</body>
</html>