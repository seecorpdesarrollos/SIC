<?php

session_start();

if(!$_SESSION["nombreAdmin"]){

	header("location:ingreso");

	exit();

}

?>

	<ol class="breadcrumb">
	  <li class="breadcrumb-item active">Sección Productos</li>
	</ol>
<?php 
	if (isset($_GET['action'])) {
   if ($_GET['action'] == 'okProductos') {
         echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Enorabuena!</strong>El Producto fue agregado correctamente al sistema.
      </div>';
       echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=productos'>";
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
		  <a href="productos"  class="list-group-item">Listado Productos</a>
		  <a href="agragarproductos" class="list-group-item">Productos Nuevos </a>
		</div>
 	</div>
 	<div class="col-md-9">
 	<?php if (isset($_GET['action'])): ?>
 		<?php if ($_GET['action'] == 'productos' OR $_GET['action'] == 'okProductos'  OR $_GET['action'] == 'Deletproductos' OR $_GET['action'] == 'editarProd' OR $_GET['action'] == 'editadoProd'): ?>
      <ol class="breadcrumb">
       <li class="breadcrumb-item active">Listado de Productos</li>
     </ol>
 			<table class="table table-striped table-sm" id="tablas">
 				<thead class="badge-warning actives">
 				<tr>
 						<td> Producto</td>
            <td> Proveedor</td>
            <td>Precio </td>
            <td>Categoría </td>
 						<td>Acciones</td>
 				</tr>	
 				</thead>
		 			<?php 
		 				$get = ProductosController::getProductosControllers();
		 			 ?>	
           <?php foreach ($get as $key): ?>
             <tr>
               <td><?php echo $key['nombreProducto'] ?></td>
               <td><?php echo $key['nombreProveedor'] ?></td>
               <td> $ <?php echo $key['precioProducto'] ?></td>
               <td><?php echo $key['nombreCategoria'] ?></td>
               <td align="center"><a href="index.php?action=editarCat&idEditar=<?php echo $key['idProducto']?>"><i class="fa fa-edit btn btn-outline-primary btn-sm"></i></a> <a href="index.php?action=categorias&id=<?php echo $key['idProducto']?>"><i class="fa fa-trash  btn btn-outline-danger btn-sm"></i></a>
               </td>
             </tr>
           <?php endforeach ?>
 			</table>
 		<?php endif ?>

    <!-- Formulario de registro de los productos -->
    <!-- ========================================== -->

 		<?php if ($_GET['action'] == 'agragarproductos'): ?>
      <ol class="breadcrumb">
       <li class="breadcrumb-item active">Agregar Productos</li>
     </ol>
        <form method="post" onsubmit="return validarCategorias()">
     <div class="row">  
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias">Nombre Productos</label>
          <input type="text" class="form-control" id="nombreProductos" placeholder="Nombre del Producto"  name="nombreProducto" required="">
        </div>
          <span id="cat"></span>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias">Nombre Proveedor</label>
          <select  class="form-control"  name="idProveedor">
           <option>Elegir Proveedor</option>
           <?php 
            $b= new ProveedoresController();
            $b->getProveedoresSelectController();
            ?>
         </select>
        </div>
      </div>
       <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias">Precio Productos ($ 2.50 )</label>
          <input type="text" class="form-control" id="precioCategorias" placeholder="precio del Producto"  name="precioProducto" required="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nombreCategorias">Nombre Cateroría</label>
           <select class="form-control" name="idCategoria">
             <option>Elegir Categorías</option>
             <?php $a=new categoriasController;
                  $a->getCategoriasSelectController(); ?>
            </select>
        </div>
      </div>
                <input type="submit" name="agragarpro" id="button" value="Agregar Productos" class="btn btn-outline-danger btn-block">         
        </form>
     </div>
 	</div>
 </div>
 		<?php endif ?>
 	<?php endif ?>

 
	<?php 
	$admin = new Admin();
	$admin->fecha();
  

  $re = new ProductosController();
  $re->registroProductosController();
	

	?>
