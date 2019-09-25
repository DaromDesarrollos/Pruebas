<?php
include '../../config/TNS.php';
session_start();
$codigo_cliente=$_SESSION['codigo_cliente'];
$codigoitem = $_REQUEST['codigoitem'];
//echo $codigoitem.'<br>';
//echo $codigo_cliente;


$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

		if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se ha podido conectar';
			return '';
			exit;
		}

$sql = "SELECT CODIGO, DESCRIP FROM COS_ITEM WHERE CLIENTE='$codigo_cliente'";
				
	$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
	$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
	$i=0;
	$contador_item;
	$item_ok=0;
	$descrip_item_ver='';

	if( $ok == true )
	{
		if( $obj = oci_fetch_object($stmt) ){
			do
				{	
					$cod[$i] = $obj->CODIGO;
					$descrip[$i] =  utf8_decode($obj->DESCRIP);
					//echo $cod[$i].'-'.$descrip[$i].'<br>';
					$i++;

				} while( $obj = oci_fetch_object($stmt) );
				$contador_item=$i;
			}
	}
		
for($i=0; $i<$contador_item;$i++){
	//echo $cod[$i].'<br>'; //.'-'.$descrip[$i].'<br>';
	
	if($codigoitem == $cod[$i]){
		$item_ok=1;
		//echo $item_ok;
		$descrip_item_ver = $descrip[$i];
		$_SESSION['item_presupuesto']=$codigoitem;
		$_SESSION['item_descrip_presupuesto']=$descrip[$i];
	}
		
}
if ($item_ok==1){
	
	echo "<script> /*alert('Registro Insertado');*/ document.location.href='../../main.php?modulo=Presupuesto_item&item=$codigoitem&descrip_item=$descrip_item_ver';</script>";
	//	echo 'echo';
}else {

	echo "<script>alert('Error en el Item seleccionado'); document.location.href='../../main.php?modulo=Presupuestos';</script>";
	//	echo 'no echo';
}


?>