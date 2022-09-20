<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_facturas="";
	$active_productos="";
	$active_clientes="";
	$active_docentes="active";
	$active_lugares="";
	$active_empresas="";
	$active_areas="";
	$active_cargos="";
	$active_registros="";
	$active_usuarios="";
	$title="Instructor | Dmarks";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoDocente"><span class="glyphicon glyphicon-plus" ></span> Nuevo Instructor</button>
				<a class="btn btn-primary" href='rp_dt.php' role="button"><span class="glyphicon glyphicon-print" ></span> Reporte</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Instructor</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
				include("modal/registro_docentes.php");
				include("modal/editar_docentes.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Instructor</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del Instructor" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script src="js/jquery1.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/docentes.js"></script>
  </body>
</html>
