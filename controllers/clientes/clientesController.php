<?php

class ClientesController
{

    public static function getClientesController()
    {
        $respuesta = ClientesModel::getClientesModel('clientes');
        return $respuesta;
    }

    public static function getClientesControllerNoActivo()
    {
        $respuesta = ClientesModel::getClientesModelNoActivo('clientes');
        return $respuesta;
    }

    public static function getClientesControllerId()
    {
        $datosController = $_GET['idCliente'];
        $respuesta = ClientesModel::getClientesModelId($datosController, 'clientes');
        return $respuesta;
    }

    public function registrarClientesController()
    {
        if (isset($_POST['agragarclientes'])) {
            $datosController = array('nombreCliente' => $_POST['nombreCliente'],
                'apellidoCliente' => $_POST['apellidoCliente'],
                'idProvincia' => $_POST['idProvincia'],
                'usuarioCliente' => $_POST['usuarioCliente'],
                'passwordCliente' => $_POST['passwordCliente'],
                'telefono' => $_POST['telefono'],
                'emailCliente' => $_POST['emailCliente'],
                'direccion' => $_POST['direccion'],
                'idCiudad' => $_POST['idCiudad'],
                'cuit' => $_POST['cuit'],
            );
            $respuesta = ClientesModel::registrarClientesModel($datosController, 'clientes');
            if ($respuesta == 'success') {
                header('location:okClientes');
            }
        }
    }

    public static function editClientesController()
    {
        $datosController = $_GET['idCliente'];

        $respuesta = ClientesModel::editClientesModel($datosController, 'clientes');

        return $respuesta;
    }

    public function actualizarClientesController()
    {
        if (isset($_POST['editarClientes'])) {
            $datosController = array('nombreCliente' => $_POST['nombreCliente'],
                'apellidoCliente' => $_POST['apellidoCliente'],
                'idProvincia' => $_POST['idProvincia'],
                'usuarioCliente' => $_POST['usuarioCliente'],
                'passwordCliente' => $_POST['passwordCliente'],
                'telefono' => $_POST['telefono'],
                'emailCliente' => $_POST['emailCliente'],
                'direccion' => $_POST['direccion'],
                'idCiudad' => $_POST['idCiudad'],
                'cuit' => $_POST['cuit'],
                'idCliente' => $_POST['idCliente'],
            );
            $respuesta = ClientesModel::actualizarClientesModel($datosController, 'clientes');
            if ($respuesta == 'success') {
                header('location:okClientesEdit');
            }
        }
    }

    public static function bajaClientesController()
    {
        if (isset($_GET['id'])) {

            $datosController = $_GET['id'];

            $respuesta = ClientesModel::bajaClientesModel($datosController, 'clientes');
            if ($respuesta == 'success') {
                header('location:baja');

            }
        }
    }

    public static function altaClientesController()
    {
        if (isset($_GET['idAlta'])) {

            $datosController = $_GET['idAlta'];

            $respuesta = ClientesModel::altaClientesModel($datosController, 'clientes');
            if ($respuesta == 'success') {
                header('location:alta');

            }
        }
    }

}
