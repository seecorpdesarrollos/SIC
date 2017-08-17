$(document).ready(function() {
    // e.preventDefault();
    // capta el vinculo de destino (target link).
    var path = window.location.pathname.split("/").pop();
    if (path == '') {
        path = 'inicio';
    }
    if (path == 'agragarproductos' || path == 'inventario' || path == 'okInventarios') {
        var main = 'productos';
        var target = $('nav a[href="' + main + '"]');
        target.addClass('actives');
    }
    if (path == 'agragarclientes') {
        var main = 'clientes';
        var target = $('nav a[href="' + main + '"]');
        target.addClass('actives');
    }
    if (path == 'agragarproveedores') {
        var main = 'proveedores';
        var target = $('nav a[href="' + main + '"]');
        target.addClass('actives');
    }
    if (path == 'agragarCategorias') {
        var main = 'categorias';
        var target = $('nav a[href="' + main + '"]');
        target.addClass('actives');
    }
    if (path == 'ventas' || path == 'detalles' || path == 'factura' || path == 'reportes') {
        var target = $(' a[href="' + path + '"]');
        target.addClass('active');
    }
    if (path == 'detalles' || path == 'factura' || path == 'reportes') {
        var main = 'ventas';
        var target = $('nav a[href="' + main + '"]');
        target.addClass('actives');
    }
    var cat = $('.list-group a[href="' + path + '"]');
    var target = $('nav a[href="' + path + '"]');
    target.addClass('actives');
    cat.addClass('active');
    $('#navbarDropdownMenuLink').click(function() {
        $('#navbarDropdownMenuLink').addClass('actives');
    })
});