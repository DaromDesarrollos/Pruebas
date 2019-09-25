<?php 

$codigo=$_REQUEST['codigo'];
//echo $codigo;
header("Location: ../../main.php?modulo=item_editar&codigo=$codigo");


/*
include '../../config/TNS.php'; 

//$codigo=$_POST['codigo'];
$descrip=$_POST['descrip'];
$domicilio=$_POST['domicilio'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$permisos=$_POST['permisos'];
		

$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

	if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;
	}


$sql = " SELECT MAX(CODIGO) CODIGOMAXIMO FROM COS_CLIENTES";

$stmt = oci_parse($conexion, $sql);
$codigomaximo= 0;
$b=0;

if(oci_execute($stmt)){
	//if ($obj = oci_fetch_object($stmt)) 
	while (($obj = oci_fetch_object($stmt)) != false){
				$codigomaximo= $obj->CODIGOMAXIMO;
				$b++;
	}  
}else {	//$numero=1;
				//echo "<p>No se HAN encontraron Resultados</p>";
}
			
		if($b==0){
			$codigo=1;
		}else{
			$codigo=$codigomaximo+1;	
		}
			
$sql = "INSERT INTO COS_CLIENTES (CODIGO, DESCRIP, DOMICILIO, TELEFONO, EMAIL, PASS, PERMISOS) VALUES('$codigo', '$descrip', '$domicilio', '$telefono', '$email', '$pass', '$permisos')";
				
$stmt = oci_parse($conexion, $sql);	//or die(include "servidorcaido.html");

if(oci_execute($stmt)){

	echo "<script>alert('Registro Insertado'); document.location.href='../../main.php?modulo=Clientes';</script>";
	//echo 'echo';
	}else {

	echo "<script>alert('Error al Insertar registro'); document.location.href='../../main.php?modulo=Clientes';</script>";
	//echo 'no echo';

	}
*/	
?>