<ol class="breadcrumb">
    <li class="breadcrumb-item active animated fadeInRight">
        Listado de Usuarios del Sistema
    </li>
</ol>
<!-- <button class="btn btn-outline-success" data-target="#ingresar" data-toggle="modal" type="button">
    Agragar nuevo Usuario
</button> -->
<div class="btn-group float-lg-right" role="group" aria-label="Basic example">
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
<?php if (isset($_GET['action'])) {if ($_GET['action'] == 'cambio') {echo ' <div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
Has cambiado correctamente su contraseña anterior.
</br>
';
    echo '
<meta content="4; URL = config" http-equiv="Refresh"/>
';
}
    if ($_GET['action'] == 'agregado') {
        echo '
<div class="alert alert-success alert-dismissible fade show" id="ok" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
Has agregado un usuario nuevo al sistema.
</div>
';
        echo '
<meta content="4; URL = config" http-equiv="Refresh"/>
';
    }
    if ($_GET['action'] == 'editado') {
        echo '
<div class="alert alert-success alert-dismissible fade show" id="ok" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El usuario fue  editado correctamente  al sistema.
</div>
';
        echo '
<meta content="4; URL = config" http-equiv="Refresh"/>
';
    }
    if ($_GET['action'] == 'delet') {
        echo '
<div class="alert alert-warning alert-dismissible fade show" id="ok" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
Has borrado un usuario del sistema.
</div>
';
        echo '
<meta content="4; URL = config" http-equiv="Refresh"/>
';
    }
}
?>
<div class="row">
<div class="col-lg-12">
    <div class="" id="tabla">
        <table class="table table-bordered table-sm ta" id="tablas">
            <thead class="bg-info">
                <tr>
                    <td align="center">
                        Nombre Admin
                    </td>
                    <td align="center">
                        Contraseña
                    </td>
                    <td align="center">
                        Tipo Admin
                    </td>
                    <td align="center">
                        Acciones
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION['nombreAdmin'])) {if ($_SESSION['nombreAdmin'] == 'admin') {$admin = new Admin();
    $admin->
        getAdminController();
    $admin->
        fecha();
    $admin->
        deleteUsuarioController();
} else {
    $admin = new Admin();
    $admin->
        getAdminControllerUsuario();
    $admin->
        fecha();
}
}
?>
            </tbody>
        </table>
    </div>
</div>
</div>
