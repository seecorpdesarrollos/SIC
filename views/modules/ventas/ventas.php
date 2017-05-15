<?php

session_start();

if (!$_SESSION["nombreAdmin"]) {

    header("location:ingreso");

    exit();

}
?>
<h5><div class="alert alert-warning" role="alert">
  Sección de Ventas.
</div></h5>
<table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th>Nombre del Producto</th>
      <th>Cantidad</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mocho Traseros</td>
      <td>150 Kilos 5(unidades)</td>
      <td>72</td>
    </tr>
    <tr>
      <td colspan="2" class="text-md-center">Total de Venta</td>
      <td>$ 10800</td>
    </tr>
  </tbody>
</table>
<br>
<style type="text/css">
@media print {
    div,a {display:none}
    .ver {display:block}
    .nover {display:none}
    .unos{color:red}
}
</style>
<script>
function impre(num) {
    document.getElementById(num).className="ver";
    print();
    document.getElementById(num).className="nover";
}
</script>
</head>

<body>
<div id="uno" class="unos">
Artículo primero
</div>
<a href="#" onclick="impre('uno');return false">Imprime 1</a>
<div id="dos">
Artículo segundo
</div>
<a href="#" onclick="impre('dos');return false">Imprime 2</a>
<div id="tres">
Articulo tercero
</div>
<a href="#" onclick="impre('tres');return false">Imprime 3</a>
</body>
</html>
