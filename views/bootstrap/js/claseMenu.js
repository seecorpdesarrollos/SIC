$(document).ready(function(){
 
 // capta el vinculo de destino (target link).
  
  var path = window.location.pathname.split("/").pop();

  if (path == '' ) {
    path = 'inicio';
  }
 if( path == 'agragarproductos' || path == 'inventario'){

 	var  main  = 'productos';
    var target = $('nav a[href="'+main+'"]');
   target.addClass('actives');
  
 }

  if( path == 'agragarproveedores'){
 	
 	var  main  = 'proveedores';
    var target = $('nav a[href="'+main+'"]');
   target.addClass('actives');
  
 }

 if( path == 'agragarCategorias'){
 	
 	var  main  = 'categorias';
    var target = $('nav a[href="'+main+'"]');
   target.addClass('actives');
  
 }

  var cat = $('.list-group a[href="'+path+'"]');
  var target = $('nav a[href="'+path+'"]');
 
  target.addClass('actives');
  cat.addClass('active');
 

 $('#navbarDropdownMenuLink').click(function(){
    $('#navbarDropdownMenuLink').addClass('actives');
  

 })
});

