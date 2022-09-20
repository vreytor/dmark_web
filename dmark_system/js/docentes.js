		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_docentes.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					$('[data-toggle="tooltip"]').tooltip({html:true});
					
				}
			})
		}
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el Instructor")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_docentes.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});}, 500);
				$('#resultados').modal('hide');
		}
			});
		}
		}
		
		
	
$( "#guardar_docente" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_docente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});}, 500);
				$('#nuevoDocente').modal('hide');
		  }
	});
  event.preventDefault();
})

$( "#editar_docente" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_docente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});}, 500);
				$('#myModal2').modal('hide');
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
			var dni_docente = $("#dni_docente"+id).val();
			var nombre_docente = $("#nombre_docente"+id).val();
			var telefono_docente = $("#telefono_docente"+id).val();
			var email_docente = $("#email_docente"+id).val();
			var direccion_docente = $("#direccion_docente"+id).val();
			var status_docente = $("#status_docente"+id).val();
			
			$("#mod_dni").val(dni_docente);
			$("#mod_nombre").val(nombre_docente);
			$("#mod_telefono").val(telefono_docente);
			$("#mod_email").val(email_docente);
			$("#mod_direccion").val(direccion_docente);
			$("#mod_estado").val(status_docente);
			$("#mod_id").val(id);
		}