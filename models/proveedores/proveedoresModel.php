<?php 

require_once 'models/conexion.php';
 class ProveedoresModel{


 	static public function getProveedoresModel($tabla){
      
      $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla pro 
      	JOIN ciudad ciu ON pro.idCiudad = ciu.idCiudad
      	JOIN provincia prov ON ciu.idProvincia = prov.idProvincia
      	");
      $sql->execute();
      return $sql->fetchAll();

      $sql->close();
 	} 
 }