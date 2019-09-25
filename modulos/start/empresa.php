<?php
		//include '../../config/TNS.php'; 
		
		
		$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	
		$sqlemp = "select descrip, nombre, domicilio, localidad, provincia, cpostal, telefono, base_datos from cnt_empresa";
		$filas = 0;
		$stmt = oci_parse($conexion, $sqlemp);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia

		// Inicio las variables
		$descip=0; 
		$nombre=0; 
		$domicilio=0; 
		$localidad=0;
		$provincia=0;
		$cpostal=0;
		$telefono=0;
		$base_datos=0;

		if( $ok == true ){

			if( $obj = oci_fetch_object($stmt) ){
			
			
			
			do
				{	
					$descip =  utf8_decode($obj->DESCRIP); 
					$nombre=  utf8_decode($obj->NOMBRE);
					$domicilio=  utf8_decode($obj->DOMICILIO); 
					$localidad= $obj->LOCALIDAD;
					$provincia= $obj->PROVINCIA;
					$cpostal=$obj->CPOSTAL;
					$telefono=$obj->TELEFONO;
					$base_datos=$obj->BASE_DATOS;
				} while( $obj = oci_fetch_object($stmt) );
			}
		}

//echo $descip.'-'.$nombre;

?>