
<?php
include '../../config/TNS.php'; 
include '../../config/fecha.php'; 
session_start();

$item=$_REQUEST['item'];
$rubro=$_REQUEST['rubro'];
$fecha=$_REQUEST['fecha'];
//echo $fecha;
$fecha_ok=fecha1($fecha);
$descrip=$_REQUEST['descrip'];
$importe=$_REQUEST['importe'];
$renglon=$_REQUEST['renglon'];

$codigo_cliente=$_SESSION['codigo_cliente'];
/*
echo '<br>cliente'.$codigo_cliente.'<br>Item:'.$item.'<br>rubro'.$rubro.'<br>fecha'.$fecha_ok.'<br>renglon'.$renglon.
'<br>desc'.$descrip.'<br>importe'.$importe;
*/
		
$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}

		
$sql="UPDATE COS_GASTOS SET IMPORTE = '$importe', DESCRIPCION = '$descrip' WHERE CLIENTE='$codigo_cliente' AND ITEM='$item' AND RUBRO='$rubro' AND FECHA='$fecha_ok' AND RENGLON='$renglon'";			

$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");


if(oci_execute($stmt)){

	echo "<script>alert('Registro Actualizado'); document.location.href='../../main.php?modulo=gasto_item&item=$item';</script>";
	
	//echo '<br>echo';
	
	oci_commit($conexion);
	}else {

	echo "<script>alert('Error al Actualizar registro'); document.location.href='../../main.php?modulo=gasto_item&item=$item';</script>";
	//echo 'no echo';

	}

?>