<?php
	
	$codigo_cliente=$_SESSION['codigo_cliente'];
	$item_gasto_buscar=$_SESSION['item_gasto_buscar'];
	
	$rubro_gasto_buscar=$_REQUEST['codigo'];
	$fecha_gasto_buscar=$_REQUEST['fecha'];
			
	//echo $codigo_cliente.'<br>'.$item_gasto_buscar.'<br>'.$rubro_gasto_buscar.'<br>'.$fecha_gasto_buscar;

	//------------------------------------------------------------------------
	
	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	//$rubro_correcto = 0;
	$contador_presupuestos_=0;
	$contador_Gastos=0;

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}
			
		$sql="SELECT IMPORTE, DESCRIPCION, RENGLON FROM COS_GASTOS WHERE CLIENTE='$codigo_cliente' AND ITEM ='$item_gasto_buscar' AND RUBRO='$rubro_gasto_buscar' AND FECHA='$fecha_gasto_buscar' ";		
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_300;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$importe_gasto[$i] =  $obj->IMPORTE;
						$descrip_gasto[$i] = $obj->DESCRIPCION;
						$renglon_gasto[$i] =  $obj->RENGLON;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_300=$i;
				}
		}
		
/*		for($i=0; $i<$contador_300; $i++){
			echo '<br> Importe:'.$importe_gasto[$i].'- descripcion:'.$descrip_gasto[$i].'-renglon:'.$renglon_gasto[$i];
		}
*/
//------------------------------------------
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Buscar Gastos <?php //echo $item_presupuesto; ?>
    </h1>
    
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="" method="POST">
            <div class="box-body">

			  <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Item</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="item" value="<?php echo $item_gasto_buscar; ?>" readonly required>
                </div>
              </div>
			  <!---------------------------------------------->
               <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Gasto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $rubro_gasto_buscar; ?>" readonly required>
                </div>
              </div>
			  <!---------------------------------------------->
               <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fecha" value="<?php echo $fecha_gasto_buscar; ?>" readonly required>
                </div>
              </div>
			  
              <!---------------------------------------------->
            </div><!-- /.box body -->

          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->



<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">Descripcion</th>
                <th class="center">Importe</th>
                <th></th>
              </tr>
            </thead>
                        
            <?php  
			$importe_Total=0;			
			for($i=0; $i<$contador_300;$i++){
			?>
				<tr>
                <td class="center"><?php echo $descrip_gasto[$i];?></th>
                <td class="center"><?php echo $importe_gasto[$i]; $importe_Total=$importe_gasto[$i]+$importe_Total;?></th>

               <td class="center">
                	
                    <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:3px' class='btn btn-primary btn-sm' 
                    	href='?modulo=gasto_editar&codigo=<?php echo $rubro_gasto_buscar;?>&fecha=<?php echo $fecha_gasto_buscar;?>&renglon=<?php echo $renglon_gasto[$i];?>&descrip=<?php echo $descrip_gasto[$i];?>&importe=<?php echo $importe_gasto[$i];?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                    </a>
                    
                    
                    <a data-toggle='tooltip' data-placement='top' title='borrar' style='margin-right:3px' class='btn btn-danger btn-sm' 
                    	href='modulos/Gastos/borrar.php?codigo=<?php echo $rubro_gasto_buscar;?>&fecha=<?php echo $fecha_gasto_buscar;?>&renglon=<?php echo $renglon_gasto[$i];?>&descrip=<?php echo $descrip_gasto[$i];?>&importe=<?php echo $importe_gasto[$i]; ?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                    </a>
                </td>
              	</tr>
                
            <?php } ?>    	
            	<tr>
                    <td align="left" >Total</th>
                    <td class="center"><strong><?php echo $importe_Total;?></strong></th>
                    <td></td>
                </tr>
			<table>
            

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content
