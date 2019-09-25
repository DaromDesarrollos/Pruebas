
<?php
include '../../config/TNS.php'; 
session_start();

$item=$_REQUEST['item'];
$rubro=$_REQUEST['rubro'];
$descrip=$_REQUEST['descrip'];
$importe=$_REQUEST['importe'];
$codigo_cliente=$_SESSION['codigo_cliente'];
		
$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}


$sql = " UPDATE COS_PRESUPUESTO SET IMPORTE='$importe', DESCRIP='$descrip' 
		WHERE CLIENTE='$codigo_cliente' AND ITEM='$item' AND RUBRO='$rubro'";
			
$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");


if(oci_execute($stmt)){

	echo "<script>alert('Registro Actualizado'); document.location.href='../../main.php?modulo=Presupuesto_item&item=$item';</script>";
	//echo 'echo';
	}else {

	echo "<script>alert('Error al Actualizar registro'); document.location.href='../../main.php?modulo=Presupuesto_item&item=$item';</script>";
	echo 'no echo';

	}

?>