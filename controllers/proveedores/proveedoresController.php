<?php

class ProveedoresController
{

    public static function getProveedoresController()
    {
        $respuesta = ProveedoresModel::getProveedoresModel('proveedores');

        return $respuesta;
    }

    public function getProveedoresSelectController()
    {
        $respuesta = ProveedoresModel::getProveedoresModel('proveedores');

        foreach ($respuesta as $key) {
            echo '
            <option value="' . $key['idProveedor'] . '">' . ucwords($key['nombreProveedor']) . '  /  ' . ucwords($key['nombreEmpresa']) . ' </option>
          ';
        }
    }

    public static function getCiudadController()
    {
        $respuesta = ProveedoresModel::getCiudadModel('ciudad');

        return $respuesta;
    }

    public static function getProvinciaController()
    {
        $respuesta = ProveedoresModel::getProvinciaModel('provincia');

        return $respuesta;
    }

    public function agregarProveedorController()
    {
        if (isset($_POST['agragarProveedor'])) {
            $datosController = array('nombreProveedor' => $_POST['nombreProveedor'],
                'apellidoProveedor' => $_POST['apellidoProveedor'],
                'nombreEmpresa' => $_POST['nombreEmpresa'],
                'telefonoProveedor' => $_POST['telefonoProveedor'],
                'direccionProveedor' => $_POST['direccionProveedor'],
                'idCiudad' => $_POST['idCiudad']);

            $respuesta = ProveedoresModel::agregarProveedorModel($datosController, 'proveedores');

            if ($respuesta == 'success') {
                header('location:okProv');
            }
        }
    }
    public function validarProveedorController($validarProveedor)
    {
        $datosController = $validarProveedor;
        $respuesta = ProveedoresModel::validarProveedorModel($datosController, 'proveedores');

        if ($respuesta) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public static function editarProveedoresController()
    {
        if (isset($_GET['idEditProv'])) {
            $datosController = $_GET['idEditProv'];
        }
        $respuesta = ProveedoresModel::editarProveedoresModel($datosController, 'proveedores');

        return $respuesta;
    }

    public function actualizarProveedorController()
    {
        if (isset($_POST['editarProveedor'])) {
            $datosController = array('nombreProveedor' => $_POST['nombreProveedor'],
                'apellidoProveedor' => $_POST['apellidoProveedor'],
                'nombreEmpresa' => $_POST['nombreEmpresa'],
                'telefonoProveedor' => $_POST['telefonoProveedor'],
                'direccionProveedor' => $_POST['direccionProveedor'],
                'idCiudad' => $_POST['idCiudad'],
                'idProveedor' => $_POST['idProveedor']);

            $respuesta = ProveedoresModel::actualizarProveedorModel($datosController, 'proveedores');

            if ($respuesta == 'success') {
                header('location:okProvEdit');
            }
        }
    }

    public function deleteProveedoresController()
    {
        if (isset($_GET['idProv'])) {
            $datosController = $_GET['idProv'];

            $respuesta = ProveedoresModel::deleteProveedoresModel($datosController, 'proveedores');

            if ($respuesta == 'success') {
                header('location:Deletproveedores');
            }
        }
    }

}
