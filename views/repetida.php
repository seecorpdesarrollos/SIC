<div class="modal fade" id="repetida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title alert alert-info center text-danger" id="exampleModalLabel">Contraseña Repetida.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div  class="alert alert-danger alert-dismissible fade show" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <strong>
            Error!
        </strong>
        Has ingresado una contraseña ya utilizada  anteriormente.<br>
        No puedes utilizar las últimas 3 contraseñas
    </div>
      </div>
      <div class="modal-footer">
       <a href="inicio" class="btn btn-outline-warning">Volver</a>
      </div>
    </div>
  </div>
</div>


<script>
 $('#repetida').modal('show');
</script>
