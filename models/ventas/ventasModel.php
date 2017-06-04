
<?php
// require_once 'models/conexion.php';
class VentasModel
{

    public static function getFacturaModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT MAX(numFac) AS total FROM $tabla  ");
        $sql->execute();
        return $sql->fetchAll();

        $sql->close();
    }

    public static function getTempModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla te
         JOIN productos prod ON prod.idProducto = te.idProducto
         JOIN clientes cli ON te.idCliente = cli.idCliente ");
        $sql->execute();
        return $sql->fetchAll();

        $sql->close();
    }

    public static function registroFacturaModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("INSERT INTO   $tabla(idProducto,idCliente,precioVenta,cantidad,iva,totalVenta,numFac,fechaVenta,unidad,tipoFactura)VALUES
                (:idProducto,:idCliente,:precioVenta,:cantidad,:iva,:totalVenta,:numFac,:fechaVenta,:unidad,:tipoFactura) ");

        $sql->bindParam(':idProducto', $datosModel['idProducto']);
        $sql->bindParam(':idCliente', $datosModel['idCliente']);
        $sql->bindParam(':precioVenta', $datosModel['precioVenta']);
        $sql->bindParam(':cantidad', $datosModel['cantidad']);
        $sql->bindParam(':iva', $datosModel['iva']);
        $sql->bindParam(':totalVenta', $datosModel['totalVenta']);
        $sql->bindParam(':numFac', $datosModel['numFac']);
        $sql->bindParam(':fechaVenta', $datosModel['fechaVenta']);
        $sql->bindParam(':unidad', $datosModel['unidad']);
        $sql->bindParam(':tipoFactura', $datosModel['tipoFactura']);

        //
        // verifica el stock
        $idProducto = $datosModel['idProducto'];
        $stock = Conexion::conectar()->prepare("SELECT * FROM inventario
            WHERE idProducto = $idProducto");
        $stock->execute();
        $resultado = $stock->fetchAll();
        foreach ($resultado as $key) {

            if ($key['cantidadIngresada'] < $datosModel['unidad']) {
                return 'no';
                // $key->close();
            }
        }

        // revisa que sea el mismo cliente
        //
        //
        $cedu = Conexion::conectar()->prepare('SELECT idCliente FROM temp ');
        $cedu->execute();
        $resu = $cedu->fetch();

        if ($resu == '') {
            // actualiza el inventario
            //
            $unidad = $datosModel['unidad'];
            $idProducto = $datosModel['idProducto'];
            $sql1 = Conexion::conectar()->prepare("UPDATE inventario SET cantidadIngresada = cantidadIngresada - $unidad  WHERE idProducto = $idProducto");
            $sql1->execute();

            if ($sql->execute()) {
                return 'success';
            }
        }
        $cedulaSql = Conexion::conectar()->prepare('SELECT idCliente,tipoFactura FROM temp te
            WHERE idCliente = :idCliente AND tipoFactura=:tipoFactura');
        $cedulaSql->execute(array(':idCliente' => $datosModel['idCliente'],
            ':tipoFactura' => $datosModel['tipoFactura']));
        $res = $cedulaSql->fetch();

        if (!$res) {
            return 'noCliente';

        }

        // // actualiza el inventario
        // //
        $unidad = $datosModel['unidad'];
        $idProducto = $datosModel['idProducto'];

        $sql1 = Conexion::conectar()->prepare("UPDATE inventario SET cantidadIngresada = cantidadIngresada - $unidad  WHERE idProducto = $idProducto");
        $sql1->execute();

        if ($sql->execute()) {
            return 'success';
        }

        $sql->close();
    }

    public static function borrarVentasModel($datosModel, $datosControl, $unidad, $tabla)
    {
        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTemp = :idTemp");
        $sql->bindParam(':idTemp', $datosModel);

        //
        // vuelve la venta atras.
        $sql1 = Conexion::conectar()->prepare("UPDATE inventario SET cantidadIngresada = cantidadIngresada + $unidad  WHERE idProducto = $datosControl");
        $sql1->execute();

        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();
    }

    public static function registrarVentasDetallesModel($datosModel, $tabla, $idAdmin, $numFac)
    {
        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla(idCliente,idProducto,fechaVenta,precioVenta,cantidadKilos,totalVenta,numFac,tipoFactura)SELECT tem.idCliente,tem.idProducto,tem.fechaVenta,tem.precioVenta,tem.cantidad,tem.totalVenta,tem.numFac,tem.tipoFactura
            FROM temp tem ");

        if ($sql->execute()) {
            $sql = Conexion::conectar()->prepare("INSERT INTO factura( numFac,fechaVenta,idCliente,idAdmin , totalVenta,tipoFactura)SELECT  MAX(det.numFac), det.fechaVenta,det.idCliente, $idAdmin, SUM(det.totalVenta),det.tipoFactura
            FROM detalles det WHERE numFac=$numFac");
            $sql->execute();
            $sql = Conexion::conectar()->prepare("DELETE FROM temp");
            $sql->execute();
            return 'success';
        }
        $sql->close();

    }

    public static function imprimirVentasModel($numFac)
    {
        $sql = Conexion::conectar()->prepare("SELECT  * FROM detalles ta
            JOIN clientes cli ON ta.idCliente=cli.idCliente
            JOIN Productos prod ON prod.idProducto=ta.idProducto
            JOIN Provincia pro ON pro.idProvincia=cli.idProvincia
            JOIN ciudad ciu ON pro.idProvincia=ciu.idProvincia
            WHERE numFac = $numFac");
        $sql->execute();

        return $sql->fetchAll();
        $sql->close();
    }
    public static function getVentasModel($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT  * FROM  $tabla ta
               JOIN clientes cli ON ta.idCliente=cli.idCliente");
        $sql->execute();

        return $sql->fetchAll();
        $sql->close();
    }
    public static function borrarFacturaModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE numFac = :numFac");
        $sql->bindParam(':numFac', $datosModel);
        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();
    }

}