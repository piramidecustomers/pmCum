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
                
            }
            else {
                header('Location: index.php');
            }
        ?>
        </br></br></br></br></br></br></br></br></br></br>
    <form align="center" action='Inicio.php' method='POST'>
        <input type="submit" name="submit" value="Busqueda de Clientes" class="btn btn-warning">
        <input type='hidden' id="jhlki" name="jhlki" value="0">
    </form>

    <form align="center" action='Crear_Cli.php' method='POST'>
        <input type="submit" name="submit" value="Crear nuevo Cliente" class="btn btn-success">
        <input type='hidden' id="anterior" name="anterior" value="MenuN.php">
    </form>

</body>

</HTML>