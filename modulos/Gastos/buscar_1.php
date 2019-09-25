<?php 
//session_start;

include '../../config/TNS.php'; 
include '../../config/fecha.php'; 

$codigo_rubro=$_REQUEST['codigo'];
$codigo_cliente=$_REQUEST['cliente'];
$item_gasto_buscar=$_REQUEST['item'];

session_start();
$_SESSION['item_gasto_buscar']=$item_gasto_buscar;

//echo $codigo_rubro.$codigo_cliente.$item_gasto_buscar;
 

//header("Location: ../../main.php?modulo=gasto_buscar_2&codigo=$codigo_rubro");
		
	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	$rubro_correcto = 0;
	$contador_presupuestos_=0;
	$contador_Gastos=0;

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;
			}

//echo $codigo_cliente.$item_gasto_buscar;

			
		$sql="SELECT G.RUBRO, R.DESCRIP FROM COS_GASTOS G, COS_RUBRO R WHERE R.CODIGO=G.RUBRO AND G.CLIENTE ='$codigo_cliente' AND G.ITEM = '$item_gasto_buscar' GROUP BY G.RUBRO, R.DESCRIP";		
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_100;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$rubro_gasto[$i] =  $obj->RUBRO;
						$descrip_gasto[$i]= $obj->DESCRIP;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_100=$i;
				}
		}
		
		for($i=0; $i<$contador_100; $i++){
			if($rubro_gasto[$i] == $codigo_rubro){
				$rubro_correcto=1;
				//echo 'el rubro es correcto';
			}else{
				//echo 'el rubro es incorrecto';	
			}
		}
		echo '<br>'.$rubro_correcto;
		
		if($rubro_correcto == 0){
			
			echo "<script>alert('Error en la seleccion'); document.location.href='../../main.php?modulo=gasto_buscar&item=$item_gasto_buscar';</script>";
		}else{
			
			//echo 'vas bien';	
			header("Location: ../../main.php?modulo=gasto_buscar_2&codigo=$codigo_rubro");
		}
		

?>