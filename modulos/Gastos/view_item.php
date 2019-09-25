<?php include 'mostrar.php';?>

<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-usd icon-title"></i> Gastos

    <a class="btn btn-primary btn-social pull-right" href="?modulo=gasto_insertar" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
    <a class="btn  btn-info btn-social pull-right" href="?modulo=gasto_buscar&item=<?php echo $item_presupuesto;?>" title="Buscar" data-toggle="tooltip">
      <i class="glyphicon glyphicon-search"></i> Buscar
    </a>
  </h1>

</section>

<section class="content-header">
  <h4>
    <i class=" glyphicon glyphicon-wrench icon-title"></i> <?php echo $descrip_item_ver;?>
  </h4>

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">Cod.</th>
                <!--<th class="center">R</th>-->                
                <th class="center">Descripcion</th>
                <th class="center">Fecha</th>
                <th class="center">Importe</th>
                <th></th>
              </tr>
            </thead>
                        
            <?php  
			$importe_Total=0;			
			for($i=0; $i<$contador_Gastos;$i++){
			?>
				<tr>
                <td class="center"><?php echo $rubro_gasto[$i];?></th>
                <!--<td class="center"><?php //echo $renglon_gasto[$i];?></th>-->
                <td class="center"><?php echo $descripcion_gasto[$i];?></th>
                <td class="center"><?php echo $fecha_gasto[$i];;?></th>
                <td class="center"><?php echo $importe_gasto[$i]; $importe_Total=$importe_gasto[$i]+$importe_Total;?></th>

               <td class="center">
                	<a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:3px' class='btn btn-primary btn-sm' 
                    	href='?modulo=gasto_editar&codigo=<?php echo $rubro_gasto[$i];?>&fecha=<?php echo $fecha_gasto[$i];?>&renglon=<?php echo $renglon_gasto[$i];?>&descrip=<?php echo $descripcion_gasto[$i];?>&importe=<?php echo $importe_gasto[$i];?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                    </a>
                    <a data-toggle='tooltip' data-placement='top' title='borrar' style='margin-right:3px' class='btn btn-danger btn-sm' 
                    	href='modulos/Gastos/borrar.php?codigo=<?php echo $rubro_gasto[$i];?>&fecha=<?php echo $fecha_gasto[$i];?>&renglon=<?php echo $renglon_gasto[$i];?>&descrip=<?php echo $descripcion_gasto[$i];?>&importe=<?php echo $importe_gasto[$i]; ?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                    </a>
                </td>
              	</tr>
                
                <!--<tr>
                <td align="left" colspan="4">
                <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:3px' class='btn btn-primary btn-sm' 
                    	href='?modulo=rubro_editar&codigo=<?php //echo $codigo_rubro[$i] ?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                    </a>
                    <a data-toggle='tooltip' data-placement='top' title='borrar' style='margin-right:3px' class='btn btn-danger btn-sm' 
                    	href='modulos/Rubros/borrar.php?codigo=<?php //echo $codigo_rubro[$i] ?>'>
                        	<i style='color:#fff' class='glyphicon glyphicon-trash'></i>
                    </a>
                </td>
              	</tr>-->
                
            <?php } ?>    	
            	<tr>
                    <td align="left" colspan="3">Total</th>
                    <td class="center"><strong><?php echo $importe_Total;?></strong></th>
                    <td></td>
                </tr>
			<table>
            
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content