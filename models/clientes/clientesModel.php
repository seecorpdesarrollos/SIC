<?php

require_once 'models/conexion.php';
class ClientesModel
{

    public static function getClientesModel($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  estado=1");

        $sql->execute();
        return $sql->fetchAll();
        $sql->close();
    }
    public static function getClientesModelNoActivo($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla ta
        WHERE  estado=0");

        $sql->execute();
        return $sql->fetchAll();
        $sql->close();
    }
    public static function getClientesModelId($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla ta
        JOIN provincia pro ON ta.idProvincia= pro.idProvincia
        JOIN ciudad ciu ON ciu.idProvincia=pro.idProvincia
         WHERE idCliente= $datosModel");

        $sql->execute();
        return $sql->fetchAll();
        $sql->close();
    }

    public static function registrarClientesModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCliente,apellidoCliente,idProvincia,usuarioCliente,passwordCliente,telefono,emailCliente,direccion,idCiudad,cuit)
            VALUES(:nombreCliente,:apellidoCliente,:idProvincia,:usuarioCliente,:passwordCliente,:telefono,:emailCliente,:direccion,:idCiudad,:cuit)");
        $sql->bindParam(":nombreCliente", $datosModel['nombreCliente']);
        $sql->bindParam(":apellidoCliente", $datosModel['apellidoCliente']);
        $sql->bindParam(":idProvincia", $datosModel['idProvincia']);
        $sql->bindParam(":usuarioCliente", $datosModel['usuarioCliente']);
        $sql->bindParam(":passwordCliente", $datosModel['passwordCliente']);
        $sql->bindParam(":telefono", $datosModel['telefono']);
        $sql->bindParam(":emailCliente", $datosModel['emailCliente']);
        $sql->bindParam(":direccion", $datosModel['direccion']);
        $sql->bindParam(":idCiudad", $datosModel['idCiudad']);
        $sql->bindParam(":cuit", $datosModel['cuit']);

        if ($sql->execute()) {
            return 'success';
        }

        $sql->close();
    }

    public static function editClientesModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla ta
        JOIN provincia prov ON ta.idProvincia = prov.idProvincia
        JOIN ciudad ciu ON prov.idProvincia=ciu.idProvincia
         WHERE idCliente = :idCliente");

        $sql->bindParam(':idCliente', $datosModel);

        $sql->execute();
        return $sql->fetchAll();
        $sql->close();

    }

    public static function actualizarClientesModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("UPDATE  $tabla SET nombreCliente= :nombreCliente,apellidoCliente=:apellidoCliente,idProvincia=:idProvincia,usuarioCliente=:usuarioCliente,passwordCliente=:passwordCliente,telefono=:telefono,emailCliente=:emailCliente,direccion=:direccion,idCiudad=:idCiudad,cuit=:cuit WHERE idCliente=:idCliente");

        $sql->bindParam(":nombreCliente", $datosModel['nombreCliente']);
        $sql->bindParam(":apellidoCliente", $datosModel['apellidoCliente']);
        $sql->bindParam(":idProvincia", $datosModel['idProvincia']);
        $sql->bindParam(":usuarioCliente", $datosModel['usuarioCliente']);
        $sql->bindParam(":passwordCliente", $datosModel['passwordCliente']);
        $sql->bindParam(":telefono", $datosModel['telefono']);
        $sql->bindParam(":emailCliente", $datosModel['emailCliente']);
        $sql->bindParam(":direccion", $datosModel['direccion']);
        $sql->bindParam(":idCiudad", $datosModel['idCiudad']);
        $sql->bindParam(":cuit", $datosModel['cuit']);
        $sql->bindParam(":idCliente", $datosModel['idCliente']);

        if ($sql->execute()) {
            return 'success';
        }

        $sql->close();
    }

    public static function bajaClientesModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("UPDATE  $tabla SET estado= 0 WHERE idCliente=:idCliente");

        $sql->bindParam(":idCliente", $datosModel);

        if ($sql->execute()) {
            return 'success';
        }

        $sql->close();
    }

    public static function altaClientesModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("UPDATE  $tabla SET estado= 1 WHERE idCliente=:idCliente");

        $sql->bindParam(":idCliente", $datosModel);

        if ($sql->execute()) {
            return 'success';
        }

        $sql->close();
    }
}
