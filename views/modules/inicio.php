
<?php

session_start();

if(!$_SESSION["nombreAdmin"]){

	header("location:ingreso");

	exit();

}

?>

<body class="body">
<div class="mains">	
 <div class="card bg-info">
  <div class="card-block">
   Esta sección es para visualizar graficas del sistema.
  </div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div id="grafico"></div>
	</div>
</div>
	
		<?php 

		$admin = new Admin();
		$admin->fecha();


	
		?>
</div>
</body>