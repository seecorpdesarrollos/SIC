<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="noCliente" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <?php $cliente = VentasController::getTempController();?>
                <h5 class="modal-title" id="exampleModalLabel">
                <?php foreach ($cliente as $key): ?>

                <?php endforeach?>
                   <!--  <span class="text-danger">El Cliente es incorrecto</span> <br> -->
                <center><span class="text-warning"><?php echo ucwords($key['nombreCliente']) ?>:</span>
                </center>
                 <small><i>(Es el cliente al que le esta vendiendo.)</i></small>
                </h5>
                <!-- <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    <strong>Error! </strong> Usted le quiere vender a dos clientes distintos en la misma factura.
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
