<?php

require_once "models/conexion.php";

class IngresoModels{

	static public function ingresoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombreAdmin = :nombreAdmin");

		$stmt -> bindParam(":nombreAdmin", $datosModel["nombreAdmin"], PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	static public function intentosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE nombreAdmin =:nombreAdmin");

		$stmt -> bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombreAdmin", $datosModel["nombreAdminActual"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}

		else{

			return "error";
		}

	}

	

}