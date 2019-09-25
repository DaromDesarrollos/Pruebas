			<?php include 'mostrar.php'; ?>
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
                  			<?php for($i=0; $i<$contador_presupuestos_; $i++){?>
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
