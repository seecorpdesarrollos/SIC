<?php 



 class ProveedoresController{
   

    public function getProveedoresController(){
    	$respuesta = ProveedoresModel::getProveedoresModel('proveedores');

    	foreach ($respuesta as $key) {
    	  echo '<tr>
             <td>'.$key['nombreProveedor'].'</td>
             <td>'.$key['nombreEmpresa'].'</td>
             <td>'.$key['telefonoProveedor'].'</td>
             <td>'.$key['direccionProveedor'].'</td>
             <td>'.$key['nombreCiudad'].'<br>'. $key['nombreProvincia'].'</td>
             <td align="center"><a href="index.php?action=editarCat&idEditar='.$key['idProveedor'].'"><i class="fa fa-edit btn btn-outline-primary btn-sm"></i></a> <a href="index.php?action=categorias&id='.$key['idProveedor'].'"><i class="fa fa-trash  btn btn-outline-danger btn-sm"></i></a>
             </td>
           </tr>';
    	}
    }

     public function getProveedoresSelectController(){
    	$respuesta = ProveedoresModel::getProveedoresModel('proveedores');

    	foreach ($respuesta as $key) {
    	  echo '
            <option value="'.$key['idProveedor'].'">'. ucwords($key['nombreProveedor']).'  /  '. ucwords($key['nombreEmpresa']).' </option>
    	  ';
    	}
    }
 }