$(document).ready(function() {
    var ventana = $(window).width();
    var ventanas = $(window).height();
    // console.log(ventanas);
    // console.log(ventana);
    if (ventana <= 700) {
        // console.log(ventana);
        $('#tablas').addClass('table-responsive');
        $('#ventas').addClass('table-responsive');
        $('#tablas').removeClass('dataTable');
        $('.fa').removeClass('btn');
        $('.dropdown').removeClass('navbar-toggler-right');
    }
    $('#no').click(function() {
        window.location = 'config';
    })
});
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});
$('#ok').hide(8000);
$('#verCliente').modal('show');
$('#password').modal('show');
$('#noCliente').modal('show');
$('#editar').modal('show');
$('#editarCat').modal('show');
$('#tablas').DataTable({
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
$(function() {
    // elementos de la lista
    var menues = $(".nav li");
    // manejador de click sobre todos los elementos
    menues.click(function() {
        // eliminamos active de todos los elementos
        menues.removeClass("active");
        // activamos el elemento clicado.
        $(this).addClass("active");
    });
});
$(".chosen-select").chosen({
    no_results_text: "Oops, No hay coincidencias!"
});
$("#enviar").click(function() {
    $("div#myPrintArea").printArea();
})