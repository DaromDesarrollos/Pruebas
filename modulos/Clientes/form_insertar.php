   
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Cliente
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Clientes/insertar.php" method="POST">
            <div class="box-body">

   		      <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descrip"  required>
                </div>
              </div>
              <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="domicilio" required>
                </div>
              </div>
				<!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono"  required>
                </div>
              </div>
				<!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="email" >
                </div>
              </div>
				<!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="pass"  required>
                </div>
              </div>
				<!---------------------------------------------->
				
				<?php include 'permisos.php';?>
                
              <div class="form-group">
                <label class="col-sm-2 control-label">Permisos</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="permisos">
                    <option value="1" selected="selected">USUARIO</option>


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
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Insertar">
                  <a href="?modulo=Clientes" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
