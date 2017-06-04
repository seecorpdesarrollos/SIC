
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade"
 id="verCliente" role="dialog" tabindex="-1">
   <div class="modal-dialog modal-lg" id="mdialTamanio">
        <div class="modal-content">
            <div class="modal-header btn-info">
               <i> <h4 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit">
                    </i>
                <?php $cli = ClientesController::getClientesControllerId();?>
                <?php foreach ($cli as $key): ?>

                <?php endforeach?>
                 Cliente: <?php echo $key['nombreCliente'] . ' ' . $key['apellidoCliente'] ?>
                </h4></i>
            </div>
            <div class="modal-body">
                          <table class="table table-striped table-sm">
                                <thead class="bg-inverse">
                                    <tr>
                                        <td>Ciudad</td>
                                        <td>Cuit</td>
                                         <td>Usuario</td>
                                         <td>contraseña</td>
                                         <td>Email</td>
                                         <td>Dirección</td>
                                        <td>Ver </td>
                                    </tr>
                                </thead>
                                    <tr>
                                        <td class="text-lg-center"><?php echo $key['nombreCiudad'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['cuit'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['usuarioCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['passwordCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['emailCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['direccion'] ?></td>
                                        <td class="text-lg-center"><a href="index.php?action=editClientes&idCliente=<?php echo $key['idCliente'] ?>"> <i class="fa fa-edit"></i></a> <a href="index.php?action=clientes&id=<?php echo $key['idCliente'] ?>"> <i class="fa fa-trash"></i></a></td>
                                    </tr>
                            </table>
                         <div class="modal-footer">
                            <a href="clientes" class="btn btn-outline-danger">Salir </a>
                         </div>
            </div>
        </div>
    </div>
</div>
