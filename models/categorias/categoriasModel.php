<?php 


// require_once "models/conexion.php";

 class categoriasModel{

 	static public function getCategoriasModel($tabla){

 		$sql = Conexion::conectar()->prepare("SELECT * ,COUNT(*) AS total FROM $tabla");
 		$sql->execute();
 		return $sql->fetchAll();

 		$sql->close();
 	}

 	static public function agregarCategoriasModel($datosModel,$tabla){
     
      $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCategoria)VALUES(:nombreCategoria)");
      $sql->bindParam(':nombreCategoria',$datosModel['nombreCategoria']);

      if ($sql->execute()) {
      	return 'success';
      }

      $sql->close();
      
 	}

 	static public function validarCategoriaModel($datosModel,$tabla){

      $sql = Conexion::conectar()->prepare("SELECT nombreCategoria FROM $tabla WHERE nombreCategoria = :nombreCategoria");
      $sql->bindParam(':nombreCategoria',$datosModel);

      $sql->execute();

      return $sql->fetch();

      $sql->close();
  }


 static public function deleteCategoriaModel($datosModel,$tabla){

 	$sql= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategoria = :idCategoria");
 	$sql->bindParam(':idCategoria',$datosModel);

 	if ($sql->execute()) {
 		return 'success';
 	}
 	$sql->close();
 }

  static public function editarcategoriaModel($datosModel,$tabla){
    $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idCategoria = :idCategoria");
    $sql->bindParam(":idCategoria",$datosModel);
    $sql->execute();

    return $sql->fetch();
    $sql->close();
   }

    static public function actualizarCategoriaModel($datosModel,$tabla){

     $sql = Conexion::conectar()->prepare("UPDATE $tabla SET nombreCategoria = :nombreCategoria WHERE idCategoria = :idCategoria");
     $sql->bindParam(':nombreCategoria',$datosModel['nombreCategoria']);
     $sql->bindParam(':idCategoria',$datosModel['idCategoria']);

     if($sql->execute()){
       return 'success';
     }else{
      return "Error";
     }
     $sql->close();
   }


 }