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
// aqui agrega al inventario con el correspondiente idProducto para su relacion
            $ult = Conexion::conectar()->prepare("SELECT MAX(idProducto)as ID FROM productos");
            $ult->execute();
            $res = $ult->fetch();
            // var_dump($res['ID']);
            $a = $res['ID'];
            $sqlInv = Conexion::conectar()->prepare("INSERT INTO inventario(cantidadIngresada, existenciaActual, precioVenta,idProducto)
                        VALUES(0,0,0,$a)");
            $sqlInv->execute();
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
