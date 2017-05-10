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

    public function getCiudadController()
    {
        $respuesta = ProveedoresModel::getCiudadModel('ciudad');

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

}
