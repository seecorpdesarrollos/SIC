
<!-- Modal -->
<div class="modal fade" id="editarCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Editar Categoria </h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post">
           <?php 
           $edit = new categoriasController();
           $edit->editarCategoriaController();
           
 
            ?>
          </div>
      </div>
    </div>
  </div>
</div>
    </form>


  <?php 
 
 $actualizarCat = new categoriasController();
$actualizarCat->actualizarCategoriaController();
 
 ?>