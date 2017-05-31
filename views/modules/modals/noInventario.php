<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="noCliente" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <?php $nombre = $_POST['nombreProducto'];
$nombres = explode(" ", $nombre);
?>
                  <span class="text-danger">No hay stock Suficiente del Producto:</span> <?php echo '  <span class="text-success">' . ucwords($nombres[2] . ' ' . $nombres[3] . ' ' . $nombres[4] . ' ' . $nombres[5]) . '</span>'; ?>
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">

                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    <strong>Error! </strong> Usted le quiere vender un producto que se encuentra agotado por favor consulte su inventario.
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
