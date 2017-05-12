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

    public static function getInventarioController()
    {
        $respuesta = ProductosModel::getInventarioModel('inventario');

        return $respuesta;
    }

    public function agregarInventarioController()
    {
        if (isset($_POST['agregarInventario'])) {
            $datosController = array('cantidadIngresada' => $_POST['cantidadIngresada'],
                'precioVenta' => $_POST['precioVenta'],
                'idProducto' => $_POST['idProducto']);
            // var_dump($datosController);
        }
    }

}
