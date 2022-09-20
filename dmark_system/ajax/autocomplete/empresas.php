<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM empresas where dni_empresa like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_empresa=$row['id_empresa'];
		$row_array['value'] = $row['dni_empresa'];
		$row_array['id_empresa']=$id_empresa;
		$row_array['dni_empresa']=$row['dni_empresa'];
		$row_array['nombre_empresa']=$row['nombre_empresa'];
		$row_array['telefono_empresa']=$row['telefono_empresa'];
		$row_array['email_empresa']=$row['email_empresa'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>