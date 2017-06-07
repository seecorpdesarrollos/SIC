<div class="row">
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="password" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Por Favor Cambiar la Contraseña
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" onsubmit="return validarRegistro()">
                    <div class="form-group">
                        <label class="form-control-label" for="recipient-name">
                            Nueva Contraseña:
                        </label>
                        <input autofocus="" class="form-control" id="contra" name="password" required="" type="text">
                            <span id="pass"></span>
                        </input>
                    </div>
                    <input name="idAdmin" type="hidden" value="<?php echo $_SESSION['idAdmin'] ?>">
                        <input name="fechaCreado" type="hidden" value="<?php echo date('Y-m-d') ?>">
                        </input>
                    </input>
            <div class="modal-footer">
                <button class="btn btn-primary" name="aceptar" type="submit">
                    Aceptar Cambios
                </button>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
<?php
$change = new Admin();
$change->cambiarPassworController();
?>