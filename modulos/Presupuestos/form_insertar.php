   
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Item Presup.
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Presupuestos/insertar.php" method="POST">
            <div class="box-body">

   		      <!---------------------------------------------->
              <?php include'mostrar_rubros.php';?>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Rubro</label>
                <div class="col-sm-5">
                  <input list="DL_Items" name="codigo_rubro" class="form-control" placeholder="Rubro" id="Rubro" required="required" /> 
                  <!--<input type="text" class="form-control" name="descrip"  required>-->
                  <datalist id="DL_Items">
                  			<?php for($i=0; $i<$contador_rubro; $i++){?>
                            <option value="<?php echo $codigo_rubro[$i]; ?>" 
                            label="<?php echo $descripcion_rubro[$i]; ?>">
                            <?php }?>
                            </datalist>
                </div>
              </div>
              <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descrip" required>
                </div>
              </div>
              
              <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Importe</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="importe" step="1" required>
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
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Insertar">
                  <a href="?modulo=Presupuestos" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
