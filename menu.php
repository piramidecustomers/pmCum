<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/styleNavMenu.css" />
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="images/logo.png" class="logo">
    <a class="navbar-brand" href="#">&nbsp <?php echo $restauranteOnline; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </li>
        <li class="nav-item active">
            <a class="nav-link" href="MenuN.php">Menú Principal <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Inicio.php">Buscar Cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Crear_Cli.php">Crear Cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ListadoClientes.php">Listado Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ListadoPedidos.php">Listado Pedidos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href=""></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=""></a>
        </li>
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario: <?php echo $usuario; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="Perfil.php">Editar Pérfil</a>
          <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
        </div>
      </li>
        
        </ul>
    </div>
    </nav>
</body>
</html>