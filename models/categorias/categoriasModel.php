<?php

// require_once "models/conexion.php";

class categoriasModel
{

    public static function getCategoriasModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT *  FROM $tabla");
        $sql->execute();
        return $sql->fetchAll();

        $sql->close();
    }

    public static function agregarCategoriasModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCategoria)VALUES(:nombreCategoria)");
        $sql->bindParam(':nombreCategoria', $datosModel['nombreCategoria']);

        if ($sql->execute()) {
            return 'success';
        }

        $sql->close();

    }

    public static function validarCategoriaModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT nombreCategoria FROM $tabla WHERE nombreCategoria = :nombreCategoria");
        $sql->bindParam(':nombreCategoria', $datosModel);

        $sql->execute();

        return $sql->fetch();

        $sql->close();
    }

    public static function deleteCategoriaModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategoria = :idCategoria");
        $sql->bindParam(':idCategoria', $datosModel);

        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();
    }

    public static function editarcategoriaModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idCategoria = :idCategoria");
        $sql->bindParam(":idCategoria", $datosModel);
        $sql->execute();

        return $sql->fetch();
        $sql->close();
    }

    public static function actualizarCategoriaModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("UPDATE $tabla SET nombreCategoria = :nombreCategoria WHERE idCategoria = :idCategoria");
        $sql->bindParam(':nombreCategoria', $datosModel['nombreCategoria']);
        $sql->bindParam(':idCategoria', $datosModel['idCategoria']);

        if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }
        $sql->close();
    }

}
