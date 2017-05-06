<?php

session_start();

if(!$_SESSION["nombreAdmin"]){

	header("location:ingreso");

	exit();

}

?>

	<ol class="breadcrumb">
	  <li class="breadcrumb-item active">Sección Categorías</li>
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
 	<div class="col-md-4">
 		<div class="list-group">
		  <a href="categorias"  class="list-group-item">Listado Categorías</a>
		  <a href="agragarCategorias" class="list-group-item">Agregar Categorías Nuevas </a>
		</div>
 	</div>
 	<div class="col-md-8">
 	<?php if (isset($_GET['action'])): ?>
 		<?php if ($_GET['action'] == 'categorias' OR $_GET['action'] == 'okCategorias'  OR $_GET['action'] == 'DeletCategorias' OR $_GET['action'] == 'editarCat' OR $_GET['action'] == 'editadoCat'): ?>
      <ol class="breadcrumb">
       <li class="breadcrumb-item active">Listado de Categorías</li>
     </ol>
 			<table class="table table-striped table-sm" id="tablas">
 				<thead class="bg-inverse">
 				<tr>
 						<td>Id Categorias</td>
 						<td>Nombre Categoría</td>
 						<td>Acciones</td>
 				</tr>	
 				</thead>
		 			<?php 
		 				$datos = new categoriasController();
		 				$datos->getCategoriasController();
		 			  $datos->deleteCategoriaController();
		 			 ?>	
 			</table>
 		<?php endif ?>

 		<?php if ($_GET['action'] == 'agragarCategorias'): ?>
      <ol class="breadcrumb">
       <li class="breadcrumb-item active">Agregar Categorías</li>
     </ol>
 			<form method="post" onsubmit="return validarCategorias()">
               <div class="form-group">
			    <label for="nombreCategorias">Nombre Categorías</label>
			    <input type="text" class="form-control" id="nombreCategorias" placeholder="Nombre de Categoría" required="" name="nombreCategoria">
			    <input type="hidden" name="">
			    <span id="cat"></span>
			  </div>
			  <input type="submit" name="agragarCategorias" id="button" value="Agregar Categorías" class="btn btn-outline-danger btn-block"> 				
 			</form>
 	</div>
 </div>
 		<?php endif ?>
 	<?php endif ?>

 
	<?php 
	$admin = new Admin();
	$admin->fecha();

	$cat = new categoriasController();
	$cat->agregarCategoriasController();

	?>
