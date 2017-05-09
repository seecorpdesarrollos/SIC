<?php

session_start();

if(!$_SESSION["nombreAdmin"]){

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
         echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong>El Proveedor fue correctamente al sistema.
      </div>';
       echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=proveedores'>";
   }
   if ($_GET['action'] == 'editadoCat') {
         echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> La Categoria fue Editada correctamente al Sistema.
      </div>';
       echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=categorias'>";
   }
   if ($_GET['action'] == 'DeletCategorias') {
         echo '<div id="ok" class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> La Categoria fue Borrada correctamente del sistema.
      </div>';
       echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=categorias'>";
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
    <?php if ($_GET['action'] == 'proveedores' OR $_GET['action'] == 'okproveedores'  OR $_GET['action'] == 'Deletproveedores' OR $_GET['action'] == 'okProv' OR $_GET['action'] == 'editadoProd'): ?>
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
           <?php foreach ($p as $key ): ?>    
           <tr>
             <td  align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='Apellido  : <?php echo $key['apellidoProveedor']?>'><?php echo $key['nombreProveedor']?></td>
             <td><?php echo $key['nombreEmpresa']?></td>
             <td><?php echo $key['telefonoProveedor']?></td>
             <td><?php echo $key['direccionProveedor']?></td>
              <td align='center' class='tooltips' data-toggle='tooltip' data-placement='top' title='Provincia  : <?php echo $key['nombreProvincia']?>'><?php echo $key['nombreCiudad']?></td>
             <td align="center"><a href="index.php?action=editarCat&idEditar='.$key['idProveedor'].'"><i class="fa fa-edit btn btn-outline-primary btn-sm"></i></a> <a href="index.php?action=categorias&id='.$key['idProveedor'].'"><i class="fa fa-trash  btn btn-outline-danger btn-sm"></i></a>
             </td>
           </tr>
           <?php endforeach ?>
 			</table>

 		<?php endif ?>

    <!-- Seccion de ingreso a Formulario de nuevos registros de proveedores -->
 
 		<?php if ($_GET['action'] == 'agragarproveedores'): ?>
      <ol class="breadcrumb">
       <li class="breadcrumb-item active">Agregar Productos</li>
     </ol>
        <form method="post" onsubmit="return validarCategorias()">
     <div class="row">  
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Nombre Proveedor</label>
          <input type="text" class="form-control" id="nombreProveedor" placeholder="Nombre del Proveedor"  name="nombreProveedor" required="">
        </div>
          <span id="prov"></span>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias" class=text-primary>Nombre Ciudad</label>
         <select style="width:422px;"  class="chosen-select" name="idCiudad">
         <option>Elegir ciudad</option>
             <?php 
                $a =  ProveedoresController::getCiudadController()
               ?>
               <?php foreach ($a as $key ): ?>
                 <option value="<?php echo $key['idCiudad'] ?>"><?php echo $key['nombreCiudad']. ' /' .$key['nombreProvincia'] ?></option>
               <?php endforeach ?>
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
        <div class="form-group">
          <label for="nombreCategorias" class="text-primary">Nombre Empresa</label>
          <input type="text" class="form-control" id="nombreEmpresa" placeholder="Nombre del la Empresa"  name="nombreEmpresa" required="">
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
                <input type="submit" name="agragarProveedor" id="button" value="Agregar Productos" class="btn btn-outline-danger center">         
        </form>
     </div>
 	</div>

    <?php endif ?>
  <?php endif ?>
 </div>
 </div>

 
	<?php 
	$admin = new Admin();
	$admin->fecha();

	$agr = new ProveedoresController();
  $agr->agregarProveedorController();

	?>
