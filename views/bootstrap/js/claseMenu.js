$(document).ready(function(){
 
 // capta el vinculo de destino (target link).
  
  var path = window.location.pathname.split("/").pop();

  if (path == '' ) {
    path = 'inicio';
  }

  var cat = $('.list-group a[href="'+path+'"]');
  var target = $('nav a[href="'+path+'"]');

  target.addClass('actives');
  cat.addClass('active');

 $('#navbarDropdownMenuLink').click(function(){
    $('#navbarDropdownMenuLink').addClass('actives');
  

 })
});

