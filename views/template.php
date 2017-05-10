<?php require "views/modules/header/header.php"?>
<?php if (isset($_GET['action'])) {
    if ($_GET['action'] !== 'ingreso' and $_GET['action'] !== 'robot') {
        require "views/modules/header/menu.php";
    }
}?>
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <section>
                <hr>
                    <?php
$mvc = new MvcController();
$mvc->
                    enlacesPaginasController();
?>
                </hr>
            </section>
        </div>
    </div>
</div>
<footer>
    <?php if (isset($_GET['action'])) {
    if ($_GET['action'] !== 'ingreso' and $_GET['action'] !== 'robot') {
        require "views/modules/header/footer.php";
    }
}?>
    <script src="views/bootstrap/dataTables/js/jquery.js">
    </script>
    <script src="views/bootstrap/chosen/chosen.jquery.js">
    </script>
    <script src="views/bootstrap/js/tether.min.js">
    </script>
    <script src="views/bootstrap/dataTables/js/jquery.dataTables.js">
    </script>
    <script src="views/bootstrap/dataTables/js/dataTables.bootstrap4.js">
    </script>
    <script src="views/bootstrap/js/bootstrap.min.js">
    </script>
    <script src="views/bootstrap/js/app.js">
    </script>
    <script src="views/bootstrap/js/validarUsuario.js">
    </script>
    <script src="views/bootstrap/js/claseMenu.js">
    </script>
</footer>
