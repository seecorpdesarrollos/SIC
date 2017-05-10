<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="editar" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit">
                    </i>
                    Editar Usuario
                </h5>
                <span aria-hidden="true">
                    ×
                </span>
            </div>
        </div>
    </div>
</div>
<div class="modal-body">
    <form method="post" onsubmit="return validarRegistro()">
        <?php 
            $edit = new Admin();
            $edit->
        editarUsuarioController(); 
 
            ?>
    </form>
</div>
<?php 
 
 $actualizar = new Admin();
 $actualizar->
actualizarUsuarioController();
 
 ?>
