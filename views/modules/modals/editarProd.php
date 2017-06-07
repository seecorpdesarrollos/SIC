<!-- Modal Editar Productos -->

<div class="modal fade bd-example-modal-lg" id="editarProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto <?php echo $key['nombreProducto'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php $editarProd = ProductosController::editarProductosController();?>
<?php foreach ($editarProd as $key): ?>

		<form method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="form">
                <label for="nombreCategorias">
                    Nombre Productos
                </label>
                <input type="text" class="form-control" id="nombreProductos"   name="nombreProducto" value="<?php echo $key['nombreProducto'] ?>"/>
            </div>
            <span id="pro">
            </span>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias">
                    Nombre Proveedor
                </label>
                <select  class="form-control"  name="idProveedor">
                    <option value="<?php echo $key['idProveedor'] ?>"><?php echo $key['nombreEmpresa'] ?></option>
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
                <input type="text" class="form-control" id="precioCategorias" placeholder="precio del Producto"  name="precioProducto" value="<?php echo $key['precioProducto'] ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias">
                    Nombre Cateroría
                </label>
                <select  class="form-control"  name="idCategoria">
                       <option value="<?php echo $key['idCategoria'] ?>"><?php echo $key['nombreCategoria'] ?></option>
                    <?php $a = new categoriasController;
$a->getCategoriasSelectController();?>
                </select>
            </div>
        </div>
        <input type="hidden" name="idProducto" value="<?php echo $key['idProducto'] ?>">
        <div class="center">
            <input type="submit" name="editarProd" id="button" value="Agregar Productos" class="btn btn-outline-danger"/>
        </div>
    </form>

       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary " data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach?>
