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
   if ($_GET['action'] == 'okCategorias') {
         echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong> La Categoria fue agregada correctamente.
      </div>';
       echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=categorias'>";
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
 	<div class="col-md-3">
 		<div class="list-group">
		  <a href="proveedores"  class="list-group-item">Listado Proveedores</a>
		  <a href="agragarproveedores" class="list-group-item">Proveedores Nuevos </a>
		</div>
 	</div>
 	<div class="col-md-9">
 	<?php if (isset($_GET['action'])): ?>
 		<?php if ($_GET['action'] == 'proveedores' OR $_GET['action'] == 'okproveedores'  OR $_GET['action'] == 'Deletproveedores' OR $_GET['action'] == 'editarProd' OR $_GET['action'] == 'editadoProd'): ?>
      <ol class="breadcrumb">
       <li class="breadcrumb-item active">Listado de Proveedores</li>
     </ol>
 			<table class="table table-striped table-sm" id="tablas">
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
		 				$p = new ProveedoresController();
            $p->getProveedoresController();
		 			 ?>	
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
          <label for="nombreCategorias">Nombre Productos</label>
          <input type="text" class="form-control" id="nombreProductos" placeholder="Nombre del Producto"  name="nombreCategoria" required="">
        </div>
          <span id="cat"></span>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias">Nombre Proveedor</label>
          <select  class="form-control"  required>
           <option>Elegir Proveedor</option>
           <option></option>
         </select>
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias">Precio Productos ($ 2.50 )</label>
          <input type="text" class="form-control" id="precioCategorias" placeholder="precio del Producto"  name="precioProductos" required="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias">Nombre Cateroría</label>
           <select class="form-control">
             <option>Elegir Categorías</option>
             <?php 
                $a=new categoriasController;
                $a->getCategoriasSelectController();
               ?>
            </select>
        </div>
      </div>
                <input type="submit" name="agragarproductos" id="button" value="Agregar Productos" class="btn btn-outline-danger btn-block">         
        </form>
     </div>
 	</div>
 </div>
 		<?php endif ?>
 	<?php endif ?>

 
	<?php 
	$admin = new Admin();
	$admin->fecha();

	

	?>
