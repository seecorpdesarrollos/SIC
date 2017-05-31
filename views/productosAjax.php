<?php

require_once '../models/conexion.php';

$nombreProducto = $_GET['producto'];

$sql = Conexion::conectar()->prepare("SELECT * FROM inventario WHERE idProducto = '$nombreProducto' LIMIT 1");
if ($sql->execute()) {

    $prod = $sql->fetch(PDO::FETCH_OBJ);
    $prod->status = 200;
    $prod->nombre = $nombreProducto;
    echo json_encode($prod);
}
