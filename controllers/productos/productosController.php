<?php

class ProductosController
{

    public static function getProductosControllers()
    {

        $respuesta = ProductosModel::getProductoModel('productos');

        return $respuesta;
    }

    public function registroProductosController()
    {

        if (isset($_POST['agragarpro'])) {

            $datosController = array('nombreProducto' => $_POST['nombreProducto'],
                'idProveedor' => $_POST['idProveedor'],
                'precioProducto' => $_POST['precioProducto'],
                'idCategoria' => $_POST['idCategoria'],
            );

            $respuesta = ProductosModel::registroProductoModel($datosController, 'productos');

            if ($respuesta == 'success') {
                header('location:okProductos');
            } else {
                header('location:categorias');

            }
        }

    }

    //
    // INVENTARIO
    //
    public function validarProductoController($validarProducto)
    {
        $datosController = $validarProducto;
        $respuesta = ProductosModel::validarProductoModel($datosController, 'productos');

        if ($respuesta) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public static function getInventarioController()
    {
        $respuesta = ProductosModel::getInventarioModel('inventario');

        return $respuesta;
    }

    public function agregarInventarioController()
    {
        if (isset($_POST['agregarInventario'])) {
            $porciones = explode(" / ", $_POST['idProducto']);
            $datosController = array('cantidadIngresada' => $_POST['cantidadIngresada'],
                'cantidad' => strval($_POST['cantidadIngresada'] + $porciones[1]),
                'precioVenta' => $_POST['precioVenta'],
                'idProducto' => $porciones[0]);
            // var_dump($datosController);
            // var_dump('id : ' . $porciones[0]); // porción1
            // var_dump('cantidad : ' . $porciones[1]); // porción2
            $respuesta = ProductosModel::agregarInventarioModel($datosController, 'inventario');
            var_dump($respuesta);

            if ($respuesta == 'success') {
                header('location:okInventarios');
            }
        }
    }

    public function deleteProductosController()
    {
        if (isset($_GET['idProd'])) {
            $idProd = $_GET['idProd'];

            $respuesta = ProductosModel::deleteProductosModel($idProd, 'productos');

            if ($respuesta == 'success') {
                header('location:okProdDelete');
            }

        }
    }

    public static function editarProductosController()
    {
        $datosController = $_GET['idProEdit'];

        $respuesta = ProductosModel::editarProductosModel($datosController, 'productos');
        return $respuesta;

    }

    public function actualizarProductosController()
    {

        if (isset($_POST['editarProd'])) {
            $datosController = array(
                'nombreProducto' => $_POST['nombreProducto'],
                'idProveedor' => $_POST['idProveedor'],
                'precioProducto' => $_POST['precioProducto'],
                'idCategoria' => $_POST['idCategoria'],
                'idProducto' => $_POST['idProducto'],
            );

            $respuesta = ProductosModel::actualizarProductosModel($datosController, 'productos');

            if ($respuesta == 'success') {

                header('location:editadoProd');
            }
        }
    }

}
