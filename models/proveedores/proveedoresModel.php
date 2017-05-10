<?php

// require_once 'models/conexion.php';
class ProveedoresModel
{

    public static function getProveedoresModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla pro
        JOIN ciudad ciu ON pro.idCiudad = ciu.idCiudad
        JOIN provincia prov ON ciu.idProvincia = prov.idProvincia
        ");
        $sql->execute();
        return $sql->fetchAll();

        $sql->close();
    }

    public static function getCiudadModel($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla ta JOIN
                                           provincia prov ON ta.idProvincia = prov.idProvincia
                                            ");
        $sql->execute();

        return $sql->fetchAll();

        $sql->close();
    }

    public static function agregarProveedorModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreProveedor,apellidoProveedor,nombreEmpresa,telefonoProveedor,direccionProveedor,
            idCiudad)VALUES (:nombreProveedor,:apellidoProveedor,:nombreEmpresa,:telefonoProveedor,:direccionProveedor,
            :idCiudad)");

        $sql->bindParam(':nombreProveedor', $datosModel['nombreProveedor']);
        $sql->bindParam(':apellidoProveedor', $datosModel['apellidoProveedor']);
        $sql->bindParam(':nombreEmpresa', $datosModel['nombreEmpresa']);
        $sql->bindParam(':telefonoProveedor', $datosModel['telefonoProveedor']);
        $sql->bindParam(':direccionProveedor', $datosModel['direccionProveedor']);
        $sql->bindParam(':idCiudad', $datosModel['idCiudad']);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'error';
        }
        $sql->close();
    }

    public static function validarProveedorModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT nombreEmpresa FROM $tabla WHERE nombreEmpresa = :nombreEmpresa");
        $sql->bindParam(':nombreEmpresa', $datosModel);

        $sql->execute();

        return $sql->fetch();

        $sql->close();
    }
}
