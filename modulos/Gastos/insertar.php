<?php 
include '../../config/TNS.php'; 
include '../../config/fecha.php'; 
session_start();

$descrip=$_POST['descrip'];
$codigo_rubro=$_POST['codigo_rubro'];
$importe=$_POST['importe'];
$fecha=$_POST['fecha'];
$fecha_ok=fecha($fecha);


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
	
	//---- encuentro el maximo renglon

$sql = "SELECT MAX(RENGLON) RENGLON FROM COS_GASTOS WHERE RUBRO='$codigo_rubro' AND CLIENTE='$codigo_cliente' AND ITEM='$item_presupuesto' AND FECHA='$fecha_ok'";

	$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
	$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
	$i=0;
	$max_renglon='';;
	$existe=0;
	if( $ok == true ){
		if( $obj = oci_fetch_object($stmt) ){
			do{	
				$max_renglon =  $obj->RENGLON;
				$i++;
					
			} while( $obj = oci_fetch_object($stmt) );
		}
	}
	
	if($max_renglon==NULL){
		
		$max_renglon = 1;		
		
	}else{
	
		$max_renglon++;
			
	}
//echo '<br> el maximo renglon es:'.$max_renglon;

	// inserto gasto

//echo '<br>RUBRO='.$codigo_rubro.'<br>AND CLIENTE='.$codigo_cliente.'<br> AND ITEM='.$item_presupuesto.'<br> AND FECHA='.$fecha_ok.'<br> AND descripcion='.$descrip;
	
	$sql = "INSERT INTO COS_GASTOS (CLIENTE, ITEM, RUBRO, FECHA, RENGLON, IMPORTE, DESCRIPCION) VALUES ('$codigo_cliente', '$item_presupuesto', '$codigo_rubro', '$fecha_ok', '$max_renglon', '$importe', '$descrip')";
				
		$stmt = oci_parse($conexion, $sql);	

		if(oci_execute($stmt)){

			echo "<script>alert('Registro Insertado'); document.location.href='../../main.php?modulo=gasto_item&item=$item_presupuesto';</script>";
		//echo 'echo';
		}else {

			echo "<script>alert('Error al Insertar registro'); document.location.href='../../main.php?modulo=gastos_item&item=$item_presupuesto';</script>";
		//echo 'no echo';

		}
	
	
?>