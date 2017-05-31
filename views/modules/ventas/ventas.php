<?php session_start();
if (!$_SESSION["nombreAdmin"]) {
    header("location:ingreso");
    exit();
}
?>

<h5>
    <div class="alert alert-warning" role="alert">
        Sección de Ventas.
    </div>
</h5>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="ventas">Ventas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="detalles">Detalles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="factura">Facturas</a>
  </li>
</ul>
<br>
<div id="ventasPrincipal">
<?php if (isset($_GET['action'])): ?>
        <?php if ($_GET['action'] == 'ventas'): ?>
    <div class="row">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <i class="fa fa-product-hunt">
                    </i>
                    Productos
                </li>
            </ol>
            <?php
$ven = ProductosController::getInventarioController();
$array = array();
?>
        <?php foreach ($ven as $key): ?>
            <?php $prod = $key['idProducto'] . ' - ' . $key['nombreProducto'];
array_push($array, $prod);
?>
        <?php endforeach?>
            <div class="main">
                <div class="row">
                    <div class="col-8 col-sm-12">
                        <span class="label label-default text-warning">
                            Producto
                        </span>
                        <div class="input-group">
                         <span class="input-group-addon">
                                <i class="fa fa-search fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <input type="text" class="form-control" name="" id="producto" placeholder="Buscar Productos:" />
                        </div>
                    </div>
                    <div class="col-8 col-sm-6">

                        <span class="label label-default text-warning">
                           Clientes
                        </span>
                        <div class="input-group">
                        <span class="input-group-addon">
                                <i class="fa fa-search fa-fw" aria-hidden="true">
                                </i>
                        </span>
                             <select style="width:356px;"  class="chosen-select"  id="clientes">
                                <option value="">Clientes</option>
                                <option value="2">Diego</option>
                                <option value="3">Alexis</option>
                                <option value="4">David</option>
                                <option value="5">Emanuel</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6">

                        <span class="label label-default text-warning">
                           Cantidad  <small class="text-gray-dark">(kilos)</small>
                        </span>

                        <div class="input-group">
                         <span class="input-group-addon">
                                <i class="fa fa-contao fa-fw" aria-hidden="true">
                                </i>
                        </span>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese la Cantidad:" />
                        </div>
                    </div>
                     <div class="col-8 col-sm-8">
                        <span class="label label-default text-warning">
                            Cantidad de Producto <small class="text-gray-dark">(Unidades)</small>
                        </span>
                        <div class="input-group">
                         <span class="input-group-addon">
                                <i class="fa fa-search fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <input type="text" class="form-control"  id="unidades" placeholder="Cantidad de productos Unidades:" />
                            <div id="stock"></div>
                        </div>
                    </div>
                     <div class="col-8 col-sm-4">
                        <span class="label label-default text-warning">
                           Tipo Fac
                        </span>
                        <div class="input-group">
                         <span class="input-group-addon">
                                <i class="fa fa-search fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <select style="width:236px;" class="chosen-select"  id="Factura">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                    </div>
                </div>
                          <div class="col-8 col-sm-12">
                                  <br>
                           <button type="button" id="aceptar" class="btn btn-primary btn-block">Aceptar</button>
                          </div>
            <br>
            </div>
        </div>




        <!-- Ventas -->
        <form method="post">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <i class="fa fa-money">
                        </i>
                        Ventas
                    </li>
                </ol>
                <div class="main">
                    <span class="label label-default">
                      Sub Total
                    </span>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-usd fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <input class="form-control text-md-center ventas" type="text" placeholder="0.00" id="disabledTextInput" name="totalVenta" readonly required="" />
                        </div>
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            <span class="label label-default">
                                Iva 21 %
                            </span>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-usd fa-fw" aria-hidden="true">
                                        </i>
                                    </span>
                                    <input class="form-control text-md-center ventas" type="text" placeholder="0.00" id="iva" name="iva" readonly/>
                                </div>
                        </div>
                        <div class="col-4 col-sm-6">
                            <span class="label label-default">
                                Total s/iva
                            </span>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-usd fa-fw" aria-hidden="true">
                                        </i>
                                    </span>
                                    <input class="form-control text-md-center ventas" type="text" placeholder="0.00" id="sub"  readonly/>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            <span class="label label-default">
                                Fecha
                            </span>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar-o fa-fw" aria-hidden="true">
                                        </i>
                                    </span>
                                    <input class="form-control" type="text" value="<?php echo date('d-m-Y'); ?>  " name="fechaVenta" id="fecha" readonly/>
                                </div>
                        </div>
                        <div class="col - 4col - sm - 6">
                            <span class="labellabel-default">
                                Nro de Fac.
                            </span>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-sort-numeric-desc fa-fw" aria-hidden="true">
                                        </i>
                                    </span>
                                    <?php $idFact = VentasController::getFecturaController();?>
                                    <?php foreach ($idFact as $key): ?>
                                    <input class="form-control text-md-center ventas" type="text" id="numFac" name="numFac" value="<?php echo $key['total'] + 1; ?>" readonly />
                                    <?php endforeach?>
                                </div>
                        </div>
                    </div>
                <center>
              <hr><br>
                    <button type="submit" class="btn btn-outline-danger" name="post" id="post">
                        <i class="fa fa-check">
                        </i>
                        Confirmar
                    </button>
                </center>
                </div>
            </div>
               <br><br>
        </div>
    </div>
    <br/>
    <input type="hidden" name="idProducto" id="idProducto">
    <input type="hidden" name="nombreProducto" id="nombreProducto">
    <input type="hidden" name="idCliente" id="idCliente">
    <input type="hidden" name="cantidad" id="cant">
    <input type="hidden" name="unidad" id="unidad">
    <input type="hidden" name="precioVenta" id="precioVenta">
    <input type="hidden" name="tipoFactura" id="tipoFactura">
    </form>
    <br/>
    <?php endif?>
   </div>








<!-- Comienza la tabla de ventas -->
<?php if ($_GET['action'] == 'okVentas') {
    echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La Venta fue Realiza  correctamente.
</div>';
    echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=detalles'/> ";
}
if ($_GET['action'] == 'okBorradoVentas') {
    echo '<div  class="alert alert-warning alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La Venta fue Borrada  correctamente.
</div>';

}
?>

    <?php if ($_GET['action'] == 'detalles' or $_GET['action'] == 'okVentas' or $_GET['action'] == 'borrarVenta' or $_GET['action'] == 'okBorradoVentas'): ?>
<div class="row">
    <div class="col-md-12" id="tabla">
        <div class="sale">
          <table class="table table-striped" id="ventas">
              <thead class="bg-info text-white">
                  <tr>
                      <th class="text-md-center">
                          Unidades
                      </th>
                      <th class="text-md-center">
                          Nombre
                      </th>
                      <th class="text-md-center">
                          Cantidad <small>(kilos)</small>
                      </th>
                      <th class="text-md-center">
                          Precio Kilo
                      </th>
                      <th class="text-md-center">
                          Iva(%)
                      </th>
                      <th class="text-md-center">
                          Sub-Total
                      </th>
                      <th class="text-md-center">
                          Acción
                      </th>
                  </tr>
              </thead>
          <?php $get = VentasController::getTempController();?>
            <?php foreach ($get as $key): ?>
              <tbody>
                <tr>
            <td align="center" width="50"><?php echo $key['unidad'] ?></td>
            <td align="center"><?php echo $key['nombreProducto'] ?></td>
            <td align="center"><?php echo $key['cantidad'] ?></td>
            <td align="center"><?php echo '$ ' . $key['precioVenta'] ?></td>
            <td align="center"><?php echo '$ ' . $key['iva'] ?></td>
            <td align="center"><?php echo '$ ' . $key['totalVenta'] ?></td>
            <td align="center"> <a href="index.php?action=borrarVenta&idTemp= <?php echo $key['idTemp'] ?> &idProducto= <?php echo $key['idProducto'] ?> &unidad= <?php echo $key['unidad'] ?>"><i class="fa fa-trash btn btn-outline-danger"></a></i></td>
            <?php $total = $total + $key['totalVenta'];?>
            <?php endforeach?>
            <tr class="bg-primary text-white">
               <th scope="row" class="text-lg-center"><h1> Total: </h1></th>
              <td colspan="7" align="center">
              <?php echo '<h1> <i class="fa fa-usd"></i> ' . $total . '</h1>'; ?>
              </td>
            </tr>
            <tr>
             <form  method="post">
               <?php if (!empty($total)): ?>
                 <?php require 'btn.php';?>
               <?php endif?>
                  <?php $idFact = VentasController::getFecturaController();?>
                <?php foreach ($idFact as $key): ?>
                  <input class="form-control text-md-center ventas" type="hidden" id="numFac" name="numFac" value="<?php echo $key['total'] + 1; ?>" readonly />
                  <?php endforeach?>
             </form>
            </tr>
          </tr>

              </tbody>
          </table>
        </div>

    </div>
</div>

    <?php endif?>



    <!-- comienza la facturas -->
     <?php if ($_GET['action'] == 'factura' or $_GET['action'] == 'okBorradoFactura'): ?>
<?php
if ($_GET['action'] == 'okBorradoFactura') {
    echo '<div id="oks" class="alert alert-warning alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La Factura fue Borrada  correctamente.
</div>';
    // echo "  <META HTTP-EQUIV='Refresh' CONTENT='4; URL=factura'/> ";
}

?>

<table class="table table-bordered table-sm" id="tablas">
  <thead class="bg-primary text-white">
    <tr>
      <td>Nro Fac.</td>
      <td>Fecha</td>
      <td>Cliente</td>
      <td>Total</td>
      <td>Acción</td>
    </tr>
  </thead>
<?php $fac = VentasController::getVentasController()?>
      <?php foreach ($fac as $key): ?>
    <tr>
        <td align="center"><?php echo $key['numFac'] ?></td>
        <td align="center"><?php echo date('d-m-Y', strtotime($key['fechaVenta'])) ?></td>
        <td align="center"><?php echo $key['nombreCliente'] ?></td>
        <td align="center"><?php echo $key['totalVenta'] ?></td>
        <td align="center"><a href="#" onclick="abrirVentana('tcpdf/pdf/factura.php?numFac=<?php echo $key['numFac'] ?>')"
         class="btn btn-outline-info btn-sm"><i class="fa fa-download"></i></a>
        <a href="index.php?action=factura&deleteFactura=<?php echo $key['numFac'] ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a></td>
      <?php endforeach?>
    </tr>

</table>

     <?php endif;?>
<?php endif?>












<!-- script para pasar los datos de los productos al formulario de vanta. -->
<script>
     $(function() {
     $("#post").attr('disabled', 'disabled');
     var items = <?=json_encode($array);?>;
     $('#producto').autocomplete({
         source: items,
         select: function(event, item) {
             var params = {
                 producto: item.item.value
             };
             $.get('views/productosAjax.php', params, function(respuesta) {
                 var json = JSON.parse(respuesta);
                 if (json.status == 200) {
                     $('#unidades').change(function() {
                      // asignamos el valor de cantidad
                         var cantidad = $('#cantidad').val();
                         $('#cant').val(cantidad);
                         // calculo matemático del precio * cantidad
                         var disabledTextInput = json.precioVenta * cantidad
                         $('#disabledTextInput').val(disabledTextInput.toFixed(2));
                         // sacamos el total
                         var total = json.precioVenta * cantidad;
                         $('#precioVenta').val(json.precioVenta);
                         var iva = total * 21 / 100;
                         $('#iva').val(iva.toFixed(2));
                         var sub = total - iva;
                         $('#idProducto').val(json.idProducto);
                         $('#nombreProducto').val(json.nombre);
                         $('#sub').val(sub.toFixed(2));
                         $("#aceptar").click(function() {
                             var a = $('#clientes').val();
                             $('#idCliente').val(a);
                              var tipoFac = $('#Factura').val();
                             $('#tipoFactura').val(tipoFac);
                             var b = $('#unidades').val();
                             $('#unidad').val(b);
                             if (!b == '') {
                               $("#post").removeAttr('disabled', 'disabled');
                             }
                             console.log(json);
                         })
                     })
                 }
             });
             // fin del ajax
         }
     });
 });
 $('#enviar').click(function() {
      window.open('tcpdf/pdf/index.php',  "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=900, height=800");

 });

function abrirVentana(url) {
    window.open(url, "Factura", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=900, height=800");
}

</script>


<?php
$agr = new VentasController();
$agr->agregarVentaController();
$agr->borrarVentasController();
$agr->registrarVentasDetallesControllers();
$agr->borrarFacturaController();
?>
