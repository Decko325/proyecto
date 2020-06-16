function mostrarDatos(){
	$.ajax({
		url:"php/mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}
function agregarDatos(){
	
	if ($('#idVentas').val()==""){
		swal("Debes agregar un id de venta!!!");
		return false;
	}else if ($('#fecha').val()==""){
		swal("Debes agregar una fecha!!!");
		return false;
	}else if ($('#cantidad').val()==""){
		swal("Debes agregar una cantidad!!!");
		return false;
	}if ($('#valorapagar').val()==""){
		swal("Debes agregar un precio!!!");
		return false;
	}

	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatos').serialize(),
		url:"php/agregarDatos.php",
		success:function(r){
			if(r==1){
				$('#frmAgregarDatos')[0].reset();
				mostrarDatos();
				swal(":D","Agregado con exito!","success");
			}else{
				swal("D:","Fallo al agregar","error");
			}
		}
	});
}

function eliminarDatos(idNombre){
	swal({
		title: "Estas seguro de eliminar este registro?",
		text: "Una vez que elimines este registro, no podra ser recuperado!!!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete){
			
			$.ajax({
				type:"POST",
				data:"idVentas=" + idNombre,
				url:"php/eliminar.php",
				success:function(r){
					if(r==1){
				
				mostrarDatos();
				swal(":D","Eliminado con exito!","success");
					}else{
						swal("D:","Fallo al Eliminar","error");
					}
					
				}
			});
				
		}	
	
	});
}

function agregaDatosParaEdicion(idVentas){
	$.ajax({
		type:"POST",
		data:"idVentas=" + idVentas,
		url:"php/datosUpdate.php",
		success:function(r){
			datos=jQuery.parseJSON(r);

			$('#idVentasu').val(datos['idVentas']);
			$('#fechau').val(datos['fecha']);
			$('#cantidadu').val(datos['cantidad']);
			$('#valorapagaru').val(datos['valorapagar']);
						
		}
	});
}

function actualizarDatos(){

	if ($('#idVentasu').val()==""){
		swal("Debes agregar un id de venta!!!");//sweet alert || sweet alert 2
		return false;
	}else if ($('#fechau').val()==""){
		swal("Debes agregar una fecha!!!");
		return false;
	}else if ($('#cantidadu').val()==""){
		swal("Debes agregar una cantidad!!!");
		return false;
	}else if ($('#valorapagaru').val()==""){
		swal("Debes agregar un precio!!!");
		return false;
	}

	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatosu').serialize(),
		url:"php/actualizarDatos.php",
		success:function(r){
			if(r==1){
				mostrarDatos();
				swal(":D","Actualizado con exito!","success");
			}else{
				swal("D:","Fallo al Actualizar","error");
			}
		}
	});
}