<?php
session_start();
if(!isset($_SESSION['usuario'])){
	header("Location: Login/login.php");
}
include 'config/TNS.php'; 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Bollati y Asoc. | Costos</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.png" />
    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
    <!-- DATA TABLES -->
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Datepicker -->
    <link href="assets/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Chosen Select -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="assets/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="skin-blue fixed">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="main.php?module=inicio" class="logo">
          <img style="margin-top:-15px;margin-right:5px" src="img/icon.png" width="24"  alt="Logo"> 
          <span style="font-size:20px">Costos</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

             <!--------- Top Menu -------------------->
			
			<li class="dropdown user user-menu">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			 
			  
				<img src="assets/images/user/user-default.png" class="user-image" alt="User Image"/>
			  			
				<span class="hidden-xs"> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
			  </a>
			  <ul class="dropdown-menu">
			
				<li class="user-header">
                	<img src="assets/images/user/user-default.png" class="img-circle" alt="User Image"/>	
					<table style="text-align:center; width:100%; margin-top:10px;">
                        <tr>
                    		<td >
                            	Bienvenido <strong><?php echo $_SESSION['usuario']; ?></strong>
                    		</td>
                    	</tr>
                    </table>
				</li>
				
				<!-- Menu Footer-->
				<li class="user-footer">
				  <div class="pull-left">
					<!--<a style="width:80px" href="main.php/?module=perfil" class="btn btn-default btn-flat">Perfil</a>-->
                    <a style="width:80px" href="#" class="btn btn-default btn-flat">Perfil</a>
				  </div>
			
				  <div class="pull-right">
					<a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Salir</a>
				  </div>
				</li>
			  </ul>
			</li>
             <!--------- / Top Menu ------------------>
              
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">

        <section class="sidebar">

			<!-------------------------- SideBar-Menu ------------------------>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

		<li class="">
			<a href="main.php?modulo=Inicio"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
		
		<?php
		if($_SESSION['permisos'] == 10){
		echo " 
    	<li class=''>
      		<a href='main.php?modulo=Clientes'><i class='glyphicon glyphicon-user'></i> Clientes </a>
      	</li>";
		}
		?>
		<li class="">
      		<a href="main.php?modulo=Items"><i class="	glyphicon glyphicon-list-alt"></i> Items </a>
      	</li>

		<li class="">
      		<a href="main.php?modulo=Rubros"><i class="glyphicon glyphicon-briefcase"></i> Tipo de Gasto </a>
      	</li>

		<li class="">
      		<a href="main.php?modulo=Presupuestos"><i class="glyphicon glyphicon-list-alt"></i> Presupuestos </a>
      	</li>

		<li class="">
      		<a href="main.php?modulo=Gastos"><i class="glyphicon glyphicon-usd"></i> Gastos </a>
      	</li>
	</ul>

			<!-------------------------- /SideBar-Menu ------------------------>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
		<!------------------------- Content ----------------------------------->
        <?php
		//require_once "Nuevo/config/database.php";
		//require_once "Nuevo/config/fungsi_tanggal.php";
		//require_once "Nuevo/config/fungsi_rupiah.php";
		
		/*
		if (empty($_SESSION['username']) && empty($_SESSION['password'])){
			echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
		}
		else {
			if ($_GET['module'] == 'start') {
				include "Nuevo/modulos/start/view.php";
			}
		
			elseif ($_GET['module'] == 'Clientes') {
				include "Nuevo/modulos/Clientes/view.php";
			}
		
		}*/
		//echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";

		if($_GET['modulo'] == 'Inicio') {
		
			include "modulos/start/view.php";
			
		//-------------------------------------------------
				
		}elseif($_GET['modulo'] == 'Clientes'){
			
			include "modulos/Clientes/view.php";
			
		}elseif($_GET['modulo'] == 'cliente_editar'){
			
			include "modulos/Clientes/form_editar.php";
			
		}elseif($_GET['modulo'] == 'cliente_insertar'){
			
			include "modulos/Clientes/form_insertar.php";	
			
		}elseif($_GET['modulo'] == 'cliente_buscar'){
			
			include "modulos/Clientes/form_buscar.php";	
		//------------------------------------------------
				
		}elseif($_GET['modulo'] == 'Items'){
			
			include "modulos/Items/view.php";
			
		}elseif($_GET['modulo'] == 'item_editar'){
			
			include "modulos/Items/form_editar.php";
			
		}elseif($_GET['modulo'] == 'item_insertar'){
			
			include "modulos/Items/form_insertar.php";	
			
		}elseif($_GET['modulo'] == 'item_buscar'){
			
			include "modulos/Items/form_buscar.php";		
		//------------------------------------------------	
			
		}elseif($_GET['modulo'] == 'Rubros'){
			
			include "modulos/Rubros/view.php";
			
		}elseif($_GET['modulo'] == 'rubro_editar'){
			
			include "modulos/Rubros/form_editar.php";
			
		}elseif($_GET['modulo'] == 'rubro_insertar'){
			
			include "modulos/Rubros/form_insertar.php";	
			
		}elseif($_GET['modulo'] == 'rubro_buscar'){
			
			include "modulos/Rubros/form_buscar.php";		
		//------------------------------------------------	
			
		}elseif($_GET['modulo'] == 'Presupuestos'){
			
			include "modulos/Presupuestos/view.php";
			
		}elseif($_GET['modulo'] == 'Presupuesto_item'){
			
			include "modulos/Presupuestos/view_item.php";			
			
		}elseif($_GET['modulo'] == 'presupuesto_editar'){
			
			include "modulos/Presupuestos/form_editar.php";
			
		}elseif($_GET['modulo'] == 'presupuesto_insertar'){
			
			include "modulos/Presupuestos/form_insertar.php";	
			
		}elseif($_GET['modulo'] == 'presupuesto_buscar'){
			
			include "modulos/Presupuestos/form_buscar.php";		
		
		//--------------------------------------------------

		}elseif($_GET['modulo'] == 'Gastos'){
			
			include "modulos/Gastos/view.php";

		}elseif($_GET['modulo'] == 'gasto_item'){
			
			include "modulos/Gastos/view_item.php";
			
		}elseif($_GET['modulo'] == 'gasto_editar'){
			
			include "modulos/Gastos/form_editar.php";
			
		}elseif($_GET['modulo'] == 'gasto_insertar'){
			
			include "modulos/Gastos/form_insertar.php";	
			
		}elseif($_GET['modulo'] == 'gasto_buscar'){
			
			include "modulos/Gastos/form_buscar.php";			
			
		}elseif($_GET['modulo'] == 'gasto_buscar_2'){
			
			include "modulos/Gastos/form_buscar_2.php";					

		}elseif($_GET['modulo'] == 'gasto_buscar_3'){
			
			include "modulos/Gastos/form_buscar_3.php";					

				
		//--------------------------------------------------	
		}

		?>
		<!------------------------- /Content ----------------------------------->
		<?php include 'modalLogOut.php';?>

      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- datepicker -->
    <script src="assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- chosen select -->
    <script src="assets/plugins/chosen/js/chosen.jquery.min.js"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- Datepicker -->
    <script src="assets/plugins/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- maskMoney -->
    <script src="assets/js/jquery.maskMoney.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/app.min.js" type="text/javascript"></script>

  </body>
</html>