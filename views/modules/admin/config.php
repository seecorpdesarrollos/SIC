<ol class="breadcrumb">
  <li class="breadcrumb-item active animated fadeInRight">Listado de Usuarios del Sistema</li>
</ol>
<center>
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#ingresar">
   Agragar nuevo Usuario
  </button>
</center><br>
<?php require 'views/modules/modals/nuevoAdmin.php'; ?>
<?php 
  if (isset($_GET['action'])) {
   if ($_GET['action'] == 'cambio') {
         echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> Has cambiado correctamente su contraseña anterior.
      </div>';
         echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=config'>";
   }
   if ($_GET['action'] == 'agregado') {
         echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> Has agregado un usuario nuevo al sistema.
      </div>';
         echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=config'>";
   }
    if ($_GET['action'] == 'editado') {
         echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong>El usuario fue  editado correctamente  al sistema.
      </div>';
         echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=config'>";
   }

    if ($_GET['action'] == 'delet') {
         echo '<div id="ok" class="alert alert-warning alert-dismissible fade show" role="alert">
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
             if ($_SESSION['nombreAdmin']  == 'admin') {
             
            $admin = new Admin();
            $admin->getAdminController();
            $admin->fecha();
            $admin->deleteUsuarioController();
             
          }else{
              $admin = new Admin();
              $admin->getAdminControllerUsuario();
              $admin->fecha();
          }
         } 
           ?>
        </tbody>
        </table>
        
    </div>
   </div>
</div>
 

