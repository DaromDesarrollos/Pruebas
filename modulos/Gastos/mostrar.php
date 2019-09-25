<?php 

//include '../../config/TNS.php';
//include 'define.php';
		
	//prueba -----------------------------
//	session_start();
	/*$_SESSION['usuario'] = "SAIKO";
	$_SESSION['pass'] = "pen";
	$nrousr="";
*/	

	$item_presupuesto=$_REQUEST['item'];
		
	$descrip_item_ver='';
	
	$_SESSION['item_presupuesto']=$item_presupuesto;
	
	if(isset($_REQUEST['descrip_item'])){
	$descrip_item_ver=$_REQUEST['descrip_item'];
	}
	if($descrip_item_ver==NULL){
		$descrip_item_ver=$_SESSION['item_descrip_presupuesto'];
	}
	
	$codigo_cliente=$_SESSION['codigo_cliente'];
	
	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	$item_correcto = 0;
	$contador_presupuestos_=0;
	$contador_Gastos=0;

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}

			
		$sql ="SELECT RUBRO, FECHA, RENGLON, IMPORTE, DESCRIPCION FROM COS_GASTOS WHERE CLIENTE='$codigo_cliente' AND ITEM='$item_presupuesto' ORDER BY RUBRO";
				
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_Gastos;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$rubro_gasto[$i] =  $obj->RUBRO;
						$fecha_gasto[$i] =  $obj->FECHA;
						$renglon_gasto[$i] =  $obj->RENGLON;
						$importe_gasto[$i] =  $obj->IMPORTE;
						$descripcion_gasto[$i] =  $obj->DESCRIPCION;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_Gastos=$i;
				}
		}
	
/*		for($i=0; $i<$contador_usr;$i++){
	echo $codigo[$i].'-'.$descripcion[$i].'-'.$domicilio[$i].'-'.$telefono[$i].'-'.$email[$i].'-'.$pass[$i].'-'.$permisos[$i].'<br>';
		}*/
			
	
	//oci_commit($conexion);
//oci_free_statement($stmt);
//oci_close($conexion); //CERRAMOS CONEXION
	
	
?>