function mostrarDatos(){
	$.ajax({
		url:"php/mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}
function agregarDatos(){
	
	if ($('#idProductos').val()==""){
		swal("Debes agregar un id de producto!!!");
		return false;
	}else if ($('#nombre').val()==""){
		swal("Debes agregar un nombre!!!");
		return false;
	}else if ($('#descripcion').val()==""){
		swal("Debes agregar una descripcion!!!");
		return false;
	}else if ($('#valorunitario').val()==""){
		swal("Debes agregar un precio!!!");
		return false;
	}else if ($('#cantidad').val()==""){
		swal("Debes agregar una cantidad!!!");
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
				data:"idProductos=" + idNombre,
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

function agregaDatosParaEdicion(idProductos){
	$.ajax({
		type:"POST",
		data:"idProductos=" + idProductos,
		url:"php/datosUpdate.php",
		success:function(r){
			datos=jQuery.parseJSON(r);

			$('#idProductosu').val(datos['idProductos']);
			$('#nombreu').val(datos['nombre']);
			$('#descripcionu').val(datos['descripcion']);
			$('#valorunitariou').val(datos['valorunitario']);
			$('#cantidadu').val(datos['cantidad']);
			
		}
	});
}

function actualizarDatos(){

	if ($('#idProductosu').val()==""){
		swal("Debes agregar un id de producto!!!");//sweet alert || sweet alert 2
		return false;
	}else if ($('#nombreu').val()==""){
		swal("Debes agregar un nombre!!!");
		return false;
	}else if ($('#descripcionu').val()==""){
		swal("Debes agregar una descripcion!!!");
		return false;
	}else if ($('#valorunitariou').val()==""){
		swal("Debes agregar un precio!!!");
		return false;
	}else if ($('#cantidadu').val()==""){
		swal("Debes agregar una cantidad!!!");
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