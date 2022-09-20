		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_empresas.php?action=ajax&page='+page+'&q='+q,
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
		if (confirm("Realmente deseas eliminar el empresa")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_empresas.php",
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
		
$( "#guardar_empresa" ).submit(function(event) {
  $('#guardar_datos').attr("disabled", true);
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_empresa.php",
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
				$('#nuevoEmpresa').modal('hide');
				
		  }
	});
  event.preventDefault();
})

$( "#editar_empresa" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_empresa.php",
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
			var dni_empresa = $("#dni_empresa"+id).val();
			var nombre_empresa = $("#nombre_empresa"+id).val();
			var telefono_empresa = $("#telefono_empresa"+id).val();
			var email_empresa = $("#email_empresa"+id).val();
			var direccion_empresa = $("#direccion_empresa"+id).val();
			var status_empresa = $("#status_empresa"+id).val();
			
			$("#mod_dni").val(dni_empresa);
			$("#mod_nombre").val(nombre_empresa);
			$("#mod_telefono").val(telefono_empresa);
			$("#mod_email").val(email_empresa);
			$("#mod_direccion").val(direccion_empresa);
			$("#mod_estado").val(status_empresa);
			$("#mod_id").val(id);
		}