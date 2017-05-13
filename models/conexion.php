<?php

class Conexion
{

    public static function conectar()
    {

        try {
            $link = new PDO("mysql:host=localhost;dbname=ventas", "root", "");
            $link->exec('SET CHARACTER SET utf8');
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $link;

        } catch (Exception $e) {
            echo "Error en " . $e->getMessage() . $e->getLine();
        }

    }

}
