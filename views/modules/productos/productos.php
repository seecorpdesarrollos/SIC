<?php session_start();
if (!$_SESSION["nombreAdmin"]) {
    header("location:ingreso");exit();
}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Sección de Productos
    </li>
</ol>
<?php if (isset($_GET['action'])) {

    if ($_GET['action'] == 'editadoProd') {
        echo '
<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Producto fue Editado correctamente al Sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=productos'/> ";
    }
    if ($_GET['action'] == 'okInventarios') {
        echo '<div id="oks"  class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Inventario fue agregado correctamente al sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=inventario'/> ";
    }
    if ($_GET['action'] == 'okProductos') {
        echo '<div id="oks"  class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Producto fue agregado correctamente al sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=productos'/> ";
    }
    if ($_GET['action'] == 'okProdDelete') {
        echo '
<div id="oks" class="alert alert-warning alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Prducto fue Borrado correctamente del sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=productos'/> ";
    }
}
?>
<div class="row">
<div class="col-md-2">
    <div class="list-group">
        <a href="productos"  class="list-group-item">
            <i  class="fa fa-list"></i> Listado
        </a>
        <a href="agragarproductos" class="list-group-item">
           <i  class="fa fa-edit"></i>  Nuevos
        </a>
        <a href="inventario" class="list-group-item">
           <i class="fa fa-stack-overflow" aria-hidden="true"></i> Inventario
        </a>
    </div>
</div>
<div class="col-md-10">
    <div class="card">
        <div class="card-block">
            <?php if (isset($_GET['action'])): ?>
            <?php if ($_GET['action'] == 'productos' or $_GET['action'] == 'okProductos' or $_GET['action'] == 'okProdDelete' or $_GET['action'] == 'editarProd' or $_GET['action'] == 'editadoProd'): ?>
            <h1 class="alert alert-warning text-center">
                Listado de Productos
            </h1>
            <table class="table table-bordered table-sm" id="tablas">
                <thead class="badge-primary text-white">
                    <tr>
                        <td>
                            Producto
                        </td>
                        <td>
                            Proveedor
                        </td>
                        <td>
                            Precio<span class="text-danger">(*)</span>
                        </td>
                        <td>
                            Categoría
                        </td>
                        <td>
                            Stock
                        </td>
                        <td>
                            Acciones
                        </td>
                    </tr>
                </thead>
                <?php $get = ProductosController::getProductosControllers();?>
                <?php foreach ($get as $key): ?>
                <tr>
                    <td class='tooltips' data-toggle='tooltip' data-placement='top' title='id Producto :<?php echo $key['idProducto'] ?>'  >
                        <?php echo $key['nombreProducto'] ?>
                    </td>
                    <td>
                        <?php echo $key['nombreProveedor'] ?>
                    </td>
                    <td>
                        $
                        <?php echo $key['precioProducto'] ?>
                    </td>
                    <td>
                        <?php echo $key['nombreCategoria'] ?>
                    </td>
                     <td align="center">
                        <?php echo $key['cantidadIngresada'] ?>
                    </td>
                    <td align="center">
                        <a href="index.php?action=editarProd&idProEdit=<?php echo $key['idProducto'] ?> ">
                            <i class="fa fa-edit btn btn-outline-primary btn-sm">
                            </i>
                        </a>
                        <a href="index.php?action=productos&idProd=<?php echo $key['idProducto'] ?> ">
                            <i class="fa fa-trash  btn btn-outline-danger btn-sm">
                            </i>
                        </a>
                    </td>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
</div>
<span class="text-danger">(*) <small>Es el Precio de Compra.</small></span>
<?php endif?>
<!-- Formulario de registro de los productos -->
<!-- ========================================== -->
<?php if ($_GET['action'] == 'agragarproductos'): ?>
<h1 class="alert alert-warning text-center">
    Agregar Productos
</h1>
<form method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="form">
                <label for="nombreCategorias">
                    Nombre Productos
                </label>
                <input type="text" class="form-control" id="nombreProductos" placeholder="Nombre del Producto"  name="nombreProducto" required=""/>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias">
                    Nombre Proveedor
                </label>
                <select style="width:356px;"  class="chosen-select"  name="idProveedor">
                    <option>
                        Elegir Proveedor
                    </option>
                    <?php $b = new ProveedoresController();
$b->getProveedoresSelectController();
?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias">
                    Precio Productos ($ 2.50 )
                </label>
                <input type="text" class="form-control" id="precioCategorias" placeholder="precio del Producto"  name="precioProducto" required=""/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias">
                    Nombre Cateroría
                </label>
                <select style="width:356px;"  class="chosen-select"  name="idCategoria">
                    <option>
                        Elegir Categorías
                    </option>
                    <?php $a = new categoriasController;
$a->getCategoriasSelectController();?>
                </select>
            </div>
        </div>
        <div class="center">
            <input type="submit" name="agragarpro" id="button" value="Agregar Productos" class="btn btn-outline-danger"/>
        </div>
    </form>
</div>
<?php endif?>
<!--  -->
<!-- Sección de inventarios -->
<?php if ($_GET['action'] == 'inventario' or $_GET['action'] == 'okInventarios'): ?>
<h1 class="alert alert-warning text-center">
    Seccion de Inventarios
</h1>
<?php require 'views/modules/modals/agregarInventario.php';?>
<div class="text-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarInventario">
      Agregar Stock
    </button>
</div>
<div class="tablas">

  <table class="table table-bordered table-sm" id="tablas">
      <thead class="bg-primary text-white">
          <tr>
              <th class="text-md-center">Nombre Producto</th>
              <th class="text-md-center">Cantidad Stock</th>
              <th class="text-md-center">Precio Venta</th>
          </tr>
      </thead>
      <?php $inv = ProductosController::getInventarioController();?>
      <?php foreach ($inv as $inventario): ?>
          <tr>
              <td class="text-md-center"><?php echo $inventario['nombreProducto'] ?></td>
              <td class="text-md-center"><?php echo $inventario['cantidadIngresada'] ?></td>
              <td class="text-md-center"><?php echo $inventario['precioVenta'] ?></td>
          </tr>
      <?php endforeach?>
  </table>
</div>
</div>
</div>
<?php endif?>
<?php endif?>
<?php
$re = new ProductosController();
$re->registroProductosController();
$re->agregarInventarioController();
$re->deleteProductosController();
$re->actualizarProductosController();
?>
