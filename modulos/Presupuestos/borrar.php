<?php 

$codigo_rubro=$_REQUEST['codigo'];

session_start();
$codigo_cliente=$_SESSION['codigo_cliente'];
$item_presupuesto=$_SESSION['item_presupuesto'];

include '../../config/TNS.php'; 
		
$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}

			
$sql = "DELETE FROM COS_PRESUPUESTO WHERE CLIENTE='$codigo_cliente' AND ITEM='$item_presupuesto' AND RUBRO = '$codigo_rubro'";
				
$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");


if(oci_execute($stmt)){

	echo "<script>alert('Registro Eliminado'); document.location.href='../../main.php?modulo=Presupuesto_item&item=$item_presupuesto';</script>";
	//echo 'echo';
	}else {

	echo "<script>alert('Error al Eliminar registro'); document.location.href='../../main.php?modulo=Presupuesto_item&item=$item_presupuesto';</script>";
	//echo 'no echo';

}

	
?>