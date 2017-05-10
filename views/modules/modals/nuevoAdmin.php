<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="ingresar" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit">
                    </i>
                    Agregar Usuario Nuevo
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" onsubmit="return validarRegistro()">
                    <div class="form-group" id="form">
                        <label class="form-control-label" for="recipient-name">
                            Nombre Usuario:
                        </label>
                        <input class="form-control" id="nombreAdmin" name="nombreAdmin" required="" type="text">
                            <span id="validar">
                            </span>
                        </input>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="recipient-name">
                            Password Usuario:
                        </label>
                        <input class="form-control" id="contra" name="password" required="" type="text">
                            <span id="pass">
                            </span>
                        </input>
                    </div>
                    <label class="form-control-label" for="recipient-name">
                        Tipo Usuario:
                    </label>
                    <select class="form-control" name="rol">
                        <option value="A">
                            ADMISTRADOR
                        </option>
                        <option value="U">
                            USUARIO
                        </option>
                    </select>
                    <input name="fechaCreado" type="hidden" value="<?php echo date('Y-m-d') ?>">
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" type="button">
                                Close
                            </button>
                            <button class="btn btn-primary" id="button" name="agregar" type="submit">
                                Agregar Usuario
                            </button>
                        </div>
                    </input>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
 
 $agre = new Admin();
 $agre->
agregarUsuariosController();

 
 ?>
