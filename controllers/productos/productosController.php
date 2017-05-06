<?php 


  class ProductosController{

  static public function getProductosControllers(){
   
   $respuesta = ProductosModel::getProductoModel('productos');
    
     return $respuesta;
  }

  public function registroProductosController(){

  	  if (isset($_POST['agragarpro'])) {
  	    
  	    $datosController = array('nombreProducto'=>$_POST['nombreProducto'],
  	    	                     'idProveedor'=>$_POST['idProveedor'],
  	    	                     'precioProducto'=>$_POST['precioProducto'],
  	    	                     'idCategoria'=>$_POST['idCategoria']
  	    	                     );
  	    
  	    $respuesta = ProductosModel::registroProductoModel($datosController, 'productos');

  	    if ($respuesta == 'success') {
  	    	header('location:okProductos');
  	    }else{
  	    	header('location:categorias');

  	    }
  	   }

    }


 }
