<?php
//	session_start();
	
	$codigo_cliente=$_SESSION['codigo_cliente'];
	
	$item_gasto_buscar=$_REQUEST['item'];
		
	$_SESSION['item_gasto_buscar']=$item_gasto_buscar;

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

			
		$sql="SELECT G.RUBRO, R.DESCRIP FROM COS_GASTOS G, COS_RUBRO R WHERE R.CODIGO=G.RUBRO AND G.CLIENTE ='$codigo_cliente' AND G.ITEM = '$item_gasto_buscar' GROUP BY G.RUBRO, R.DESCRIP";		
		//$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_100;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$rubro_gasto[$i] =  $obj->RUBRO;
						$descrip_gasto[$i]= $obj->DESCRIP;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_100=$i;
				}
		}
			 
			 
	 ?>
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
          
          <form role="form" class="form-horizontal" action="modulos/Gastos/buscar_1.php" method="POST">
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
                
                  <input list="DL_Items" name="codigo" class="form-control" placeholder="Tipo de Gastos" id="codigo" required="required" /> 

                  <datalist id="DL_Items">
                  			<?php for($i=0; $i<$contador_100; $i++){?>
                            <option value="<?php echo $rubro_gasto[$i]; ?>" 
                            label="<?php echo $descrip_gasto[$i]; ?>">
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
   					<input type="text" name="item" value="<?php echo $item_gasto_buscar?>" hidden="true" />
                    
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

?>