<?php

session_start();

if (!$_SESSION["nombreAdmin"]) {

    header("location:ingreso");

    exit();

}

?>

  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Sección de Proveedores</li>
  </ol>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okProv') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong>El Proveedor fue correctamente al sistema.
      </div>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=proveedores'>";
    }
    if ($_GET['action'] == 'okProvEdit') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> El proveedor fue Editado correctamente al Sistema.
      </div>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=proveedores'>";
    }
    if ($_GET['action'] == 'Deletproveedores') {
        echo '<div id="oks" class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> El Proveedor fue Borrado correctamente del sistema.
      </div>';
        echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=proveedores'>";
    }
}
?>
 <div class="row">
  <div class="col-md-2">
    <div class="list-group">
      <a href="proveedores"  class="list-group-item"><i class="fa fa-list-alt"> </i>  Listado</a>
      <a href="agragarproveedores" class="list-group-item"><i class="fa fa-edit"> </i>  Nuevos </a>
    </div>
  </div>
  <div class="col-md-10">
<div class="card">
 <div class="card-block">
  <?php if (isset($_GET['action'])): ?>
    <?php if ($_GET['action'] == 'proveedores' or $_GET['action'] == 'okproveedores' or $_GET['action'] == 'Deletproveedores' or $_GET['action'] == 'okProv' or $_GET['action'] == 'okProvEdit'): ?>
      <h1 class="alert alert-warning text-center">Listado de Proveedores</h1>
      <table class="table table-bordered table-sm" id="tablas">
        <thead class="badge-warning actives">
        <tr>
            <td>Nombre</td>
            <td>Empresa</td>
            <td>Teléfono </td>
            <td>Direción </td>
            <td>Ubicacíon </td>
            <td>Acciones</td>
        </tr>
        </thead>
          <?php
$p = ProveedoresController::getProveedoresController();
?>
           <?php foreach ($p as $key): ?>
           <tr>
             <td  align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='Apellido  : <?php echo $key['apellidoProveedor'] ?>'><?php echo $key['nombreProveedor'] ?></td>
             <td><?php echo $key['nombreEmpresa'] ?></td>
             <td><?php echo $key['telefonoProveedor'] ?></td>
             <td><?php echo $key['direccionProveedor'] ?></td>
              <td align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='Provincia  : <?php echo $key['nombreProvincia'] ?>'><?php echo $key['nombreCiudad'] ?></td>

             <td align="center"><a href="index.php?action=editarProv&idEditProv=<?php echo $key['idProveedor'] ?>"><i class="fa fa-edit btn btn-outline-primary btn-sm"></i></a> <a href="index.php?action=proveedores&idProv=<?php echo $key['idProveedor'] ?>"><i class="fa fa-trash  btn btn-outline-danger btn-sm"></i></a>
             </td>
           </tr>
           <?php endforeach?>
      </table>

    <?php endif?>

    <!-- Seccion de ingreso a Formulario de nuevos registros de proveedores -->

    <?php if ($_GET['action'] == 'agragarproveedores'): ?>
      <h1 class="alert alert-warning text-center">Agregar Proveedores</h1>
        <form method="post" onsubmit="return validarCategorias()">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Nombre Proveedor</label>
          <input type="text" class="form-control" id="nombreProveedor" placeholder="Nombre del Proveedor"  name="nombreProveedor" required="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class=text-primary>Nombre Ciudad</label>
         <select style="width:422px;"  class="chosen-select" name="idCiudad">
         <option>Elegir ciudad</option>
             <?php
$a = ProveedoresController::getCiudadController()
?>
               <?php foreach ($a as $key): ?>
                 <option value="<?php echo $key['idCiudad'] ?>"><?php echo $key['nombreCiudad'] . ' /' . $key['nombreProvincia'] ?></option>
               <?php endforeach?>
            </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Apellido Proveedor</label>
          <input type="text" class="form-control" id="apellidoProveedor" placeholder="Apellido del Proveedor"  name="apellidoProveedor" required="">
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group" id="form">
          <label for="nombreCategorias" class="text-primary">Nombre Empresa</label>
          <input type="text" class="form-control" id="nombreEmpresa" placeholder="Nombre del la Empresa"  name="nombreEmpresa" required="">
          <span id="prove"></span>
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Telefono Contacto</label>
          <input type="text" class="form-control" id="telefonoProveedor" placeholder="Teléfono del la Empresa"  name="telefonoProveedor" required="">
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Direción Proveedor</label>
          <input type="text" class="form-control" id="direccionProveedor" placeholder="dirección del la Empresa"  name="direccionProveedor" required="">
        </div>
      </div>
                <input type="submit" name="agragarProveedor" id="button" value="Agregar Proveedor" class="btn btn-outline-danger center" id="button">
        </form>
     </div>
  </div>

    <?php endif?>


     <!-- Seccion de ingreso a Formulario para editar proveedores -->
     <!----------------------------------------------------------- -->
<?php $editarProv = ProveedoresController::editarProveedoresController();?>
    <?php if ($_GET['action'] == 'editarProv'): ?>
      <h3 class="alert alert-warning text-center">Editar Proveedores</h3>
        <form method="post">
     <div class="row">
      <div class="col-md-6">
      <?php foreach ($editarProv as $key): ?>

        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Nombre Proveedor</label>
          <input type="text" class="form-control" id="nombreProveedor" placeholder="Nombre del Proveedor"  name="nombreProveedor" value="<?php echo $key['nombreProveedor'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class=text-primary>Nombre Ciudad</label>
         <select style="width:422px;"  class="chosen-select" name="idCiudad">
         <option value="<?php echo $key['idCiudad'] ?>"><?php echo $key['nombreCiudad'] ?></option>
             <?php
$a = ProveedoresController::getCiudadController()
?>
               <?php foreach ($a as $row): ?>
                 <option value="<?php echo $row['idCiudad'] ?>"><?php echo $row['nombreCiudad'] . ' /' . $row['nombreProvincia'] ?></option>
               <?php endforeach?>
            </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Apellido Proveedor</label>
          <input type="text" class="form-control" id="apellidoProveedor" placeholder="Apellido del Proveedor"  name="apellidoProveedor" value="<?php echo $key['apellidoProveedor'] ?>">
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group" id="form">
          <label for="nombreCategorias" class="text-primary">Nombre Empresa</label>
          <input type="text" class="form-control" id="nombreEmpresa" placeholder="Nombre del la Empresa"  name="nombreEmpresa" value="<?php echo $key['nombreEmpresa'] ?>">
          <span id="prove"></span>
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Telefono Contacto</label>
          <input type="text" class="form-control" id="telefonoProveedor" placeholder="Teléfono del la Empresa"  name="telefonoProveedor" value="<?php echo $key['telefonoProveedor'] ?>">
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Direción Proveedor</label>
          <input type="text" class="form-control" id="direccionProveedor" placeholder="dirección del la Empresa"  name="direccionProveedor" value="<?php echo $key['direccionProveedor'] ?>">
        </div>
      </div>
      <input type="hidden" name="idProveedor" value="<?php echo $key['idProveedor'] ?>">
                <input type="submit" name="editarProveedor" id="button" value="Editar Proveedor" class="btn btn-outline-danger center" id="button">
        </form>
     </div>
  </div>

      <?php endforeach?>
    <?php endif?>
  <?php endif?>
 </div>
 </div>


  <?php
$agr = new ProveedoresController();
$agr->agregarProveedorController();
$agr->actualizarProveedorController();
$agr->deleteProveedoresController();
?>
