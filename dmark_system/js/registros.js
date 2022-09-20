		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_registros.php?action=ajax&page='+page+'&q='+q,
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
		if (confirm("Realmente deseas eliminar el registro")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_registros.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("<img src='./img/ajax-loader.gif'>");
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
		function imprimir_registro(id_registro){
			VentanaCentrada('./pdf/documentos/ver_registro.php?id_registro='+id_registro,'Registro','','1024','768','true');
		}
$( "#guardar_registro" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_registro.php",
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
				$(this).remove();});}, 5000);
				$('#nuevoRegistro').modal('hide');
		  }
	});
  event.preventDefault();
})

$( "#editar_registro" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_registro.php",
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
				$(this).remove();});}, 5000);
				$('#myModal2').modal('hide');
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
	
			var codigoc_registro = $("#codigoc_registro"+id).val();
			var ticc_registro = $("#ticc_registro"+id).val();
			var foto_registro = $("#foto_registro"+id).val();
			var dni_registro = $("#dni_registro"+id).val();
			var participa_registro = $("#participa_registro"+id).val();
			var id_empresa_registro = $("#id_empresa_registro"+id).val();
			var id_area_registro = $("#id_area_registro"+id).val();
			var id_empresa1_registro = $("#id_empresa1_registro"+id).val();
			var id_cargo_registro = $("#id_cargo_registro"+id).val();
			var fecha_registro = $("#fecha_registro"+id).val();
			var id_curso_registro = $("#id_curso_registro"+id).val();
			var ingreso_registro = $("#ingreso_registro"+id).val();
			var estadu_registro = $("#estadu_registro"+id).val();
			var salida_registro = $("#salida_registro"+id).val();
			var condicion_registro = $("#condicion_registro"+id).val();
			var id_instructor_registro = $("#id_instructor_registro"+id).val();
			var id_empresa2_registro = $("#id_empresa2_registro"+id).val();
			var asiste_registro = $("#asiste_registro"+id).val();
			var hora_registro = $("#hora_registro"+id).val();
			var id_lugar_registro = $("#id_lugar_registro"+id).val();			
			var status_registro = $("#status_registro"+id).val();

			$("#mod_codigoc").val(codigoc_registro);
			$("#mod_ticc").val(ticc_registro);
			$("#mod_foto").val(foto_registro);
			$("#mod_dni").val(dni_registro);
			$("#mod_participa").val(participa_registro);
			$("#mod_id_empresa").val(id_empresa_registro);
			$("#mod_id_area").val(id_area_registro);
			$("#mod_id_empresa1").val(id_empresa1_registro);
			$("#mod_id_cargo").val(id_cargo_registro);
			$("#mod_fecha").val(fecha_registro);
			$("#mod_id_curso").val(id_curso_registro);
			$("#mod_ingreso").val(ingreso_registro);
			$("#mod_estadu").val(estadu_registro);
			$("#mod_salida").val(salida_registro);
			$("#mod_condicion").val(condicion_registro);
			$("#mod_id_instructor").val(id_instructor_registro);
			$("#mod_id_empresa2").val(id_empresa2_registro);
			$("#mod_asiste").val(asiste_registro);
			$("#mod_hora").val(hora_registro);
			$("#mod_id_lugar").val(id_lugar_registro);
			$("#mod_estado").val(status_registro);
			$("#mod_id").val(id);
		}