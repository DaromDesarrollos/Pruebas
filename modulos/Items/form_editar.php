 <?php  
$codigo_item = $_REQUEST['codigo'];

	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}


		$sql = "SELECT CODIGO, DESCRIP, DOMICILIO FROM COS_ITEM where CODIGO='$codigo_item'";
				
		$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_item_;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$codigo_item_ =  $obj->CODIGO;
						$descripcion_item_ =  $obj->DESCRIP;
						$domicilio_item_ =  $obj->DOMICILIO;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_item_=$i;
				}
		}
 ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Editar Item
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Items/modificar.php" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo_item_; ?>" readonly required>
                </div>
              </div>
			  <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descrip" value="<?php echo $descripcion_item_; ?>" required>
                </div>
              </div>
              <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="domicilio" value="<?php echo $domicilio_item_; ?>" required>
                </div>
              </div>
				<!---------------------------------------------->

                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Modificar">
                  <a href="?modulo=Items" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
