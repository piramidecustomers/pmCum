<?php 

    include('Conexion.php');
    include('Sesion.php');

sleep(1);
if (isset($_POST)) {
    $username = (string)$_POST['txtTelefono'];
    $tel = (string)$_POST['txtTelefono'];
 
    $result = $conexion->query(
        'SELECT * FROM clientes WHERE telefono = "'.strtolower($username).'" AND idRestaurante =' .$restaurante.''
    );
 
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger"><strong>¡Oh no!</strong> Ese número de télefono, ya ha sido guardado.';?>
                <a href='Continuar.php?guardado=<?php echo $tel ?>'>Ver cliente...</a></div> <?php
    } else {
        //echo '<div class="alert alert-success"><strong>Bien!</strong></div>';
    }
}

?>

