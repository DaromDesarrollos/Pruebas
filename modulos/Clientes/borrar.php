<?php 

$codigo=$_REQUEST['codigo'];

include '../../config/TNS.php'; 
		
$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}

			
$sql = "DELETE FROM COS_CLIENTES WHERE CODIGO='$codigo'";
				
$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");


if(oci_execute($stmt)){

	echo "<script>alert('Registro Eliminado'); document.location.href='../../main.php?modulo=Clientes';</script>";
	//echo 'echo';
	}else {

	echo "<script>alert('Error al Eliminar registro'); document.location.href='../../main.php?modulo=Clientes';</script>";
	//echo 'no echo';

}

	
?>