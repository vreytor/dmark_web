<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM docentes where dni_docente like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_docente=$row['id_docente'];
		$row_array['value'] = $row['dni_docente'];
		$row_array['id_docente']=$id_docente;
		$row_array['dni_docente']=$row['dni_docente'];
		$row_array['nombre_docente']=$row['nombre_docente'];
		$row_array['telefono_docente']=$row['telefono_docente'];
		$row_array['email_docente']=$row['email_docente'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>