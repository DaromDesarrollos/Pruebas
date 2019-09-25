<?php 
//session_start;

include '../../config/TNS.php'; 
include '../../config/fecha.php'; 

$codigo_rubro=$_REQUEST['codigo'];
$codigo_cliente=$_REQUEST['cliente'];
$item_gasto_buscar=$_REQUEST['item'];
$fecha_gasto_buscar=$_REQUEST['fecha'];

session_start();
$_SESSION['item_gasto_buscar']=$item_gasto_buscar;

//echo $codigo_rubro.$codigo_cliente.$item_gasto_buscar;
 

//header("Location: ../../main.php?modulo=gasto_buscar_2&codigo=$codigo_rubro");
		
	
	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	//$rubro_correcto = 0;

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}
			
		$sql="SELECT FECHA FROM COS_GASTOS WHERE CLIENTE='$codigo_cliente' AND ITEM ='$item_gasto_buscar' AND RUBRO='$codigo_rubro' ";		
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_200;
		$fecha_correcta=0;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$fecha_gasto[$i] =  $obj->FECHA;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_200=$i;
				}
		}

		for($i=0; $i<$contador_200; $i++){
			if($fecha_gasto[$i] == $fecha_gasto_buscar){
				$fecha_correcta=1;
				//echo 'el rubro es correcto';
			}else{
				//echo 'el rubro es incorrecto';	
			}
		}
		echo '<br>'.$fecha_correcta;
		
		if($fecha_correcta == 0){
			//echo 'error';
			echo "<script>alert('Error en la seleccion'); document.location.href='../../main.php?modulo=gasto_buscar_2&item=$item_gasto_buscar&codigo=$codigo_rubro';</script>";
		}else{
			
			//echo 'vas bien';	
			header("Location: ../../main.php?modulo=gasto_buscar_3&item=$item_gasto_buscar&codigo=$codigo_rubro&fecha=$fecha_gasto_buscar");
		}
		

?>