<?php require "views/modules/header/header.php"  ?>


<?php if(isset($_GET['action'])){
	   if ($_GET['action'] !== 'ingreso' AND $_GET['action'] !== 'robot'){
	   	  require  "views/modules/header/menu.php";
	   }
}?>
	<div class="row">
		<div class="col-md-12">
			<div class="container">
				<section>
				 <hr>
					<?php
						$mvc = new MvcController();
						$mvc->enlacesPaginasController();
					?>	
				</section>
			</div>
		</div>
	</div>
	<footer>
		<?php if(isset($_GET['action'])){
	   if ($_GET['action'] !== 'ingreso' AND $_GET['action'] !== 'robot'){
	   	  require  "views/modules/header/footer.php";
	   }
}?>
   <script src="views/bootstrap/dataTables/js/jquery.js"></script>
   <script src="views/bootstrap/chosen/chosen.jquery.js"></script>
   <script src="views/bootstrap/js/tether.min.js"></script>
   <script src="views/bootstrap/dataTables/js/jquery.dataTables.js"></script>
   <script src="views/bootstrap/dataTables/js/dataTables.bootstrap4.js"></script>
   <script src="views/bootstrap/js/bootstrap.min.js"></script>
   <!-- <script src="http://code.highcharts.com/highcharts.js"></script>
   <script src="http://code.highcharts.com/modules/exporting.js"></script> -->
   <script src="views/bootstrap/js/app.js"></script>
   <script src="views/bootstrap/js/validarUsuario.js"></script>
   <script src="views/bootstrap/js/claseMenu.js"></script>
   <!-- <script src="views/bootstrap/js/graficos.js"></script> -->

   <script>
//    	$(function ($) {
//     $('#grafico').highcharts({
//         chart: {
//             type: 'column'
//         },

//         title: {
//             text: 'Reportes Estadísticos',
//             x: -20 //center
//         },
//         subtitle: {
//             text: 'Source: Sistemas de Ventas',
//             x: -20
//         },
//         xAxis: {
//             categories: ["<?php 
//             $a = new categoriasController();
//             $a->getCategoriasGraficoController();
//                   ?>"]
//         },
//         yAxis: {
//             title: {
//                 text: 'Cantidad Usuarios'
//             },
//             plotLines: [{
//                 value: 0,
//                 width: 1,
//                 color: '#808080'
//             }]
//         },
//         // tooltip: {
//         //     valueSuffix: 'Usuarios'
//         // },
//         legend: {
//             layout: 'vertical',
//             align: 'right',
//             verticalAlign: 'middle',
//             borderWidth: 0
//         },
//         series: [{
//             name: 'Usuarios',
//             data: [3.0]
        
//         }]
//     });
// });
$(".chosen-select").chosen({no_results_text: "Oops, No hay coincidencias!"}); 
   </script>
</footer>
</body>