<?php session_start();if (!$_SESSION["nombreAdmin"]) {header("location:ingreso");exit();} else if ($_SESSION['rol'] !== 'A') {header('location:inicioUs');exit();}?>
<body class="body">
    <div class="mains">
        <div class="card bg-primary text-white">
            <div class="card-block">
                Esta sección es exclusiva para  el Administrador del sistema.
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-lg-5">
                <figure>
                    <img height="300" src="views/bootstrap/img/logsin.png"/>
                </figure>
            </div>
            <?php $result = ProductosController::getInventarioController();?>
            <div>
            </div>
            <div class="col-lg-7">
                <p class="font-italic text text-uppercase">
                    <u class="alert badge-danger text-white">
                        Se visualizará todo producto que su inventario sea menor a 10 Unidades.
                    </u>
                </p>
                <div class="card">
                    <div class="card-block">
                        <div class="alert alert-info text-gray-dark" align="center ">
                            <?php echo date('d-m-Y H:i') ?>
                        </div>
                        <div class="card card-block">
                            <?php foreach ($result as $key): ?>
                            <?php if ($key['cantidadIngresada'] < 10): ?>
                            <div class="alert alert-danger">
                                <h5>
                                    <strong>
                                        <?php echo 'Quedan ' . $key['cantidadIngresada'] . ' unidades de ' . $key['nombreProducto']; ?>
                                    </strong>
                                </h5>
                            </div>
                        </div>
                        <?php endif?>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $admin = new Admin();
$admin->
    fecha();
?>
</br>
</div>
</body>
