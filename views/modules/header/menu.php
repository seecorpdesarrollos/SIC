<?php if ($_SESSION['rol'] == 'A'): ?>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse nav">
    <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon">
        </span>
    </button>
    <a class="navbar-brand" href="inicio">
        Sistema
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="categorias" id="cate">
                    Categorías
                    <span class="sr-only">
                        (current)
                    </span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="productos">
                    Productos
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="proveedores">
                    Proveedores
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="ventas">
                    Ventas
                </a>
            </li>
            <li class="nav-item dropdown navbar-toggler-right active">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle animated bounceInDown" data-toggle="dropdown" href="config" id="navbarDropdownMenuLink">
                    <span class="usu">
                        <i class="fa fa-user">
                        </i>
                    </span>
                    <?php echo strtoupper($_SESSION['nombreAdmin']); ?>
                </a>
                <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                    <a class="dropdown-item" href="sesion">
                        <i class="fa fa-close">
                        </i>
                        Salir
                    </a>
                    <a class="dropdown-item" href="config">
                        <i class="fa fa-gear">
                        </i>
                        Configuración
                    </a>
                    <a class="dropdown-item" href="https://diegopennisi.es/" target="_blanck">
                        <i class="fa fa-support">
                        </i>
                        Soporte
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarNavDropdown" data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon">
        </span>
    </button>
    <a class="navbar-brand" href="inicioUs">
        Sistema
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="categorias">
                    Categorías
                    <span class="sr-only">
                        (current)
                    </span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="productos">
                    Productos
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="proveedores">
                    Proveedores
                </a>
            </li>
            <li class="nav-item dropdown navbar-toggler-right active">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle animated bounceInDown" data-toggle="dropdown" href="https://diegopennisi.es" id="navbarDropdownMenuLink">
                    <span class="usu">
                        <i class="fa fa-user">
                        </i>
                    </span>
                    <?php echo strtoupper($_SESSION['nombreAdmin']); ?>
                </a>
                <div aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                    <a class="dropdown-item" href="sesion">
                        <i class="fa fa-close">
                        </i>
                        Salir
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php endif?>
