<?php

class Conexion
{

    public static function conectar()
    {

        try {
            $link = new PDO("mysql:host=localhost;dbname=ventas", "root", "");
            return $link;

        } catch (Exception $e) {
            echo "Error en " . $e->getMessage() . $e->getLine();
        }

    }

}
