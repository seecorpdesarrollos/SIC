<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="editarCat" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit">
                    </i>
                    Editar Categoria
                </h5>
                <span aria-hidden="true">
                    ×
                </span>
            </div>
        </div>
    </div>
</div>
<div class="modal-body">
    <form method="post">
        <?php 
           $edit = new categoriasController();
           $edit->
        editarCategoriaController();
           
 
            ?>
    </form>
</div>
<?php 
 
 $actualizarCat = new categoriasController();
$actualizarCat->
actualizarCategoriaController();
 
 ?>
