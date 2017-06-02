<?php

class ClientesController
{

    public static function getClientesController()
    {
        $respuesta = ClientesModel::getClientesModel('clientes');
        return $respuesta;
    }
}
