<?php

require_once 'models/conexion.php';

class ProductosModel
{

    public static function getProductoModel($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla ta JOIN proveedores prov ON prov.idProveedor = ta.idProveedor
   	JOIN categorias cat ON cat.idCategoria = ta.idCategoria ");
        $sql->execute();

        return $sql->fetchAll();
        $sql->close();
    }

    public static function registroProductoModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreProducto,idProveedor,precioProducto,idCategoria)
 			VALUES(:nombreProducto,:idProveedor,:precioProducto,:idCategoria)");

        $sql->bindParam(':nombreProducto', $datosModel['nombreProducto']);
        $sql->bindParam(':idProveedor', $datosModel['idProveedor']);
        $sql->bindParam(':precioProducto', $datosModel['precioProducto']);
        $sql->bindParam(':idCategoria', $datosModel['idCategoria']);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';

        }
        $sql->close();
    }

    public static function getInventarioModel($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla ta JOIN productos pro ON ta.idProducto = pro.idProducto  ");
        $sql->execute();
        return $sql->fetchAll();
        $sql->close();
    }

}
