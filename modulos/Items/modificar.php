
<?php
include '../../config/TNS.php'; 
session_start();
$codigo=$_REQUEST['codigo'];
$descrip=$_REQUEST['descrip'];
$domicilio=$_REQUEST['domicilio'];
$codigo_cliente=$_SESSION['codigo_cliente'];
	
		
$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}


$sql = " UPDATE COS_ITEM SET DESCRIP='$descrip', DOMICILIO='$domicilio' WHERE CODIGO='$codigo' AND CLIENTE='$codigo_cliente'";
			
$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");


if(oci_execute($stmt)){

	echo "<script>alert('Registro Actualizado'); document.location.href='../../main.php?modulo=Items';</script>";
	//echo 'echo';
	}else {

	echo "<script>alert('Error al Actualizar registro'); document.location.href='../../main.php?modulo=Items';</script>";
	echo 'no echo';

	}

?>