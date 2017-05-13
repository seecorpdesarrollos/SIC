<?php

require_once '../controllers/admin/adminController.php';
require_once '../controllers/categorias/categoriasController.php';
require_once '../controllers/proveedores/proveedoresController.php';
require_once '../controllers/productos/productosController.php';

require_once '../models/admin/adminModel.php';
require_once '../models/categorias/categoriasModel.php';
require_once '../models/proveedores/proveedoresModel.php';
require_once '../models/productos/productosModel.php';

require_once '../models/conexion.php';

class Ajax
{

    public $validarUsuario;
    public $validarCategoria;
    public $validarProveedor;
    public $validarProducto;

    public function validarUsuarioAjax()
    {
        $datos = $this->validarUsuario;

        $respuesta = Admin::validarUsuarioController($datos);
        echo $respuesta;
    }

    public function validarCategoriaAjax()
    {
        $datos = $this->validarCategoria;

        $respuesta = categoriasController::validarCategoriaController($datos);
        echo $respuesta;
    }
    public function validarProveedorAjax()
    {
        $datos = $this->validarProveedor;

        $respuesta = ProveedoresController::validarProveedorController($datos);
        echo $respuesta;
    }
    public function validarProductoAjax()
    {
        $datos = $this->validarProveedor;

        $respuesta = ProductosController::validarProductoController($datos);
        echo $respuesta;
    }
}

if (isset($_POST['inputvalidarUsuario'])) {
    $a = new Ajax();
    $a->validarUsuario = $_POST['inputvalidarUsuario'];
    $a->validarUsuarioAjax();
}

if (isset($_POST['inputvalidarCategoria'])) {
    $c = new Ajax();
    $c->validarCategoria = $_POST['inputvalidarCategoria'];
    $c->validarCategoriaAjax();
}

if (isset($_POST['inputvalidarProveedor'])) {
    $c = new Ajax();
    $c->validarProveedor = $_POST['inputvalidarProveedor'];
    $c->validarProveedorAjax();
}

if (isset($_POST['inputvalidarProducto'])) {
    $c = new Ajax();
    $c->validarProveedor = $_POST['inputvalidarProducto'];
    $c->validarProductoAjax();
}
