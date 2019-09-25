 <?php  
$codigo_cliente = $_REQUEST['codigo'];

	$conexion = oci_connect("$usuario_conn","$pass_conn", "$ip/$instancia");

			if (!$conexion){
				//$n=oci_error();
				//echo $n['no se a podido conectar']."\n";
				echo 'no se a podido conectar';
				return '';
				exit;}


		$sql = "SELECT CL.CODIGO, CL.DESCRIP, CL.DOMICILIO, CL.TELEFONO, CL.EMAIL, CL.PASS, CP.DESCRIP PERMISO  FROM COS_CLIENTES CL 
INNER JOIN COS_PERMISOS CP ON (CL.PERMISOS=CP.CODIGO) where CL.CODIGO='$codigo_cliente'";
				
		$filas = 0;
		$stmt = oci_parse($conexion, $sql);		// Preparar la sentencia
		$ok   = oci_execute( $stmt );			  // Ejecutar la sentencia
		$i=0;
		$contador_usr;
		
		if( $ok == true )
		{
			if( $obj = oci_fetch_object($stmt) ){
	
				do
					{	
						$codigo_ =  $obj->CODIGO;
						$descripcion_ =  $obj->DESCRIP;
						$domicilio_ =  $obj->DOMICILIO;
						$telefono_ =  $obj->TELEFONO;
						$email_ =  $obj->EMAIL; 
						$pass_ =  $obj->PASS;
						$permisos_ =  $obj->PERMISO;
						$i++;
						
					} while( $obj = oci_fetch_object($stmt) );
					$contador_usr=$i;
				}
		}
 ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Editar Cliente
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Clientes/modificar.php" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo_cliente; ?>" readonly required>
                </div>
              </div>
			  <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descrip" value="<?php echo $descripcion_; ?>" required>
                </div>
              </div>
              <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="domicilio" value="<?php echo $domicilio_; ?>" required>
                </div>
              </div>
				<!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" value="<?php echo $telefono_; ?>" required>
                </div>
              </div>
				<!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="email" value="<?php echo $email_; ?>" required>
                </div>
              </div>
				<!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="pass" value="<?php echo $pass_; ?>" required>
                </div>
              </div>
				<!---------------------------------------------->
				
				<?php include 'permisos.php';?>
                
              <div class="form-group">
                <label class="col-sm-2 control-label">Permisos</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="permisos">
                    <option value="<?php 
										for($i=0; $i<$contador_permisos; $i++){ 
											if($permisos_ == $descip_permisos[$i]){
												echo $codigo_permisos[$i];
											}
										}?>" selected="selected"><?php echo $permisos_ ;?></option>





					<?php for($i=0; $i<$contador_permisos; $i++){ 
					?>	
					<option value="<?php echo $codigo_permisos[$i];?>"><?php echo $descip_permisos[$i]; ?></option>
                    <?php
					}
					?>

                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Modificar">
                  <a href="?modulo=Clientes" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
