
<!-- Modal -->
<div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Agregar Usuario Nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" onsubmit="return validarRegistro()">
          <div class="form-group" id="form">
            <label for="recipient-name" class="form-control-label">Nombre Usuario:</label>
            <input type="text" class="form-control"  name="nombreAdmin" id="nombreAdmin" required="">
            <span id="validar"></span>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Password Usuario:</label>
            <input type="text" class="form-control" id="contra" name="password"  required="">
            <span id="pass"></span>
          </div>
          <label for="recipient-name" class="form-control-label">Tipo Usuario:</label>
          <select class="form-control" name="rol">
            <option value="A">ADMISTRADOR</option>
            <option value="U">USUARIO</option>
          </select>
         <input type="hidden" name="fechaCreado" value="<?php echo date('Y-m-d') ?>">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="agregar" id="button">Agregar Usuario</button>
          </div>
      </div>
    </div>
  </div>
</div>
    </form>


    <?php 
 
 $agre = new Admin();
 $agre->agregarUsuariosController();

 
 ?>