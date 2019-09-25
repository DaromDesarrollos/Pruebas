<?php
	
	$codigo_cliente=$_SESSION['codigo_cliente'];
	$item_gasto_buscar=$_SESSION['item_gasto_buscar'];
	
	$rubro_gasto_buscar=$_REQUEST['codigo'];
			
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
			
		$sql="SELECT FECHA FROM COS_GASTOS WHERE CLIENTE='$codigo_cliente' AND ITEM ='$item_gasto_buscar' AND RUBRO='$rubro_gasto_buscar' group by fecha ";		
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_200;
		
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
		
/*		for($i=0; $i<$contador_100; $i++){
			if($rubro_gasto[$i] == $rubro_gasto_buscar){
				$rubro_correcto=1;
				//echo 'el rubro es correcto';
			}else{
				//echo 'el rubro es incorrecto';	
			}
		}
		
		if($rubro_correcto == 0){
			//session_start();
			header('Location:../../main.php?modulo=Inicio');
			exit;
			/*echo 'vas mal';
			echo "<script>alert('Error'); document.location.href='../../main.php?modulo=gasto_buscar&item=1&codigo_cliente=$codigo_cliente';</script>";
			/*header('Location:../../main.php?modulo=gasto_item&item=1');
			exit;
			/*echo "<script>alert('Seleccion Incorrecta');</script>";*/
			/*echo "<script>alert('Error al Eliminar registro'); document.location.href='../../main.php?modulo=gasto_item&item=1';</script>";
			/*echo "<script>alert('Seleccion Incorrecta'); document.location.href='../../main.php?modulo=gasto_buscar&item=2;</script>";																					  // main.php?modulo=gasto_buscar&item=2*/
/*		}else{
			echo 'vas bien';	
			
		}
		
		
			 /*
			 
*/	 ?>
   		      <!---------------------------------------------->
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
          
          <form role="form" class="form-horizontal" action="modulos/Gastos/buscar_2.php" method="POST">
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
                  <input list="DL_Items" name="fecha" class="form-control" required="required" /> 

                  <datalist id="DL_Items">
                  			<?php for($i=0; $i<$contador_200; $i++){?>
                            <option value="<?php echo $fecha_gasto[$i]; ?>" 
                            label="<?php echo $fecha_gasto[$i]; ?>">
                            <?php }?>
                            </datalist>
                </div>
              </div>
              <!---------------------------------------------->
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
	              <input type="text" name="cliente" value="<?php echo $codigo_cliente;?>" hidden="true" />

                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Buscar"> 
                  
                  <a href="?modulo=gasto_item&item=<?php echo $item_gasto_buscar;?>" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
