<?php session_start();if (!$_SESSION["nombreAdmin"]) {header("location:ingreso");exit();}?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Sección de Ventas
    </li>
</ol>

<!-- Menu de ventas -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="ventas">
            Ventas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="detalles">
            Detalles
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="factura">
            Facturas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="reportes">
            Reportes
        </a>
    </li>
</ul>
<br/>
<!--Fin Menu de ventas -->


<!-- Formulario de ventas -->
<div id="ventasPrincipal">
    <?php if (isset($_GET['action'])): ?>
    <?php if ($_GET['action'] == 'ventas'): ?>
    <div class="row">
        <div class="col-lg-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <i class="fa fa-product-hunt">
                    </i>
                    Productos
                </li>
            </ol>
            <?php $ven = ProductosController::getInventarioController();
$array = array();?>

            <?php foreach ($ven as $key): ?>

            <?php $prod = $key['idProducto'] . ' - ' . $key['nombreProducto'];
array_push($array, $prod);?>

            <?php endforeach?>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <span class="label label-default text-warning">
                            Producto
                        </span>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-search fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <input type="text" class="form-control" name="" id="producto" placeholder="Buscar Productos:"/>
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
                            <?php $cli = ClientesController::getClientesController();?>
                            <select style="width:356px;"  class="chosen-select"  id="clientes">
                                <option value="">
                                    Clientes
                                </option>
                                <?php foreach ($cli as $cliente): ?>
                                <option value=" <?php echo $cliente['idCliente']; ?> ">
                                    <?php echo $cliente['nombreCliente'], ' ' . $cliente['apellidoCliente']; ?>
                                </option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6">
                        <span class="label label-default text-warning">
                            Cantidad
                            <small class="text-gray-dark">
                                (kilos)
                            </small>
                        </span>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-contao fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese la Cantidad:"/>
                        </div>
                    </div>
                    <div class="col-8 col-sm-8">
                        <span class="label label-default text-warning">
                            Cantidad de Producto
                            <small class="text-gray-dark">
                                (Unidades)
                            </small>
                        </span>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-search fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <input type="number" class="form-control"  id="unidades" placeholder="Cantidad de productos Unidades:" value="1" />
                            <div id="stock">
                            </div>
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
                                <option value="A">
                                    A
                                </option>
                                <option value="B">
                                    B
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                  <hr/>
                <div class="col-8 col-sm-12">
                    <button type="button" id="aceptar" class="btn btn-primary btn-block">
                        Aceptar
                    </button>
                </div>
            </div>


        <!-- Fin Formulario de ventas -->

        <!--Formulario del precio Ventas -->
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
                    <div class="">
                        <span class="label label-default">
                            Sub Total
                        </span>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-usd fa-fw" aria-hidden="true">
                                </i>
                            </span>
                            <input class="form-control text-md-center ventas" type="text" placeholder="0.00" id="disabledTextInput" name="totalVenta" readonly required=""/>
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
                                    <input class="form-control" type="text" value="<?php echo date('d-m-Y'); ?> " name="fechaVenta" id="fecha" readonly/>
                                </div>
                            </div>
                            <div class="col - 4col - sm - 6">
                                <span class="label label-default">
                                    Nro de Fac.
                                </span>
                                <div class="input - group">
                                    <span class="input - group - addon">
                                        <i class="fafa - sort - numeric - descfa - fw" aria-hidden="true">
                                        </i>
                                    </span>
                                    <?php $idFact = VentasController::getFecturaController();?>
                                    <?php foreach ($idFact as $key): ?>
                                    <input class="form-control text-md-center ventas" type="text" id="numFac" name="numFac" value="<?php echo $key['total'] + 1; ?>" readonly/>
                                    <?php endforeach?>
                                </div>
                            </div>
                        </div>
                            <hr/>
                            <button type="submit" class="btn btn-outline-danger btn-block" name="post" id="post">
                                <i class="fa fa-check">
                                </i>
                                Confirmar
                            </button>
                    </div>
            </div>
        </div>

        <input type="hidden" name="idProducto" id="idProducto"/>
        <input type="hidden" name="nombreProducto" id="nombreProducto"/>
        <input type="hidden" name="idCliente" id="idCliente"/>
        <input type="hidden" name="cantidad" id="cant"/>
        <input type="hidden" name="unidad" id="unidad"/>
        <input type="hidden" name="precioVenta" id="precioVenta"/>
        <input type="hidden" name="tipoFactura" id="tipoFactura"/>
    </form>
    <?php endif?>

<!--Fin Formulario del precio Ventas -->

<!-- Comienza la tabla de ventas -->
<?php if ($_GET['action'] == 'okVentas') {
    echo ' <div id="oks" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El producto fue agregado al carrito correctamente.
</div>';
    echo " <meta HTTP-EQUIV = 'Refresh'CONTENT = '2; URL=detalles' /  > ";
}
if ($_GET['action'] == 'okBorradoVentas') {
    echo '
<div  class="alert alert-warning alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
El producto fue Borrado del carrito  correctamente.
</div>';
    echo " <meta HTTP-EQUIV = 'Refresh'CONTENT = '2; URL=detalles' /  > ";

}
?>
<?php if ($_GET['action'] == 'detalles' or $_GET['action'] == 'okVentas' or $_GET['action'] == 'borrarVenta' or $_GET['action'] == 'okBorradoVentas'): ?>

 <div class="sale">
   <div class="row">
    <div class="col-md-9" id="tabla">
        <table class="table table-bordered table-sm" id="ventas">
            <thead class="bg-info text-white table-bordered">
                <tr>
                    <th class="text-md-center">
                        Unidad
                    </th>
                    <th class="text-md-center">
                        Producto
                    </th>
                    <th class="text-md-center">
                        Cantidad
                        <small>
                            (kilos)
                        </small>
                    </th>
                    <th class="text-md-center">
                        Precio
                    </th>
                     <th class="text-md-center">
                        Total
                    </th>

                    <th class="text-md-center">Borrar</th>
                </tr>
            </thead>
            <?php $get = VentasController::getTempController();?>
            <?php foreach ($get as $key): ?>
            <tbody>
                <tr>
                    <td align="center">
                        <?php echo $key['unidad'] ?>
                    </td>
                    <td align="center">
                        <?php echo $key['nombreProducto'] ?>
                    </td>
                    <td align="center">
                        <?php echo $key['cantidad'] ?>
                    </td>
                    <td align="center" width="50">
                        <?php echo $key['precioVenta'] ?>
                    </td>
                     <td align="center" width="50">
                        <?php echo $key['totalVenta'] ?>
                    </td>

                    <td align="center">
                        <a href="index.php?action=borrarVenta&idTemp=<?php echo $key['idTemp'] ?> &idProducto=<?php echo $key['idProducto'] ?>&unidad=<?php echo $key['unidad'] ?> ">
                            <i class="fa fa-trash-o btn btn-secondary text-danger"></i>
                            </a>

                    </td>
                    <?php
$total = $total + $key['totalVenta'];
$total = number_format($total, 2, ',', '');

$iva = $total * 21 / 100;
$iva = number_format($iva, 2, ',', '');
$subTotal = $total - $iva;
$subTotal = number_format($subTotal, 2, ',', '');

?>
                    <?php endforeach?>

                </tr>
            </tr>
        </tbody>
    </table>
  </div>
<!-- segunda mitad de la tabla de ventas -->
        <div class="col-md-3">
        <h2 class="alert alert-danger text-lg-center text-danger">Detalles</h2>
          <td align="center">
              <?php echo '<span class="text-primary">Total</span> ' . '<span class="right"> $' . $total . '</span>'; ?>
          </td>
          <br>
          <td align="center">
              <?php echo '<span class="text-primary">Iva </span> ' . '<span class="right"> $' . $iva . '</span>'; ?>
          </td>
          <br>
          <td align="center">
              <?php echo '<span class="text-primary">Sub Total</span>   ' . '<span class="right"> $' . $subTotal . '</span>'; ?>
          </td>
          <hr>
          <tr class="bg-primary ">
              <th scope="row" class="text-lg-center">
                  <h4>
                 <?php echo ' <h4 class="alert alert-success text-success">Total' . '<span class="right"> $' . $total . '
              </h4> </span>'; ?>
                  </h4>
              </th>
             <span class="alert alert-info"><strong>Cliente:</strong> <?php echo $key['nombreCliente'] . ' ' . $key['apellidoCliente'] ?></span>
        </div>

</div>
</div>
<br>
            <form  method="post">
                <?php if (!empty($total)): ?>
               <center> <?php require 'btn.php';?></center>
                <?php endif?>
                <?php $idFact = VentasController::getFecturaController();?>
                <?php foreach ($idFact as $key): ?>
                <input class="form-control text-md-center ventas" type="hidden" id="numFac" name="numFac" value="<?php echo $key['total'] + 1; ?>" readonly/>
                <?php endforeach?>
            </form>
<?php endif?>
<!-- comienza la facturas -->
<?php if ($_GET['action'] == 'factura' or $_GET['action'] == 'okBorradoFactura'): ?>
<?php if ($_GET['action'] == 'okBorradoFactura') {
    echo ' <div id="oks" class="alert alert-warning alert-dismissible fade show" role="alert">
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

}
?>
<table class="table table-bordered table-sm" id="tablas">
    <thead class="bg-primary text-white">
    <tr>
    <td>
        Nro Fac.
    </td>
    <td>
        Fecha
    </td>
    <td>
        Cliente
    </td>
    <td>
        Total
    </td>
    <td>
        Acción
    </td>
    </tr>
    </thead>
<?php $fac = VentasController::getVentasController()?>
<?php foreach ($fac as $key): ?>
      <tr>
      <td align="center">
      <?php echo $key['numFac'] ?>
      </td>
      <td align="center">
      <?php echo date('d-m-Y', strtotime($key['fechaVenta'])) ?>
      </td>
      <td align="center">
      <?php echo $key['nombreCliente'] . ' ' . $key['apellidoCliente'] ?>
      </td>
      <td align="center">
      <?php echo $key['totalVenta'] ?>
      </td>
      <td align="center">
      <a href=" #" onclick="abrirVentana('tcpdf/pdf/factura.php?numFac= <?php echo $key['numFac'] ?> ')" class="btn btn-outline-info btn-sm">
          <i class="fa fa-download">
          </i>
      </a>
      <a href="index.php?action=factura&deleteFactura= <?php echo $key['numFac'] ?> " class="btn btn-outline-danger btn-sm">
          <i class="fa fa-trash">
          </i>
      </a>
      </td>
      <?php endforeach?>
      </tr>
      </table>
<?php endif;?>
<?php endif?>
<!-- comienza los Reportes -->
<?php if ($_GET['action'] == 'reportes'): ?>
<!-- <h3 class="alert alert-info">Ventas Diarias</h3> -->
    <div class="row">
        <div class="col-md-2">
           Elegir una Fecha:
           <form method="post">
            <input type="text" name="fecha" class="form-control" id="datepicker"><br>
            <input type="submit" name="ventaDiarias" class="btn btn-outline-primary" value="Consultar">
           </form>
        </div>
        <div class="col-md-8">
         <h4>Ventas Diarias</h4>

<?php $ventaDiarias = VentasController::ventasDiariasController()?>
<table class="table table-striped" id='tablas'>
    <thead class="bg-primary text-white">
        <tr>
            <td>Nombre y Apellido</td>
            <td>Nombre del Producto</td>
            <td>Nro y tipo de Factura</td>
            <td>Monto total</td>
        </tr>
    </thead>
        <?php if (isset($_POST['ventaDiarias'])): ?>
        <?php foreach ($ventaDiarias as $key): ?>
            <?php $total = $total + $key['totalVenta']?>
    <tr>
        <td align="center"> <?php echo $key['nombreCliente'] . ' ' . $key['apellidoCliente'] ?></td>
        <td align="center"><?php echo $key['nombreProducto'] ?></td>
        <td align="center"><?php echo 'Nro: ' . $key['numFac'] . ' ' . 'Tipo:' . $key['tipoFactura'] ?></td>
        <td align="center"><?php echo '$' . $key['totalVenta'] ?></td>
    </tr>
        <?php endforeach?>
       <?php endif?>
</table>
        </div>
          <div class="col-md-2">
            <div class="alert alert-info" role="alert">
               <h3>  <strong> Ventas Total del dia <?php echo date("d-m-Y", strtotime($key['fechaVenta'])); ?>: </strong><span class="text-danger"> <i class="fa fa-usd"></i> <?php echo $total; ?></span></h3>
            </div>
          </div>
        <?php endif?>
    </div>
<br><br><br>
    <!-- Final de los reporte -->
<!-- script para pasar los datos de los productos al formulario de vanta. -->
<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy/m/d',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
                     $('#cantidad').change(function() {
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
      window.open('tcpdf/pdf/index.php',  "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=900, height=800,left=220");

 });

function abrirVentana(url) {
    window.open(url, "Factura", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=900, height=800 ,left=220");
}

</script>
<?php $agr = new VentasController();
$agr->
    agregarVentaController();
$agr->
    borrarVentasController();
$agr->
    registrarVentasDetallesControllers();
$agr->
    borrarFacturaController();
?>
