<?php
//	session_start();
	
	$codigo_cliente=$_SESSION['codigo_cliente'];
	
	$item_gasto_buscar=$_REQUEST['item'];
		
	$_SESSION['item_gasto_buscar']=$item_gasto_buscar;
	
	echo 'cliente:'.$codigo_cliente.'- item:'.$item_gasto_buscar;
	
	/*$descrip_item_ver='';
	
	$_SESSION['item_presupuesto']=$item_presupuesto;
	
	if(isset($_REQUEST['descrip_item'])){
	$descrip_item_ver=$_REQUEST['descrip_item'];
	}
	if($descrip_item_ver==NULL){
		$descrip_item_ver=$_SESSION['item_descrip_presupuesto'];
	}
	
	$codigo_cliente=$_SESSION['codigo_cliente'];
	
	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");
	$item_correcto = 0;
	$contador_presupuestos_=0;
	$contador_Gastos=0;

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}

			
		$sql ="SELECT RUBRO, FECHA, RENGLON, IMPORTE, DESCRIPCION FROM COS_GASTOS WHERE CLIENTE='$codigo_cliente' AND ITEM='$item_presupuesto' ORDER BY RUBRO";
				
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_Gastos;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$rubro_gasto[$i] =  $obj->RUBRO;
						$fecha_gasto[$i] =  $obj->FECHA;
						$renglon_gasto[$i] =  $obj->RENGLON;
						$importe_gasto[$i] =  $obj->IMPORTE;
						$descripcion_gasto[$i] =  $obj->DESCRIPCION;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_Gastos=$i;
				}
		}
			 
			 
			 
			 
			 
			 
			 
			 ?>
   		      <!---------------------------------------------->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Buscar Presupuesto <?php echo $item_presupuesto; ?>
    </h1>
    
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Presupuestos/buscar.php" method="POST">
            <div class="box-body">
            	<!---------------------------------------------->

              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-5">
                  <input list="DL_Items" name="codigo" class="form-control" placeholder="Tipo de Gastos" id="codigo" required="required" /> 

                  <datalist id="DL_Items">
                  			<?php for($i=0; $i<$contador_Gastos; $i++){?>
                            <option value="<?php echo $rubro_presupuesto[$i]; ?>" 
                            label="<?php echo $descripcion_presupuesto[$i]; ?>">
                            <?php }?>
                            </datalist>
                </div>
              </div>
              <!---------------------------------------------->
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">

                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Buscar"> 
                  
                  <a href="?modulo=Presupuesto_item&item=<?php echo $item_presupuesto;?>" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
*/
?>