<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
#EL INDEX: En él mostraremos la salida de las vistas al usuario y también a traves de él enviaremos las distintas acciones que el usuario envíe al controlador.

#require() establece que el código del archivo invocado es requerido, es decir, obligatorio para el funcionamiento del programa. Por ello, si el archivo especificado en la función require() no se encuentra saltará un error “PHP Fatal error” y el programa PHP se detendrá.

#La versión require_once() funcionan de la misma forma que sus respectivo, salvo que, al utilizar la versión _once, se impide la carga de un mismo archivo más de una vez.

#Si requerimos el mismo código más de una vez corremos el riesgo de redeclaraciones de variables, funciones o clases.

// controlladores
require_once "controllers/enlaces/enlacesController.php";
require_once "controllers/ingreso/ingresoController.php";
require_once "controllers/admin/adminController.php";
require_once "controllers/categorias/categoriasController.php";
require_once "controllers/productos/productosController.php";
require_once "controllers/proveedores/proveedoresController.php";
require_once "controllers/ventas/VentasController.php";

// modelos
require_once "models/enlaces/enlacesModel.php";
require_once "models/ingreso/ingresoModel.php";
require_once "models/admin/adminModel.php";
require_once "models/categorias/categoriasModel.php";
require_once "models/productos/productosModel.php";
require_once "models/proveedores/proveedoresModel.php";
require_once "models/ventas/ventasModel.php";

$mvc = new MvcController();
$mvc->plantilla();
