<?php

class categoriasController
{

    public function getCategoriasController()
    {

        $respuesta = categoriasModel::getCategoriasModel('categorias');
        foreach ($respuesta as $key) {
            echo '<tr>
             <td>' . $key['idCategoria'] . '</td>
             <td>' . $key['nombreCategoria'] . '</td>
             <td align="center"><a href="index.php?action=editarCat&idEditar=' . $key['idCategoria'] . '"><i class="fa fa-edit btn btn-outline-primary btn-sm"></i></a> <a href="index.php?action=categorias&id=' . $key['idCategoria'] . '"><i class="fa fa-trash  btn btn-outline-danger btn-sm"></i></a></td>
             </tr>';
        }
    }

    public function getCategoriasSelectController()
    {

        $respuesta = categoriasModel::getCategoriasModel('categorias');
        foreach ($respuesta as $key) {
            echo '
           <option value="' . $key['idCategoria'] . '">' . ucwords($key['nombreCategoria']) . ' </option>
         ';
        }
    }

    public function agregarCategoriasController()
    {
        if (isset($_POST['agragarCategorias'])) {
            $datosController = array('nombreCategoria' => $_POST['nombreCategoria']);

            $respuesta = categoriasModel::agregarCategoriasModel($datosController, 'categorias');

            if ($respuesta == 'success') {
                header('location:okCategorias');
            }
        }
    }

    public function validarCategoriaController($validarCategoria)
    {
        $datosController = $validarCategoria;
        $respuesta = categoriasModel::validarCategoriaModel($datosController, 'categorias');

        if ($respuesta) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function deleteCategoriaController()
    {

        if (isset($_GET['id'])) {
            $datosController = $_GET['id'];

            $respuesta = categoriasModel::deleteCategoriaModel($datosController, 'categorias');

            if ($respuesta == 'success') {

                header('location:DeletCategorias');
            }
        }
    }

    public static function editarCategoriaController()
    {
        $datosController = $_GET['idEditar'];

        $respuesta = categoriasModel::editarcategoriaModel($datosController, 'categorias');
        return $respuesta;

    }

    public function actualizarCategoriaController()
    {

        if (isset($_POST['editarCat'])) {
            $datosController = array('nombreCategoria' => $_POST['nombreCategoria'],
                'idCategoria' => $_POST['idCategoria'],
            );
            var_dump($datosController);
            $respuesta = categoriasModel::actualizarCategoriaModel($datosController, 'categorias');

            if ($respuesta == 'success') {

                header('location:editadoCat');
            }
        }
    }

}
