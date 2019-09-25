<?php 

//include '../../config/TNS.php';
//include 'define.php';
		
	//prueba -----------------------------
	/*session_start();
	$_SESSION['usuario'] = "SAIKO";
	$_SESSION['pass'] = "pen";
	$nrousr="";
*/	
	$codigo_cliente=$_SESSION['codigo_cliente'];
	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}


		$sql = "SELECT CODIGO, DESCRIP FROM COS_ITEM WHERE CLIENTE='$codigo_cliente'";
				
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_rubro;
		
		if( $ok == true )
		{
			/* Mostrar los datos. Lo hacemos de este modo puesto que no es posible obtener el número de
			   registros sin antes haber accedido a los datos mediante las funciones 'oci_fetch_*'):
				*/
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$codigo_rubro[$i] =  $obj->CODIGO;
						$descripcion_rubro[$i] =  utf8_decode($obj->DESCRIP);
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_rubro=$i;
				}
		}
		
/*		for($i=0; $i<$contador_usr;$i++){
	echo $codigo[$i].'-'.$descripcion[$i].'-'.$domicilio[$i].'-'.$telefono[$i].'-'.$email[$i].'-'.$pass[$i].'-'.$permisos[$i].'<br>';
		}*/
			
	
	//oci_commit($conexion);
//oci_free_statement($stmt);
//oci_close($conexion); //CERRAMOS CONEXION
	
	
?>