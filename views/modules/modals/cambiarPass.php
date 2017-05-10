<div class="row">
    <div class="col-md-4">
        <?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'errorPass') {
        echo '<div  class="alert alert-danger alert-dismissible fade show" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <strong>
            Error!
        </strong>
        Has ingresado una contraseña ya utilizada  anteriormente.
    </div>
    ';
       
       
    }
}
?>
</div>
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
                            <span id="pass">
                            </span>
                        </input>
                    </div>
                    <input name="idAdmin" type="hidden" value="<?php echo $_SESSION['idAdmin'] ?>">
                        <input name="fechaCreado" type="hidden" value="<?php echo date('Y-m-d') ?>">
                        </input>
                    </input>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" name="aceptar" type="submit">
                    Aceptar Cambios
                </button>
            </div>
        </div>
    </div>
</div>
<?php

$change = new Admin();
$change->
cambiarPassworController();

?>
