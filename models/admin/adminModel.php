<?php

// require_once  "models/conexion.php";

class AdminModel
{

    public static function getAdminModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);

        $sql->close();

    }
    public static function imprimirModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $sql->execute();

        return $sql->fetchAll();

        $sql->close();

    }
    public static function getAdminModelUsuario($tabla, $id)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idAdmin = $id");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);

        $sql->close();

    }

    public static function fecha($tabla, $id)
    {

        $sql = Conexion::conectar()->prepare("SELECT INTERVAL 90 DAY +  fechaCreado AS cambiar , idAdmin FROM $tabla WHERE idAdmin = $id");
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
        $sql->close();

    }

    public static function cambiarPassworModel($datosModel, $tabla)
    {
        // modifica el password del usuario(tabla administrador)
        //
        //
        $sql = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password, fechaCreado= :fechaCreado WHERE idAdmin = :idAdmin");

        $sql->bindParam(":password", $datosModel['password']);
        $sql->bindParam(":fechaCreado", $datosModel['fechaCreado']);
        $sql->bindParam(":idAdmin", $datosModel['idAdmin']);

        // selecciona de la tabla pass para comparar las password.
        //
        //
        $pass = Conexion::conectar()->prepare("SELECT password FROM pass WHERE password =:password AND idAdmin = :idAdmin ");

        $pass->bindParam(":password", $datosModel['password']);
        $pass->bindParam(":idAdmin", $datosModel['idAdmin']);

        $pass->execute();
        $res = $pass->fetch();

        var_dump($res);
        if ($res) {
            // header('location:errorPass');

        } else {

            //////
            // // si todo va bien realiza el insert al tabla pass
            //////
            $sql1 = Conexion::conectar()->prepare("INSERT INTO pass(password ,idAdmin)VALUES (:password,:idAdmin)");
            $sql1->bindParam(":password", $datosModel['password']);
            $sql1->bindParam(":idAdmin", $datosModel['idAdmin']);

            if ($sql->execute() and $sql1->execute()) {
                return 'seccess';
            }
            $sql->close();
        }
    }

    // static public function  deletModel($tabla,$id,$pa){

    //       $sql = Conexion::conectar()->prepare("SELECT COUNT(*) AS TOTAL , MIN(idpass) AS pas FROM $tabla");
    //       $sql->execute();
    //        return $sql->fetchAll();

    //       $sql->close();

    // }

    //   static public function  deletModelU($datosModel,$tabla){

    //        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idpass = :idpass ");
    //           $sql->bindParam(":idpass",$datosModel['pas']);
    //      if( $sql->execute()){
    //          header('location:nosotros');
    //      }
    //       $sql->close();
    //  }

    public static function agregarUsuariosModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreAdmin,password,rol,fechaCreado)
       VALUES(:nombreAdmin,:password,:rol,:fechaCreado)");

        $sql->bindParam(":nombreAdmin", $datosModel['nombreAdmin']);
        $sql->bindParam(":password", $datosModel['password']);
        $sql->bindParam(":rol", $datosModel['rol']);
        $sql->bindParam(":fechaCreado", $datosModel['fechaCreado']);

        if ($sql->execute()) {
            return 'success';
        } else {
            echo "Error";
        }
        $sql->close();
    }

    public static function deleteUsuarioModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idAdmin = :idAdmin");

        $sql->bindParam(":idAdmin", $datosModel);

        if ($sql->execute()) {

            return 'success';

        } else {

            return 'Error';
        }
        $sql->close();
    }

    public static function editarUsuarioModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT idAdmin ,nombreAdmin, password,rol FROM $tabla WHERE idAdmin = :idAdmin");
        $sql->bindParam(":idAdmin", $datosModel);
        $sql->execute();

        return $sql->fetch();
        $sql->close();
    }

    public static function actualizarUsuarioModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("UPDATE $tabla SET nombreAdmin=:nombreAdmin,password=:password,rol=:rol WHERE idAdmin=:idAdmin");
        $sql->bindParam(':nombreAdmin', $datosModel['nombreAdmin']);
        $sql->bindParam(':password', $datosModel['password']);
        $sql->bindParam(':rol', $datosModel['rol']);
        $sql->bindParam(':idAdmin', $datosModel['idAdmin']);

        if ($sql->execute()) {
            return 'success';
        } else {
            return "Error";
        }
        $sql->close();
    }

    public function validarUsuarioModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT nombreAdmin FROM $tabla WHERE nombreAdmin = :nombreAdmin");
        $sql->bindParam(':nombreAdmin', $datosModel);

        $sql->execute();

        return $sql->fetch();

        $sql->close();
    }

}
