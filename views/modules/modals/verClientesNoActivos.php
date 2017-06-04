<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade"
 id="verClienteNoActivo" role="dialog" tabindex="-1">
<div class="" id="noActivo">
   <div class="modal-dialog modal-lg" id="mdialTamanio">
        <div class="modal-content">
            <div class="modal-header btn-info">
               <i> <h4 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit">
                    </i>
                 Cliente dados de Bajas:
                 <?php $baja = ClientesController::getClientesControllerNoActivo();?>
                </h4></i>
            </div>
            <div class="modal-body">
                          <table class="table table-striped table-sm">
                                <thead class="bg-inverse">
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Apellido</td>
                                        <td>Cuit</td>
                                        <td>Email</td>
                                        <td>Dirección</td>
                                        <td>Teléfono</td>
                                        <td>Alta</td>
                                    </tr>
                                </thead>
                                <?php foreach ($baja as $key): ?>

                                    <tr>
                                        <td class="text-lg-center"><?php echo $key['nombreCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['apellidoCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['cuit'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['emailCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['direccion'] ?></td>
                                         <td class="text-lg-center"><?php echo $key['telefono'] ?></td>
                                        <td class="text-lg-center"><a href="index.php?action=clientes&idAlta=<?php echo $key['idCliente'] ?>"> <i class="fa fa-edit"></i></a></td>
                                    </tr>
                                <?php endforeach?>
                            </table>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Salir</button>
                         </div>
            </div>
        </div>
    </div>
</div>
</div>