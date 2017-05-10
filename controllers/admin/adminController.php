<?php

class Admin
{

    public function getAdminController()
    {

        $respuesta = AdminModel::getAdminModel('administrador');
        foreach ($respuesta as $key) {
            $fecha = date('d-m-Y', strtotime($key->fechaCreado));
            echo "<tr>
          <td align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='fecha de creado : $fecha'>$key->nombreAdmin</td>
          <td align='center'>$key->password</td>
          <td align='center'>$key->rol</td>
          <td align='center'><a href='index.php?action=editar&idEditar=$key->idAdmin'><i class='fa fa-edit btn btn-outline-primary btn-sm'></i></a> &nbsp;<a href='index.php?action=delete&id=$key->idAdmin'><i class='fa fa-trash  btn btn-outline-danger btn-sm'></i></a></td>
        </tr>";
        }
    }

    public function getAdminControllerUsuario()
    {
        $id = $_SESSION['idAdmin'];
        $respuesta = AdminModel::getAdminModelUsuario('administrador', $id);
        foreach ($respuesta as $key) {
            $fecha = date('d-m-Y', strtotime($key->fechaCreado));
            $usuario = $key->rol;
            $usuario = 'USUARIO';
            echo "<tr>
          <td align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='fecha de creado : $fecha'>$key->nombreAdmin</td>
          <td align='center'>$key->password</td>
          <td align='center'>$usuario</td>
        </tr>";
        }
    }

    public function fecha()
    {
        $id = $_SESSION['idAdmin'];
        $respuesta = AdminModel::fecha('administrador', $id);

        $hoy = date('Y-m-d');
        if ($hoy >= $respuesta->cambiar) {
            // echo "cambie el password";
            require 'views/modules/modals/cambiarPass.php';
        }
    }

    public function cambiarPassworController()
    {
        if (isset($_POST['aceptar'])) {

            $datosController = array('idAdmin' => $_POST['idAdmin'],
                'password' => $_POST['password'],
                'fechaCreado' => $_POST['fechaCreado'],
            );
            $respuesta = AdminModel::cambiarPassworModel($datosController, 'administrador');

            if ($respuesta == 'seccess') {
                header('location:cambio');
            } else {
                echo "Error";
            }
        }
    }

    public function agregarUsuariosController()
    {
        if (isset($_POST['agregar'])) {

            $datosController = array('nombreAdmin' => $_POST['nombreAdmin'],
                'password' => $_POST['password'],
                'rol' => $_POST['rol'],
                'fechaCreado' => $_POST['fechaCreado'],
            );
            // var_dump($datosController);
            $respuesta = AdminModel::agregarUsuariosModel($datosController, 'administrador');

            if ($respuesta == 'success') {
                header('location:agregado');
            } else {
                echo "Error";
            }
        }
    }

    public function deleteUsuarioController()
    {
        if (isset($_GET['id'])) {
            $datosController = $_GET['id'];
            $respuesta = AdminModel::deleteUsuarioModel($datosController, 'administrador');

            if ($respuesta == 'success') {

                header('location:delet');
            }
        }
    }

    public function editarUsuarioController()
    {
        $datosController = $_GET['idEditar'];

        $respuesta = AdminModel::editarUsuarioModel($datosController, 'administrador');
        echo '
             <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nombre Usuario:</label>
            <input type="text" class="form-control" id="recipient-name" name="nombreAdmin" value="' . $respuesta['nombreAdmin'] . '">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Password Usuario:</label>
            <input type="password" class="form-control" id="contra" name="password" value="' . $respuesta['password'] . '">
            <span id="pass"></span>
          </div>
          <label for="recipient-name" class="form-control-label">Tipo Usuario:</label>
          <select class="form-control" name="rol">
            <option value="' . $respuesta['rol'] . '">' . $respuesta['rol'] . '</option>
            <option value="A">ADMISTRADOR</option>
            <option value="U">USUARIO</option>

            <input type="hidden"name=" idAdmin" value="' . $respuesta['idAdmin'] . '">
          </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="no" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="editarUsuario">Editar Usuario</button>
           ';
    }

    public function actualizarUsuarioController()
    {

        if (isset($_POST['editarUsuario'])) {
            $datosController = array('nombreAdmin' => $_POST['nombreAdmin'],
                'password' => $_POST['password'],
                'rol' => $_POST['rol'],
                'idAdmin' => $_POST['idAdmin'],
            );
            $respuesta = AdminModel::actualizarUsuarioModel($datosController, 'administrador');

            if ($respuesta == 'success') {

                header('location:editado');
            }
        }
    }

    public function validarUsuarioController($validarUsuario)
    {
        $datosController = $validarUsuario;
        $respuesta = AdminModel::validarUsuarioModel($datosController, 'administrador');

        if ($respuesta) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function imprimirController($datos)
    {
        $datosController = $datos;

        $respuesta = AdminModel::imprimirModel($datosController);
        return $respuesta;
    }

}
