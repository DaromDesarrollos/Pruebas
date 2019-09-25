<?php
		//include '../../config/TNS.php'; 
		
		
		$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	
		$sqlemp = "select codigo, descrip from cos_permisos";
		$stmt = oci_parse($conexion, $sqlemp);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		// Inicio las variables
		$codigo_permisos=array();
		$descip_permisos=array(); 
		$contador_permisos=0;
		$i=0;
		if( $ok == true ){

			if( $obj = oci_fetch_object($stmt) ){
			
			
			
			do
				{	
					$codigo_permisos[$i]=$obj->CODIGO;
					$descip_permisos[$i]=$obj->DESCRIP;
					$i++;
				} while( $obj = oci_fetch_object($stmt) );
				$contador_permisos=$i;
			}
		}

//echo $codigo_permisos[$i];

?>