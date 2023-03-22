function busqueda_libros(){
	books_name = document.getElementById('text_books').value;
	books_name = books_name.replace(" ", "-");
	document.getElementById("resultado").innerHTML='';
	if(books_name!=''){
		$.ajax({
		 type: 'POST',  
		 url: 'data/consulta_books.php',  
		 data: { books_name: books_name } 
		 }).done(function( msg ) {  
		  //console.log(msg); 
			data = JSON.parse(msg);
			count=data["totalItems"];
				for (var i = 0; i < count; i++) {
					if(data["items"][i]){
						mostrar = 1;
						title = data["items"][i]["volumeInfo"]["title"];
						authors = data["items"][i]["volumeInfo"]["authors"];
						/*SAVE*/
						id = data["items"][i]["id"];
						selfLink = data["items"][i]["selfLink"];
						publisher = data["items"][i]["volumeInfo"]["publisher"];
						publishedDate = data["items"][i]["volumeInfo"]["publishedDate"];
						description = data["items"][i]["volumeInfo"]["description"];
					}else{
						mostrar = 0;
						title="SIN TITULO";
						authors="SIN AUTOR";
					}
					
					if(mostrar == 1){
						guardar_busqueda(id,selfLink,title,authors[0],publisher,publishedDate,description);
						var divprincipal = document.createElement("div");
						divprincipal.className="div_detalle_resultado";
						divprincipal.id="libro_"+i;
						var newContent = document.createTextNode(title +" -  Autor : "+ authors);
						divprincipal.appendChild(newContent);
						
						document.getElementById("resultado").appendChild(divprincipal);
					}
				}
			
			
		 }).fail(function (jqXHR, textStatus, errorThrown){ 
			console.log("The following error occured: "+ textStatus +" "+ errorThrown); 
		});
	}else{
		alert('Debe ingresar nombre del libro');
		document.getElementById('text_books').focus();
	}
	
}

function guardar_busqueda(id,selfLink,title,authors,publisher,publishedDate,description){
	$.ajax({
		 type: 'POST',  
		 url: 'data/guardar_busqueda.php',  
		 data: { id: id,selfLink: selfLink,title: title,authors: authors,publisher: publisher,publishedDate: publishedDate,description:description } 
		 }).done(function( msg ) {  
		  //console.log(msg); 
		 }).fail(function (jqXHR, textStatus, errorThrown){ 
			console.log("The following error occured: "+ textStatus +" "+ errorThrown); 
		});
}

function abrircomentario(id){
	document.getElementById('id_data').value = id;
	tipo = 0;
	$.ajax({
	 type: 'POST',  
	 url: 'data/guardar_cambios.php',  
	 data: { id: id, tipo:tipo } 
	 }).done(function( msg ) {
				document.getElementById('comentario').value = msg;
			$('#exampleModal').modal('show');
	 }).fail(function (jqXHR, textStatus, errorThrown){ 
		console.log("The following error occured: "+ textStatus +" "+ errorThrown); 
	});
}

function guardar_cambio(){
	id = document.getElementById('id_data').value;
	comentario = document.getElementById('comentario').value;
	tipo = 1;
	$.ajax({
		 type: 'POST',  
		 url: 'data/guardar_cambios.php',  
		 data: { id: id,comentario: comentario, tipo:tipo } 
		 }).done(function( msg ) {  
			alert('Cambio realizado');
			$('#exampleModal').modal('hide');	
			document.getElementById('id_data').value = '';
			document.getElementById('comentario').value = '';			
		 }).fail(function (jqXHR, textStatus, errorThrown){ 
			console.log("The following error occured: "+ textStatus +" "+ errorThrown); 
		});
	
}

function del_cambio(id){
	tipo = 2;
	$.ajax({
		 type: 'POST',  
		 url: 'data/guardar_cambios.php',  
		 data: { id: id, tipo:tipo } 
		 }).done(function( msg ) {  
			alert('Cambio realizado');
			document.getElementById('row_'+id).style.display="none";
		 }).fail(function (jqXHR, textStatus, errorThrown){ 
			console.log("The following error occured: "+ textStatus +" "+ errorThrown); 
		});
	
}