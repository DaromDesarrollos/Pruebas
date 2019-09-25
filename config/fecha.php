<?php
function fecha1($convertir)
{
	$fecha_aux=$convertir;
	//$fecha1 = date_create($fecha_aux);
	//$fecha11= date_format($fecha1, 'd-m-y');
	$fecha111 = explode("/",$fecha_aux); 
	$fecha_salida='';
	$fecha_salida = $fecha111[0].$fecha111[1].$fecha111[2];	
	return $fecha_salida;
}

function fecha_formato($convertir)
{
	$fecha_aux=$convertir;
	$fecha_aux= explode("-", $fecha_aux);
	$fecha_return = $fecha_aux[2] . "" . $fecha_aux[1] . "" . $fecha_aux[0];
	return $fecha_return;
}

function fecha($convertir)
{
	$fecha_aux=$convertir;
	$fecha1 = date_create($fecha_aux);
	$fecha11= date_format($fecha1, 'd-m-y');
	$fecha111 = explode("-",$fecha11); 
	$fecha_salida = array();
	switch ($fecha111[1]) {
    case '01':
        $fecha_salida = $fecha111[0].""."Ene"."".$fecha111[2];
        break;
    case '02':
        $fecha_salida = $fecha111[0].""."Feb"."".$fecha111[2];
        break;
    case '03':
        $fecha_salida = $fecha111[0].""."Mar"."".$fecha111[2];
        break;
    case '04':
        $fecha_salida = $fecha111[0].""."Abr"."".$fecha111[2];
        break;
    case '05':
        $fecha_salida = $fecha111[0].""."May"."".$fecha111[2];
        break;
    case '06':
        $fecha_salida = $fecha111[0].""."Jun"."".$fecha111[2];
        break;
    case '07':
        $fecha_salida = $fecha111[0].""."Jul"."".$fecha111[2];
        break;
    case '08':
        $fecha_salida = $fecha111[0].""."Ago"."".$fecha111[2]; 
        break;
    case '09':
        $fecha_salida = $fecha111[0].""."Sep"."".$fecha111[2];
        break;
    case '10':
        $fecha_salida = $fecha111[0].""."Oct"."".$fecha111[2];
        break;
    case '11':
        $fecha_salida = $fecha111[0].""."Nov"."".$fecha111[2];
        break;
    case '12':
        $fecha_salida = $fecha111[0].""."Dic"."".$fecha111[2];
        break;
	}
	
	return $fecha_salida;
}


?>