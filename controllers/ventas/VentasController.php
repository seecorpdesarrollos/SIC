<?php

class VentasController
{

    public static function getFecturaController()
    {
        $respuesta = VentasModel::getFacturaModel('detalles');

        return $respuesta;

    }

    public static function getTempController()
    {
        $respuesta = VentasModel::getTempModel('temp');

        return $respuesta;

    }

    public function agregarVentaController()
    {
        if (isset($_POST['post'])) {
            $datosController = array(
                'idProducto' => $_POST['idProducto'],
                'nombreProducto' => $_POST['nombreProducto'],
                'idCliente' => $_POST['idCliente'],
                'precioVenta' => $_POST['precioVenta'],
                'cantidad' => $_POST['cantidad'],
                'iva' => $_POST['iva'],
                'totalVenta' => $_POST['totalVenta'],
                'numFac' => $_POST['numFac'],
                'fechaVenta' => date('Y-m-d ', strtotime($_POST['fechaVenta'])),
                'unidad' => $_POST['unidad'],
                'tipoFactura' => $_POST['tipoFactura'],
            );

            $respuesta = VentasModel::registroFacturaModel($datosController, 'temp');
            if ($respuesta == 'no') {
                require 'views/modules/modals/noInventario.php';
            }
            if ($respuesta == 'noCliente') {
                require 'views/modules/modals/noCliente.php';
            }
            if ($respuesta == 'noFacturaTipo') {
                require 'views/modules/modals/noFacturaTipo.php';
            }
            if ($respuesta == 'success') {
                header('location:okVentas');
            }
        }
    }

    public function borrarVentasController()
    {
        if (isset($_GET['idTemp'])) {
            $datosController = $_GET['idTemp'];
            $datosControl = $_GET['idProducto'];
            $unidad = $_GET['unidad'];
            $respuesta = VentasModel::borrarVentasModel($datosController, $datosControl, $unidad, 'temp');

            if ($respuesta == 'success') {
                header('location:okBorradoVentas');
            }
        }
    }

    public function registrarVentasDetallesControllers()
    {
        if (isset($_POST['enviarDetalles'])) {
            $idAdmin = $_POST['idAdmin'];
            $numFac = $_POST['numFac'];
            $respuesta = VentasModel::registrarVentasDetallesModel($datosController, 'detalles', $idAdmin, $numFac);
            if ($respuesta == 'success') {
                header('location:ventas');
            }
        }
    }
    public static function imprimirVentasController($numFac)
    {
        // $datosController = $datos;
        $numFactura = $numFac;
        $respuesta = VentasModel::imprimirVentasModel($numFactura);
        return $respuesta;
    }

    public static function getVentasController()
    {

        $respuesta = VentasModel::getVentasModel('factura');
        return $respuesta;
    }
    public function borrarFacturaController()
    {
        if (isset($_GET['deleteFactura'])) {
            $datosController = $_GET['deleteFactura'];

            $respuesta = VentasModel::borrarFacturaModel($datosController, 'factura');

            if ($respuesta == 'success') {
                header('location:okBorradoFactura');
            }
        }
    }

}
