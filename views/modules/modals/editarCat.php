<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="editarCat" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit">
                    </i>
                    Editar Categorias
                </h5>
                <span aria-hidden="true">
                    ×
                </span>
            </div>
 <div class="modal-body">
    <form method="post">
        <?php $cat = categoriasController::editarCategoriaController();?>
         <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nombre Usuario:</label>
          <?php foreach ($cat as $resp): ?>
            <input type="text" class="form-control" id="recipient-name" name="nombreCategoria" value=" <?php echo $resp['nombreCategoria'] ?> ">
          </div>
            <input type="hidden" name="idCategoria" value="<?php echo $resp['idCategoria']; ?>">
          <?php endforeach?>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="editarCat">Editar Categoría</button>
        </div>
    </form>
        </div>
 </div>
    </div>
</div>
<?php

$actualizarCat = new categoriasController();
$actualizarCat->actualizarCategoriaController();

?>
