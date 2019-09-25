<?php
/*
if(empty($usuario) || empty($pass)){
	header("Location: ../index.php");
	exit();
}*/

$usuario = $_POST['nombre'];
$pass = $_POST['password'];


echo $usuario.'-'.$pass;

include '../config/TNS.php'; 

	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	if (!$conexion)
	{
	//$n=oci_error();
	echo "<script>alert('Usuario o Contraseña Invalido! '); history.back()</script>";
	
	}
	else 
	{
		// compruebo usuario = cliente 
		
		$sql = "select codigo, descrip, pass, permisos from cos_clientes";

		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_clientes=0;
		// Inicio las variables
		$codigo_cliente=array(); 
		$descrip_cliente=array();
		$pass_cliente = array(); 
		$permisos_cliente = array(); 
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$codigo_cliente[$i] =  $obj->CODIGO;
						$descrip_cliente[$i] =  $obj->DESCRIP;
						$pass_cliente[$i] =  $obj->PASS;
						$permisos_cliente[$i] =  $obj->PERMISOS; 
		
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_clientes=$i;
				}
		}
		
		for($i=0; $i<$contador_clientes;$i++){
			
			if($descrip_cliente[$i] == $usuario && $pass_cliente[$i] == $pass){
				
				session_start();
				$_SESSION['usuario'] = $usuario;
				$_SESSION['pass'] = $pass;
				$_SESSION['codigo_cliente']=$codigo_cliente[$i];
				$_SESSION['permisos']=$permisos_cliente[$i];

			}
		}
	}

	if(!isset($_SESSION['usuario'])){
		echo "<script>alert('Usuario o Pass Incorrecto'); document.location.href='login.php';</script>";
	}else{
		header("Location: ../main.php?modulo=Inicio");
	}

?>