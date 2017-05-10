<?php

session_start();

if (!$_SESSION["nombreAdmin"]) {

    header("location:ingreso");

    exit();

}

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Sección Categorías
    </li>
</ol>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'okCategorias') {
        echo '<div id="ok" class="alert alert-success alert-dismissible fade show" role="alert">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
    <span aria-hidden="true">
        ×
    </span>
</button>
<strong>
    Enorabuena!
</strong>
La Categoria fue agregada correctamente.';
        echo '<meta http-equiv="Refresh" content="4;URL = categorias" >';
    }
    if ($_GET['action'] == 'editadoCat') {
        echo '
    <div class="alert alert-success alert-dismissible fade show" id="ok" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <strong>
            Enorabuena!
        </strong>
        La Categoria fue Editada correctamente al Sistema.
    </div>';
        echo '<meta content="4; URL = categorias" http-equiv="Refresh"> ';
    }
    if ($_GET['action'] == 'DeletCategorias') {
        echo '
        <div class="alert alert-warning alert-dismissible fade show" id="ok" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">
                    ×
                </span>
            </button>
            <strong>
                Enorabuena!
            </strong>
            La Categoria fue Borrada correctamente del sistema.
        </div>
        ';
        echo '
        <meta content="4;
        URL = categorias" http-equiv="Refresh">
            ';
    }
}
?>
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a class="list-group-item" href="categorias">
                            <i class="fa fa-list-alt">
                            </i>
                            Listado Categorías
                        </a>
                        <a class="list-group-item" href="agragarCategorias">
                            <i class="fa fa-edit">
                            </i>
                            Categorías Nuevas
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-block">
                            <?php if (isset($_GET['action'])): ?>
                            <?php if ($_GET['action'] == 'categorias' or $_GET['action'] == 'okCategorias' or $_GET['action'] == 'DeletCategorias' or $_GET['action'] == 'editarCat' or $_GET['action'] == 'editadoCat'): ?>
                            <h1 class="alert alert-warning text-center">
                                Listado de Categorías
                            </h1>
                            <table class="table table-striped table-sm" id="tablas">
                                <thead class="bg-inverse">
                                    <tr>
                                        <td>
                                            Id Categorias
                                        </td>
                                        <td>
                                            Nombre Categoría
                                        </td>
                                        <td>
                                            Acciones
                                        </td>
                                    </tr>
                                </thead>
                                <?php
$datos = new categoriasController();
$datos->
    getCategoriasController();
$datos->deleteCategoriaController();
?>
                            </table>
                            <?php endif?>
                            <?php if ($_GET['action'] == 'agragarCategorias'): ?>
                            <h1 class="alert alert-warning text-center">
                                Agregar Categorías
                            </h1>
                            <form method="post" onsubmit="return validarCategorias()">
                                <div class="form-group" id="form">
                                    <label for="nombreCategorias">
                                        Nombre Categorías
                                    </label>
                                    <input class="form-control" id="nombreCategorias" name="nombreCategoria" placeholder="Nombre de Categoría" required="" type="text">
                                        <input name="" type="hidden">
                                            <span id="cat">
                                            </span>
                                        </input>
                                    </input>
                                </div>
                                <input class="btn btn-outline-danger btn-block" id="button" name="agragarCategorias" type="submit" value="Agregar Categorías">
                                </input>
                            </form>
                        </div>
                    </div>
                    <?php endif?>
                    <?php endif?>
                    <?php
$admin = new Admin();
$admin->
    fecha();

$cat = new categoriasController();
$cat->agregarCategoriasController();

?>
                </div>
            </div>
        </meta>
    </meta>
</meta>