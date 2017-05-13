<?php session_start();if (!$_SESSION["nombreAdmin"]) {header("location:ingreso");exit();}?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Sección Productos
    </li>
</ol>
<?php if (isset($_GET['action'])) {if ($_GET['action'] == 'okProductos') {echo '  <div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
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
    if ($_GET['action'] == 'editadoCat') {
        echo '
<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La Categoria fue Editada correctamente al Sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=categorias'/> ";
    }
    if ($_GET['action'] == 'DeletCategorias') {
        echo '
<div id="ok" class="alert alert-warning alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">
        &times;
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La Categoria fue Borrada correctamente del sistema.
</div>
';
        echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=categorias'/> ";
    }
}
?>
<div class="row">
<div class="col-md-3">
    <div class="list-group">
        <a href="productos"  class="list-group-item">
            Listado Productos
        </a>
        <a href="agragarproductos" class="list-group-item">
            Productos Nuevos
        </a>
        <a href="inventario" class="list-group-item">
            Inventario
        </a>
    </div>
</div>
<div class="col-md-9">
    <div class="card">
        <div class="card-block">
            <?php if (isset($_GET['action'])): ?>
            <?php if ($_GET['action'] == 'productos' or $_GET['action'] == 'okProductos' or $_GET['action'] == 'Deletproductos' or $_GET['action'] == 'editarProd' or $_GET['action'] == 'editadoProd'): ?>
            <h1 class="alert alert-warning text-center">
                Listado de Productos
            </h1>
            <table class="table table-striped table-sm" id="tablas">
                <thead class="badge-warning actives">
                    <tr>
                        <td>
                            Producto
                        </td>
                        <td>
                            Proveedor
                        </td>
                        <td>
                            Precio
                        </td>
                        <td>
                            Categoría
                        </td>
                        <td>
                            Acciones
                        </td>
                    </tr>
                </thead>
                <?php $get = ProductosController::getProductosControllers();?>
                <?php foreach ($get as $key): ?>
                <tr>
                    <td>
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
                        <a href="index.php?action=editarCat&idEditar=  <?php echo $key['idProducto'] ?> ">
                            <i class="fa fa-edit btn btn-outline-primary btn-sm">
                            </i>
                        </a>
                        <a href="index.php?action=categorias&id=  <?php echo $key['idProducto'] ?> ">
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
$b->
    getProveedoresSelectController();
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
$a->
    getCategoriasSelectController();?>
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
<?php if ($_GET['action'] == 'inventario'): ?>
<h5 class="alert alert-warning text-center">
    Seccion de Inventarios
</h5>
<form method="post" >
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias" class=text-primary>
                   Nombre Productos
                </label>
                <select style="width:378px;"  class="chosen-select" name="idProducto">
                    <option>
                        Elegir Producto
                    </option>
                    <?php $a = ProductosController::getProductosControllers();?>
                    <?php foreach ($a as $key): ?>
                    <option value=" <?php echo $key['idProducto'] ?> ">
                        <?php echo $key['nombreProducto'] . ' -- ' . $key['nombreEmpresa'] ?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cantidadIngresada" class="text-primary">
                    Cantidad de Unidades
                </label>
                <input type="number" class="form-control" id="cantidadIngresada" placeholder="Cantidad de Unidades"  name="cantidadIngresada" required=""/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="precioVenta" class="text-primary">
                    Precio de Venta
                </label>
                <input type="number" class="form-control" id="precioVenta" placeholder="Precio de Venta"  name="precioVenta" required=""/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="precioVenta" class="text-primary">
<br>
                </label>
                <input type="submit" class="btn btn-outline-danger btn-block"  name="agregarInventario" />
            </div>
        </div>
    </div>
</form>
</div>
</div>
<?php endif?>
<?php endif?>
<?php $admin = new Admin();
$admin->
    fecha();
$re = new ProductosController();
$re->registroProductosController();
$re->agregarInventarioController();
?>
