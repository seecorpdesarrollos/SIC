<div class="row">
  
  <div class="col-md-4"><?php 
      if (isset($_GET['action'])) {
       if ($_GET['action'] == 'errorPass') {
            echo'<div  class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error!</strong> Has ingresado una contraseña ya utilizada  anteriormente.
          </div>';
              // echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=inicio'>";
       }
     }
     ?></div>
</div>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Por Favor Cambiar la Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" onsubmit="return validarRegistro()">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Nueva Contraseña:</label>
            <input type="text" class="form-control" id="contra" name="password" autofocus="" required="">
            <span id="pass"></span>
          </div>
          <input type="hidden" name="idAdmin" value="<?php echo $_SESSION['idAdmin'] ?>">
          <input type="hidden" name="fechaCreado" value="<?php echo date('Y-m-d') ?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="aceptar">Aceptar Cambios</button>
    </form>
      </div>
    </div>
  </div>
</div>

        
<?php 

 $change = new Admin();
 $change->cambiarPassworController();



 ?>