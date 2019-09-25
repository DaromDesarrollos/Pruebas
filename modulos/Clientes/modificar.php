
<?php
include '../../config/TNS.php'; 

$codigo=$_REQUEST['codigo'];
$descrip=$_REQUEST['descrip'];
$domicilio=$_REQUEST['domicilio'];
$telefono=$_REQUEST['telefono'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$permisos=$_REQUEST['permisos'];	
	
		
$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}


$sql = " UPDATE COS_CLIENTES SET DESCRIP='$descrip', DOMICILIO='$domicilio', TELEFONO='$telefono', EMAIL='$email', PASS='$pass', PERMISOS='$permisos' WHERE CODIGO='$codigo'";
			
$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");


if(oci_execute($stmt)){

	echo "<script>alert('Registro Actualizado'); document.location.href='../../main.php?modulo=Clientes';</script>";
	//echo 'echo';
	}else {

	echo "<script>alert('Error al Actualizar registro'); document.location.href='../../main.php?modulo=Clientes';</script>";
	//echo 'no echo';

	}

?>