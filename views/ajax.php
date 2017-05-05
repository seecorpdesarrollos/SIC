<?php 

require_once '../controllers/admin/adminController.php';
require_once '../controllers/categorias/categoriasController.php';

require_once '../models/admin/adminModel.php';
require_once '../models/categorias/categoriasModel.php';

require_once '../models/conexion.php';

 class Ajax{

 	public $validarUsuario;
 	public $validarCategoria;

 	public function validarUsuarioAjax(){
 		$datos = $this->validarUsuario;

 		$respuesta = Admin::validarUsuarioController($datos);
 		echo $respuesta;
 	}

 	public function validarCategoriaAjax(){
 		$datos = $this->validarCategoria;

 		$respuesta = categoriasController::validarCategoriaController($datos);
 		echo $respuesta;
 	}
 }

 if(isset($_POST['inputvalidarUsuario'])){
 	$a= new Ajax();
 	$a->validarUsuario = $_POST['inputvalidarUsuario'];
 	$a->validarUsuarioAjax();
 }

  if(isset($_POST['inputvalidarCategoria'])){
 	$c= new Ajax();
  	$c->validarCategoria = $_POST['inputvalidarCategoria'];
 	$c->validarCategoriaAjax();
 }