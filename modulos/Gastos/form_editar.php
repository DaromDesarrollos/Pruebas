 <?php  
//session_start();

$codigo_rubro=$_REQUEST['codigo'];
$fecha=$_REQUEST['fecha'];
//$fecha_ok=fecha($fecha);
$renglon=$_REQUEST['renglon'];
$descrip=$_REQUEST['descrip'];
$importe=$_REQUEST['importe'];

$codigo_cliente=$_SESSION['codigo_cliente'];		
$item_presupuesto=$_SESSION['item_presupuesto'];		

/*$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

		if (!$conexion){
			//$n=oci_error();
			//echo $n['no se a podido conectar']."\n";
			echo 'no se a podido conectar';
			return '';
			exit;}


	$sql = "SELECT IMPORTE, DESCRIP FROM COS_PRESUPUESTO where CLIENTE='$codigo_cliente' AND ITEM='$item_presupuesto' AND RUBRO='$codigo_rubro'";
			
	$filas = 0;
	$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
	$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
	$i=0;
	$contador_rubro_;
	
	if( $ok == true )
	{
		if( $obj = oci_fetch_object($stmt) ){

			do
				{	
					$importe =  $obj->IMPORTE;
					$descrip =  $obj->DESCRIP;
					$i++;
				
				} while( $obj = oci_fetch_object($stmt) );
				$contador_rubro_=$i;
			}
	}
*/	
?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Editar Item-Gasto.
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Gastos/modificar.php" method="POST">
            <div class="box-body">
			  <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Item</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="item" value="<?php echo $item_presupuesto; ?>" readonly required>
                </div>
              </div>
			  <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Gasto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rubro" value="<?php echo $codigo_rubro; ?>" readonly required>
                </div>
              </div>
			  <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fecha" value="<?php echo $fecha;?>" readonly required>
                </div>
              </div>


			  <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descrip" value="<?php echo $descrip; ?>" required>
                </div>
              </div>
              <!---------------------------------------------->

              <div class="form-group">
                <label class="col-sm-2 control-label">Importe</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="importe" value="<?php echo $importe; ?>" required>
                </div>
              </div>
			  <!---------------------------------------------->
                  <input type="number"  name="renglon" value="<?php echo $renglon; ?>" hidden="true">

                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Modificar">
                  <a href="?modulo=gasto_item&item=<?php echo $item_presupuesto;?>" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
