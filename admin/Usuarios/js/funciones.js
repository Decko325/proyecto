function mostrarDatos(){
	$.ajax({
		url:"php/mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}
function agregarDatos(){
	
	if ($('#idUsuarios').val()==""){
		swal("Debes agregar un id de Usuario!!!");
		return false;
	}else if ($('#nombres').val()==""){
		swal("Debes agregar un Nombre!!!");
		return false;
	}else if ($('#apellidos').val()==""){
		swal("Debes agregar un Apellido!!!");
		return false;
	}else if ($('#correo').val()==""){
		swal("Debes agregar un Correo!!!");
		return false;
	}else if ($('#clave').val()==""){
		swal("Debes agregar una clave!!!");
		return false;
	}else if ($('#telefono').val()==""){
		swal("Debes agregar un telefono!!!");
		return false;
	}else if ($('#direccion').val()==""){
		swal("Debes agregar una Direccion!!!");
		return false;
	}if($('#ciudad').val()==""){
		swal("Debes agregar una Ciudad!!!");
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
				data:"idUsuarios=" + idNombre,
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

function agregaDatosParaEdicion(idUsuarios){
	$.ajax({
		type:"POST",
		data:"idUsuarios=" + idUsuarios,
		url:"php/datosUpdate.php",
		success:function(r){
			datos=jQuery.parseJSON(r);

			$('#idUsuariosu').val(datos['idUsuarios']);
			$('#nombresu').val(datos['nombres']);
			$('#apellidosu').val(datos['apellidos']);
			$('#correou').val(datos['correo']);
			$('#claveu').val(datos['clave']);
			$('#telefonou').val(datos['telefono']);
			$('#direccionu').val(datos['direccion']);
			$('#ciudadu').val(datos['ciudad']);
			
		}
	});
}

function actualizarDatos(){

	if ($('#idUsuariosu').val()==""){
		swal("Debes agregar un id de Usuario!!!");//sweet alert || sweet alert 2
		return false;
	}else if ($('#nombresu').val()==""){
		swal("Debes agregar un Nombre!!!");
		return false;
	}else if ($('#apellidosu').val()==""){
		swal("Debes agregar un Apellido!!!");
		return false;
	}else if ($('#correou').val()==""){
		swal("Debes agregar un Correo!!!");
		return false;
	}else if ($('#claveu').val()==""){
		swal("Debes agregar una clave!!!");
		return false;
	}else if ($('#telefonou').val()==""){
		swal("Debes agregar un telefono!!!");
		return false;
	}else if ($('#direccionu').val()==""){
		swal("Debes agregar una Direccion!!!");
		return false;
	}else if($('#ciudadu').val()==""){
		swal("Debes agregar una Ciudad!!!");
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