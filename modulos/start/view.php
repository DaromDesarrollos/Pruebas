  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Inicio
    </h1>
    <ol class="breadcrumb">
      <li><a href="?modulo=Inicio"><i class="fa fa-home"></i> Inicio</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Bienvenid@ <strong><?php echo $_SESSION['usuario']; ?></strong> al Sistema de Control de Costos.
          </p>        
        </div>
      </div>  
    </div>
   
   	<?php include 'empresa.php';?>   
	<div style=" display: flex;  justify-content: center;  align-items: center;  margin-top: 40px; ">
	
    <table>
    	<tr>
    		<td>
            	<div style="color:#FFF; text-shadow: 2px 2px 4px #000000; font-size:2em; text-align: center; ">
    			<h1 style="font-size:2em;"><?php echo $nombre; ?></h1>
                <h2><?php echo $domicilio; ?></h2>
                </div>
    		</td>
    	</tr>
        <tr>
    		<td>
            	<div style="color:#000;  font-size:2em; text-align: center;">
                <span style="font-size:1em;"> <h5><?php echo $localidad.'-'.$provincia; ?></h5> </span>
                <h4><?php echo $telefono; ?></h4>
                <h4>Base de Datos: <?php echo $base_datos ?></h4>
                </div>
    		</td>
    	</tr>
    </table>

	</div>    
    
    
    <!-- Small boxes (Stat box) -->
    <!--<div class="row">
      <div class="col-lg-3 col-xs-6">-->
        <!-- small box -->
 <!--       <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <p>Datos de Articulos</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <a href="?module=form_medicines&form=add" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <a class="small-box-footer"><i class="fa"></i></a>
        </div>-->
     <!-- </div>--><!-- ./col -->
    <!--</div>--><!-- /.row -->
    
  </section><!-- /.content -->