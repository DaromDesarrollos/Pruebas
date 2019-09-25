<?php
session_start();
if(isset($_SESSION['usuario'])){
		header("Location: ../main.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fresca" rel="stylesheet">
	<link href="../img/favicon.png" rel="icon" type="image/png">
</head>
<body>
	<div class="container">
		<div class="contenedor">
        	<div class="navbar-template text-center">
                    
            	<h2 align="center">Bollati Y Asociados SRL.</h2>
                <h3 align="center"> <strong>COSTOS Web-Service </strong></h3>
                <h4 align="center"> Version 1.0</h4>
                  
				<div>
                <center>
                    <table style="text-align:center;">
                    <form method="POST" action="validar.php">
                        <tr>
                            <td style=" padding:5px; color:#000;">
                            <input type="text" name="nombre" placeholder="Usuario" required />
                            </td>
                        </tr>
                        <tr>
                            <td style=" padding:5px; color:#000;">
                            <input type="password" name="password" placeholder="Contraseña" required />
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center; padding:5px;">
                            <button type="submit" class="btn btn-danger btn-md" id="btn_login">Inicar Sesion &nbsp&nbsp&nbsp <img src="../img/loading.gif" width="20%"></button>
                            </td>
                        </tr>
                    </form>
                        
                    </table>
                </center>
            	</div>                  
			</div>
		</div><!-- /.contenedor -->
	</div><!-- /.container -->
</body>
</html>
