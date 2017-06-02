<?php

require_once 'models/conexion.php';
class ClientesModel
{

    public static function getClientesModel($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $sql->execute();
        return $sql->fetchAll();
        $sql->close();
    }
}
