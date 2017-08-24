<?php session_start();
if (!$_SESSION["nombreAdmin"]) {
    header("location:ingreso");exit();
}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Sección de Clientes
    </li>
</ol>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okClientes') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Cliente fue agregado correctamente.
</div>';
        echo '<meta http-equiv="Refresh" content="4;URL = clientes" >';
    }
    if ($_GET['action'] == 'alta') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Cliente fue dado de alta correctamente al sistema.
</div>';
        echo '<meta http-equiv="Refresh" content="4;URL = clientes" >';
    }

    if ($_GET['action'] == 'okClientesEdit') {
        echo '<div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El Cliente fue editado correctamente.
</div>';
        echo '<meta http-equiv="Refresh" content="4;URL = clientes" >';
    }
    if ($_GET['action'] == 'editadoCat') {
        echo '
    <div class="alert alert-success alert-dismissible fade show" id="oks" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <strong>
            Enorabuena!
        </strong>
        La Categoria fue Editada correctamente al Sistema.
    </div>';
        echo '<meta content="4; URL = clientes" http-equiv="Refresh"> ';
    }
    if ($_GET['action'] == 'baja') {
        echo '
        <div class="alert alert-success alert-dismissible fade show" id="oks" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">
                    ×
                </span>
            </button>
            <strong>
                Enorabuena!
            </strong>
            El cliente fue dado de baja correctamente del sistema.
        </div>
        ';
        echo '
        <meta content="4;
        URL = clientes" http-equiv="Refresh">
            ';
    }
}
?>
<!-- Comiensa clientes list -->
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a class="list-group-item" href="clientes">
                            <i class="fa fa-list-alt">
                            </i>
                            Listado Clientes
                        </a>
                        <a class="list-group-item" href="agragarclientes">
                            <i class="fa fa-edit">
                            </i>
                            Clientes Nuevos
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-block">
                            <?php if (isset($_GET['action'])): ?>
                            <?php if ($_GET['action'] == 'clientes' or $_GET['action'] == 'okClientes' or $_GET['action'] == 'baja' or $_GET['action'] == 'alta' or $_GET['action'] == 'verClientes' or $_GET['action'] == 'okClientesEdit'): ?>
                            <h3 class="alert alert-warning text-center">
                                Listado de Clientes <small class="text-danger">(Activos)</small>
                            </h3>
                                <?php
$cli = ClientesController::getClientesController();
?>

                            <table class="table table-striped table-sm" id="tablas">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Apellido</td>
                                         <td>Teléfono</td>
                                        <td>Ver </td>
                                    </tr>
                                </thead>
                                <?php foreach ($cli as $key): ?>
                                    <tr>
                                        <td class="text-lg-center"><?php echo $key['nombreCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['apellidoCliente'] ?></td>
                                        <td class="text-lg-center"><?php echo $key['telefono'] ?></td>
                                        <td class="text-lg-center"><a href="index.php?action=verClientes&idCliente=<?php echo $key['idCliente'] ?>"> <i class="fa fa-eye"></i></a></td>
                                    </tr>
                                <?php endforeach?>
                            </table>
                            <?php endif?>
                            <?php if ($_GET['action'] == 'agragarclientes'): ?>
                            <h6 class="alert alert-warning text-center">
                               <i class="fa fa-edit"></i> Agregar Clientes
                            </h6>
                            <form method="post" onsubmit="return validarclientes()">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Nombre Cliente</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nombre Cliente" name="nombreCliente" required="">
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                        <label for="exampleInputPassword1">Apellido Cliente</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Apellido Cliente" name="apellidoCliente" required="">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Provincia</label>
                                         <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idProvincia">
                                         <?php $pro = ProveedoresController::getProvinciaController();?>
                                         <?php foreach ($pro as $key): ?>

                                          <option value="<?php echo $key['idProvincia'] ?>"><?php echo $key['nombreProvincia']; ?></option>
                                         <?php endforeach?>
                                        </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Nombre Usuario</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nombre Usuario" name="usuarioCliente" required="">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email " name="emailCliente" required="">
                                      </div>
                                    </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Ciudad</label>
                                        <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idCiudad">
                                         <?php $prov = ProveedoresController::getCiudadController();?>
                                         <?php foreach ($prov as $row): ?>

                                          <option value="<?php echo $row['idCiudad'] ?>"><?php echo $row['nombreCiudad']; ?></option>
                                         <?php endforeach?>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Dirección</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Dirección" name="direccion" required="">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña Usuario</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña Usuario" name="passwordCliente" required="">
                                      </div>
                                    </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Telefono</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono" name="telefono" required="">
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group"  id="form">
                                        <label for="exampleInputPassword1">Cuit</label>
                                    <input class="form-control" id="clientes"  name="cuit" type="text" placeholder="Cuit">
                                    <span id="cli"></span>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                        <label for="exampleInputPassword1" class="label"></label>
                                    <input class="btn btn-outline-danger btn-block" id="button" name="agragarclientes" type="submit" value="Agregar Cliente">
                                </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif?>
                    <?php endif?>

                    <!-- editar Clientes -->
                    <!-- editar Clientes -->
                    <!-- editar Clientes -->

                    <?php if ($_GET['action'] == 'editClientes'): ?>
                            <h6 class="alert alert-warning text-center">
                               <i class="fa fa-edit"></i> Editar Clientes
                            </h6>
                            <?php $edit = ClientesController::editClientesController();?>
                            <?php foreach ($edit as $value): ?>
                            <?php endforeach?>

                            <form method="post" onsubmit="return validarclientes()">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Nombre Cliente</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nombreCliente" value="<?php echo $value['nombreCliente'] ?>">
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                        <label for="exampleInputPassword1">Apellido Cliente</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="apellidoCliente"  value="<?php echo $value['apellidoCliente'] ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Provincia</label>
                                         <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idProvincia">
                                         <?php $pro = ProveedoresController::getProvinciaController();?>

                                          <option value="<?php echo $value['idProvincia'] ?>"><?php echo $value['nombreProvincia']; ?></option>
                                         <?php foreach ($pro as $key): ?>
                                          <option value="<?php echo $key['idProvincia'] ?>"><?php echo $key['nombreProvincia']; ?></option>
                                         <?php endforeach?>
                                        </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Nombre Usuario</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="usuarioCliente" value="<?php echo $value['usuarioCliente'] ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="emailCliente" value="<?php echo $value['emailCliente'] ?>">
                                      </div>
                                    </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Ciudad</label>
                                        <select class="chosen-select" id="exampleSelect1" style="width:239px;" name="idCiudad">
                                         <option value="<?php echo $value['idCiudad'] ?>"><?php echo $value['nombreCiudad']; ?></option>
                                         <?php $prov = ProveedoresController::getCiudadController();?>
                                         <?php foreach ($prov as $row): ?>
                                          <option value="<?php echo $row['idCiudad'] ?>"><?php echo $row['nombreCiudad']; ?></option>
                                         <?php endforeach?>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Dirección</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="direccion" value="<?php echo $value['direccion'] ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña Usuario</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="passwordCliente" value="<?php echo $value['passwordCliente'] ?>">
                                      </div>
                                    </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Telefono</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="telefono" value="<?php echo $value['telefono'] ?>">
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Cuit</label>
                                    <input class="form-control"  name="cuit" type="text" value="<?php echo $value['cuit'] ?>">
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                        <label for="exampleInputPassword1" class="label"></label>
                                    <input class="btn btn-outline-danger btn-block" id="button" name="editarClientes" type="submit" value="Editar Cliente">
                                </div>
                                </div>
                                </div>
                                <input type="hidden" name="idCliente" value="<?php echo $value['idCliente'] ?>">
                            </form>
                        </div>
                    </div>
                    <?php endif?>

                    <?php

$reg = new ClientesController();
$reg->registrarClientesController();
$reg->editClientesController();
$reg->actualizarClientesController();
$reg->bajaClientesController();
$reg->altaClientesController();
?>
                </div>
            </div>
