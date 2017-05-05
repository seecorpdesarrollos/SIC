<?php

   class  EnlacesPaginas {

	static public function enlacesPaginasModel($get){
		// 
		// Páginas de los módulos
		// 

		if($get == "nosotros" OR $get == "inicio"){

			$module = "views/modules/".$get.".php";

		 }
		 // 
		// Fin de las Páginas
		// --------------------------------------------------------
		
		  // 
		//  Páginas DE CATEGIRIAS
		// --------------------------------------------------------
		
           else if($get == "categorias" ){

			$module = "views/modules/categorias/categorias.php";
		
	     }

	     else if($get == "agragarCategorias" ){

			$module = "views/modules/categorias/categorias.php";
		
	     }
	      else if($get == "okCategorias" OR $get == "editadoCat" ){

			$module = "views/modules/categorias/categorias.php";
		
	     }
	     else if($get == "DeletCategorias"){

			$module = "views/modules/categorias/categorias.php";
		
	     }
	     else if($get == "editarCat"){

			$module = "views/modules/categorias/editarCat.php";
		
	     }
		 // 
		// FIN DE LAS CATEGORIAS
		// 
		 // 
		// Página del login
		// 
		 else if($get == "index" ){

			$module = "views/modules/ingreso/ingreso.php";
		
	     }

	else if($get == "sesion" ){

			$module = "views/modules/ingreso/sesion.php";
		
	}
	else if($get == "robot" ){

			$module = "views/modules/ingreso/robot.php";
		
	}

      // -----------------------------------------------
      // Inicio de los Administradores      
 
       else if($get == "config" ){

			$module = "views/modules/admin/config.php";
		
	}
	  else if($get == "cambio" ){

			$module = "views/modules/admin/config.php";
		
	}

	 else if($get == "agregado" ){

				$module = "views/modules/admin/config.php";
			
		}
		else if($get == "delete" OR $get == 'delet' OR $get == 'editado'){

				$module = "views/modules/admin/config.php";
			
		}
		else if($get == "editar"){

				$module = "views/modules/admin/editar.php";
			
		}


      else if($get == "errorPass"){

				$module = "views/modules/modals/cambiarPass.php";
			
		}

      // -----------------------------------------------
      // Fin de los Administradores
 
        
	    // 
		// Páginas por default
		// 
	else{

			$module = "views/modules/ingreso/ingreso.php";

		}

		return $module;

	}

}


