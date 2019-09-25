<?php 
include '../../config/TNS.php'; 
session_start();

$descrip=$_POST['descrip'];
$codigo_rubro=$_POST['codigo_rubro'];
$importe=$_POST['importe'];

$codigo_cliente=$_SESSION['codigo_cliente'];		
$item_presupuesto=$_SESSION['item_presupuesto'];		

$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se ha podido conectar';
			return '';
			exit;
	}

//------------------ comprobar si existe clave primaria... si no existe insertar
//clave primaria cliente - item - rubro

$sql = "select cliente, item, rubro from cos_presupuesto";

	$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
	$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
	$i=0;
	$contador_presupuesto_100;
	$existe=0;
	if( $ok == true ){
		if( $obj = oci_fetch_object($stmt) ){

			do{	
				$cliente_presupuesto_100[$i] =  $obj->CLIENTE;
				$item_presupuesto_100[$i]= $obj->ITEM;
				$rubro_presupuesto_100[$i]= $obj->RUBRO;
				
				$i++;
					
			} while( $obj = oci_fetch_object($stmt) );
				$contador_presupuesto_100=$i;
		}
	}
	for($i=0; $i<$contador_presupuesto_100;$i++){
		if($cliente_presupuesto_100[$i]==$codigo_cliente &&$item_presupuesto_100[$i]==$item_presupuesto&&$rubro_presupuesto_100[$i]==$codigo_rubro){
			$existe=1;			
		}
	}

	
	if($existe==0){
		
		$sql = "INSERT INTO COS_PRESUPUESTO (CLIENTE, ITEM, RUBRO, IMPORTE, DESCRIP) 
				VALUES('$codigo_cliente', '$item_presupuesto', '$codigo_rubro','$importe','$descrip')";
				
		$stmt = oci_parse($conexion, $sql);	

		if(oci_execute($stmt)){

			echo "<script>alert('Registro Insertado'); document.location.href='../../main.php?modulo=Presupuesto_item&item=$item_presupuesto';</script>";
		//echo 'echo';
		}else {

			echo "<script>alert('Error al Insertar registro'); document.location.href='../../main.php?modulo=Presupuesto_item&item=$item_presupuesto';</script>";
		echo 'no echo';

		}
	}else {
		
		echo "<script>alert('Error al Insertar registro, El codigo ya esta en uso'); document.location.href='../../main.php?modulo=Presupuesto_item&item=$item_presupuesto';</script>";
		echo 'no echo';
	}
			
			
			
		
?>