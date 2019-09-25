   
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Tipo de Gasto
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          
          <form role="form" class="form-horizontal" action="modulos/Rubros/insertar.php" method="POST">
            <div class="box-body">

   		      <!---------------------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Código</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo"  required>
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

                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Insertar">
                  <a href="?modulo=Rubros" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
