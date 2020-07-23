
<html> 
<head>
    <title> Login Tony Roma´s </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">   
</head>
    <body>

    <?php
        echo "<form id='frmPersona' action='anti_inyeccion.php' method='POST'>";
	?>

    <div class="login-box">
    <img src="images/logoPiramide.jpeg" class="avatar">
        <h1>Login - Piramide Customers</h1>
            <form>
            <p>User</p>
            <input type="text" name='usu' id='usu' placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name='contra' id='contra' placeholder="Enter Password">
            </br></br>
            <input type="submit" name="submit" value="Login">   
            </form>
        
        
        </div>
    
    </body>
</html>