<?php
 session_start();
 $fecha=date('d-m-Y');
				header("content-type: application/vnd.ms-excel");
				header("content-Disposition: attachment; filename=Reporte_Inventario_$fecha.xls");
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<center></center><br><br>
<div id="nuevoReporte">
	
    <!-- Button to trigger modal -->
<table width="80%" border="1" class="table table-hover">
<thead>
  <tr>
    <td colspan="1"><strong><center>Registros Existencia</center></strong></td>
    </tr>
  <tr>
  <td width="7%"><strong><center>Nombre</center></strong></td>
  
  </tr>
</thead>
<tbody>
<?php 
	$mensaje='no';
    $can=mysqli_query($con,"select * from cargos");
    while($dato=mysqli_fetch_array($can)){
		$cant=$dato['nombre_cargo'];
		if($cant=!0){
			$mensaje='si';
?>
  <tr>
		<td><div align="right"><center><?php echo $dato['nombre_cargo']; ?></center></div></td>
		
  
  </tr>
<?php } }?>
  </tbody>
</table>
<?php	if($mensaje=='no'){
	echo '<div class="alert alert-success" align="center"><strong>No existen registros!</strong></div>'; 
	} ?><br><br>
</body>
</html>