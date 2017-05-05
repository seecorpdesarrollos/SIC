<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
class Ingreso{

	 public function ingresoController(){

		if(isset($_POST["submit"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nombre"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

			   	// $encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("nombreAdmin"=>$_POST["nombre"],
				                     "password"=>$_POST["password"]);

				$respuesta = IngresoModels::ingresoModel($datosController, "administrador");

				$intentos = $respuesta["intentos"];
				$nombreAdminActual = $_POST["nombre"];
				$maximoIntentos = 2;

				if($intentos < $maximoIntentos){

					if($respuesta["nombreAdmin"] == $_POST["nombre"] && $respuesta["password"] == $_POST["password"]){

						$intentos = 0;

						$datosController = array("nombreAdminActual"=>$nombreAdminActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "administrador");

					

						$_SESSION["validar"] = true;
						$_SESSION["nombreAdmin"] = $respuesta["nombreAdmin"];
						$_SESSION["rol"] = $respuesta["rol"];
						$_SESSION["idAdmin"] = $respuesta["idAdmin"];
						echo '<center><div class="alert alert-success"> Bienvenido <strong>'. ' '.	$_SESSION["nombreAdmin"].'</strong></div>';
						echo '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
								<span class="sr-only">Loading...</span></center>';
						echo "<META HTTP-EQUIV='Refresh' CONTENT='3; URL=inicio'>";

					}

					else{

						++$intentos;

						$datosController = array("nombreAdminActual"=>$nombreAdminActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "administrador");

						echo '<div class="alert alert-danger">Error al ingresar</div>';

					}

				
				} else{

						$intentos = 0;

						$datosController = array("nombreAdminActual"=>$nombreAdminActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "administrador");
						 echo '<div class="alert alert-danger">A fallado 3 veces, demuestre que no es un robot</div>';
						 echo "<meta http-equiv='Refresh' content='2; URL=robot'>";
						

				}


			}

		}
	}


}