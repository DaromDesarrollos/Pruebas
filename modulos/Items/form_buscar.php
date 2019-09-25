  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Buscar Item
    </h1>
    
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Items/buscar.php" method="POST">
            <div class="box-body">
            	<!---------------------------------------------->
			<?php include 'mostrar.php'; ?>
   		      <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-5">
                  <input list="DL_Items" name="codigo" class="form-control" placeholder="Obra" id="codigo" required="required" /> 
                  <!--<input type="text" class="form-control" name="descrip"  required>-->
                  <datalist id="DL_Items">
                  			<?php for($i=0; $i<$contador_item; $i++){?>
                            <option value="<?php echo $codigo_item[$i]; ?>" 
                            label="<?php echo $descripcion_item[$i]; ?>">
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
                  
                  <a href="?modulo=Clientes" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
