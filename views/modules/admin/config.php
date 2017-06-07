<?php session_start();
if (!isset($_SESSION['nombreAdmin'])) {
    header('location:ingreso');exit();
} else if ($_SESSION['rol'] !== 'A') {
    header('location:inicioUs');
    exit();
}
require 'views/modules/modals/verClientesNoActivos.php';?>
<ol class="breadcrumb">
  <li class="breadcrumb-item active animated fadeInRight">Listado de Usuarios del Sistema</li>
</ol>
<!-- <button class="btn btn-outline-success" data-target="#ingresar" data-toggle="modal" type="button">
    Agragar nuevo Usuario
</button> -->
<div class="btn-group float-lg-right" role="group" aria-label="Basic example">
    <button class="btn btn-outline-danger" data-target="#verClienteNoActivo" data-toggle="modal" type="button"">
        <i class="fa fa-edit"></i> Clientes no Activos
    </button>
<button class="btn btn-outline-danger" data-target="#ingresar" data-toggle="modal" type="button"">
        <i class="fa fa-edit"></i> Agragar Usuario
    </button>
    <a href="tcpdf/pdf/administradores.php" target="blank">
       <button type="button" class="btn btn-outline-danger">
            <i class="fa fa-print"></i> Imprimir
        </button>
    </a>
</div>
<br>
<br>
<?php require 'views/modules/modals/nuevoAdmin.php';?>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'cambio') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> Has cambiado correctamente su contraseña anterior.
      </div>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=config'>";
    }
    if ($_GET['action'] == 'agregado') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> Has agregado un usuario nuevo al sistema.
      </div>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=config'>";
    }
    if ($_GET['action'] == 'editado') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong>El usuario fue  editado correctamente  al sistema.
      </div>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=config'>";
    }
    if ($_GET['action'] == 'delet') {
        echo '<div id="oks" class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> Has borrado un usuario del sistema.
      </div>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=config'>";

    }
}
?>
<div class="row">
  <div class="col-lg-12">
    <div class="" id="tabla" >
      <table class="table table-bordered table-sm ta" id="tablas">
            <thead class="bg-info">
              <tr>
                <td align="center">Nombre Admin</td>
                <td align="center">Contraseña</td>
                <td align="center">Tipo Admin</td>
                <td align="center">Acciones</td>
              </tr>
            </thead>
        <tbody>
          <?php
if (isset($_SESSION['nombreAdmin'])) {
    if ($_SESSION['nombreAdmin'] == 'admin') {

        $admin = new Admin();
        $admin->getAdminController();

        $admin->deleteUsuarioController();

    } else {
        $admin = new Admin();
        $admin->getAdminControllerUsuario();

    }
}
?>
        </tbody>
        </table>

    </div>
   </div>
</div>