<?php 
include '../../config/TNS.php'; 
include '../../config/fecha.php'; 
session_start();
/*
$item=$_REQUEST['item'];
$rubro=$_REQUEST['rubro'];
$fecha=$_REQUEST['fecha'];
//echo $fecha;
$fecha_ok=fecha1($fecha);
$descrip=$_REQUEST['descrip'];
$importe=$_REQUEST['importe'];
$renglon=$_REQUEST['renglon'];
*/

$codigo_cliente=$_SESSION['codigo_cliente'];
$item = $_SESSION['item_presupuesto'];
//------------------------------------------

//$item=$_REQUEST['item'];<------------
$rubro=$_REQUEST['codigo'];
$fecha=$_REQUEST['fecha'];
//echo $fecha;
$fecha_ok=fecha1($fecha);
$descrip=$_REQUEST['descrip'];
$importe=$_REQUEST['importe'];
$renglon=$_REQUEST['renglon'];



/*codigo=<?php echo $rubro_gasto[$i];?>&fecha=<?php echo $fecha_gasto[$i];?>&renglon=<?php echo $renglon_gasto[$i];?>&descrip=<?php echo $descripcion_gasto[$i];?>&importe=<?php echo $importe_gasto[$i];
*/



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


$sql = "DELETE FROM COS_GASTOS WHERE CLIENTE='$codigo_cliente' AND ITEM='$item' AND RUBRO='$rubro' AND FECHA='$fecha_ok' AND RENGLON='$renglon'";			

		
$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");


if(oci_execute($stmt)){

	echo "<script>alert('Registro Eliminado'); document.location.href='../../main.php?modulo=gasto_item&item=$item';</script>";
	//echo 'echo';
	}else {

	echo "<script>alert('Error al Eliminar registro'); document.location.href='../../main.php?modulo=gasto_item&item=$item';</script>";
	//echo 'no echo';

}











/*
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

	*/
?>