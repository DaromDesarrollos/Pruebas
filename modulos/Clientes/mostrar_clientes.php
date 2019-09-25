<?php 

//include '../../config/TNS.php';
//include 'define.php';
		
	//prueba -----------------------------
	/*session_start();
	$_SESSION['usuario'] = "SAIKO";
	$_SESSION['pass'] = "pen";
	$nrousr="";
*/
	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}


		$sql = "SELECT CL.CODIGO, CL.DESCRIP, CL.DOMICILIO, CL.TELEFONO, CL.EMAIL, CL.PASS, CP.DESCRIP PERMISO  FROM COS_CLIENTES CL 
INNER JOIN COS_PERMISOS CP ON (CL.PERMISOS=CP.CODIGO)";
				
		$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_usr;
		
		if( $ok == true )
		{
			/* Mostrar los datos. Lo hacemos de este modo puesto que no es posible obtener el número de
			   registros sin antes haber accedido a los datos mediante las funciones 'oci_fetch_*'):
				*/
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$codigo[$i] =  $obj->CODIGO;
						$descripcion[$i] =  $obj->DESCRIP;
						$domicilio[$i] =  $obj->DOMICILIO;
						$telefono[$i] =  $obj->TELEFONO;
						$email[$i] =  $obj->EMAIL; 
						$pass[$i] =  $obj->PASS;
						$permisos[$i] =  $obj->PERMISO;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_usr=$i;
				}
		}
		
/*		for($i=0; $i<$contador_usr;$i++){
	echo $codigo[$i].'-'.$descripcion[$i].'-'.$domicilio[$i].'-'.$telefono[$i].'-'.$email[$i].'-'.$pass[$i].'-'.$permisos[$i].'<br>';
		}*/
			
	
	//oci_commit($conexion);
//oci_free_statement($stmt);
//oci_close($conexion); //CERRAMOS CONEXION
	
	
?>