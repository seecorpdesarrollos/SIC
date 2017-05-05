// valida los el registro de usuarios nuevos
// 
 var usuarioExistente = false;

 $("#nombreAdmin").change(function(){
 	var usuario = $('#nombreAdmin').val();
 	// console.log(usuario);

 		var datos = new FormData();

		datos.append('inputvalidarUsuario' , usuario);

		$.ajax({
				url: 'views/ajax.php',
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					if (respuesta == 1 ) {
					 $("#validar").html('<p  class="alert alert-danger">Este Usuario ya Existe</p>');
					 $('#validar').addClass('a');
					 $("#form").addClass('has-danger');
					 $("#nombreAdmin").addClass('form-control form-control-danger');
					 $("#button").attr('disabled','disabled');
					 usuarioExistente = true;
						
					}else{
						 $("#form").removeClass('has-danger');
						 $("#form").addClass('has-success');
						 $("#nombreAdmin").removeClass('form-control form-control-danger');
						 $("#nombreAdmin").addClass('form-control form-control-success');
						 $('#nombreAdmin').css('border', 'solid 1.8px #8FF48A');
						 $("#validar").html('');
						 $("#button").removeAttr('disabled','disabled');
 						 usuarioExistente = false;
 						
					}
					
				}
			})
 });

 // ===================================================================
 // 
 //    validar el registro de las Categorías
 // ===================================================================
 // 
 // valida los el registro de usuarios nuevos
// 
 var usuarioExistente = false;

 $("#nombreCategorias").change(function(){
 	var categorias = $('#nombreCategorias').val();
 	 console.log(categorias);

 		var datos = new FormData();

		datos.append('inputvalidarCategoria' , categorias);

		$.ajax({
				url: 'views/ajax.php',
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					if (respuesta == 1 ) {
					 $("#cat").html('<p  class="alert alert-danger">Esta Categoría ya Existe</p>');
					 $('#cat').addClass('a');
					 $("#form").addClass('has-danger');
					 $("#nombreCategorias").addClass('form-control form-control-danger');
					 $("#button").attr('disabled','disabled');
					 usuarioExistente = true;
						
					}else{
						 $("#form").removeClass('has-danger');
						 $("#form").addClass('has-success');
						 $("#nombreCategorias").removeClass('form-control form-control-danger');
						 $("#nombreCategorias").addClass('form-control form-control-success');
						 $('#nombreCategorias').css('border', 'solid 1.8px #8FF48A');
						 $("#cat").html('');
						 $("#button").removeAttr('disabled','disabled');
 						 usuarioExistente = false;
 						
					}
					
				}
			})
 });

 // ===================================================================
 // 
 //    validar el registro de los Categorias
 // ===================================================================

 function validarRegistro(){
 	// var usuario = $('#nombreAdmin').val();
 	var password  = $('#contra').val();
 	var exprecion = /^[a-zA-Z0-9]*$/;
 	var expre = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}.*$/;

    if (password != '') {
    	var caracteres = password.length;

    	if (caracteres < 6) {
    		$('#pass').append('<p class="alert alert-danger">Por favor la contraseña debe tener mas 6 caractéres</p>');
    		
    		return false;
    	}
    }
    if (!exprecion.test(password)) {
    		$('#pass').append('<p class="alert alert-danger">Por favor no expriba caracteres especiales en la contraseña.</p>');
    		return false;
    }

     if (!expre.test(password)) {
    		
    		$('#pass').append('<p class="alert alert-danger">Por favor la contraseña tiene que poseer una mayuscula y alfanumérica.</p>');
    		return false;
    }

 	return true;
 }
