<div class="modal fade bd-example-modal-lg" id="agregarInventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sección Inventario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="post" >
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreCategorias" class=text-primary>
                   Nombre Productos <small class="text-gray-dark">(Opcinal)</small>
                </label>
                <select class="form-control" name="idProducto" id="idProducto">
                    <option>
                        Elegir Producto
                    </option>
                    <?php $a = ProductosController::getProductosControllers();?>
                    <?php foreach ($a as $key): ?>
                    <option value=" <?php echo $key['idProducto'] . ' / ' . $key['cantidadIngresada'] ?> ">
                        <?php echo $key['nombreProducto'] ?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cantidadIngresada" class="text-primary">
                    Cantidad de Unidades <small class="text-gray-dark">(Obligatorio)</small>
                </label>
                <input type="number" class="form-control" id="cantidadIngresada" placeholder="Cantidad de Unidades"  name="cantidadIngresada" required=""/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="precioVenta" class="text-primary">
                    Precio de Venta <small class="text-gray-dark">(Opcinal)</small>
                </label>
                <input type="text" class="form-control" id="precioVenta" placeholder="Precio de Venta"  name="precioVenta" />
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
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


