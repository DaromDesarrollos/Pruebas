<section class="content-header">
  <h1>
    <i class=" glyphicon glyphicon-list-alt icon-title"></i> Presup.

    <a class="btn btn-primary btn-social pull-right" href="?modulo=rubro_insertar" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
    <a class="btn  btn-info btn-social pull-right" href="?modulo=rubro_buscar" title="Buscar" data-toggle="tooltip">
      <i class="glyphicon glyphicon-search"></i> Buscar
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">Codigo</th>
                <th class="center">Descripcion</th>
                <th></th>
              </tr>
            </thead>
            
            <?php  
			include 'mostrar.php';
			for($i=0; $i<$contador_rubro;$i++){
			?>
				<tr>
                <td class="center"><?php echo $codigo_rubro[$i]?></th>
                <td class="center"><?php echo $descripcion_rubro[$i]?></th>
                <td class="center">
                	<a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:3px' class='btn btn-primary btn-sm' 
                    	href='?modulo=rubro_editar&codigo=<?php echo $codigo_rubro[$i] ?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                    </a>
                    <a data-toggle='tooltip' data-placement='top' title='borrar' style='margin-right:3px' class='btn btn-danger btn-sm' 
                    	href='modulos/Rubros/borrar.php?codigo=<?php echo $codigo_rubro[$i] ?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                    </a>
                </td>
              	</tr>
            <?php } ?>    	
			<table>
            
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content