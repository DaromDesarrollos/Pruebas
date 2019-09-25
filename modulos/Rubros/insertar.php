<?php 
include '../../config/TNS.php'; 
session_start();
//$codigo=$_POST['codigo'];
$descrip=$_POST['descrip'];
$codigo=$_POST['codigo'];
$codigo_cliente=$_SESSION['codigo_cliente'];		

$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}


$sql = "select * from cos_rubro";

	$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
	$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
	$i=0;
	$contador_rubro_;
	$existe=0;
	if( $ok == true ){
		if( $obj = oci_fetch_object($stmt) ){

			do{	
				$codigo_rubro_[$i] =  $obj->CODIGO;
				$i++;
					
			} while( $obj = oci_fetch_object($stmt) );
				$contador_rubro_=$i;
		}
	}


	for($i=0; $i<$contador_rubro_;$i++){
		if($codigo_rubro_[$i]==$codigo){
		
			$existe=1;			
			
		}
	}
	
	if($existe==0){
		
		$sql = "INSERT INTO COS_RUBRO (CODIGO, DESCRIP, CLIENTE) 
				VALUES('$codigo', '$descrip', '$codigo_cliente')";
				
		$stmt = oci_parse($conexion, $sql);	

		if(oci_execute($stmt)){

			echo "<script>alert('Registro Insertado'); document.location.href='../../main.php?modulo=Rubros';</script>";
		//echo 'echo';
		}else {

			echo "<script>alert('Error al Insertar registro'); document.location.href='../../main.php?modulo=Rubros';</script>";
		//echo 'no echo';

		}
	}else {
		
		echo "<script>alert('Error al Insertar registro, El codigo ya esta en uso'); document.location.href='../../main.php?modulo=Rubros';</script>";
	}
			
			
			
		
?>