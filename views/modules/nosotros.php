
<?php

session_start();

if(!$_SESSION["nombreAdmin"]){

	header("location:ingreso");

	exit();

}

?>
<h1>Hola Nosotros</h1>

	<?php 
	$admin = new Admin();
	$admin->fecha();

	?>