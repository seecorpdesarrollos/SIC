<?php session_start();if (!$_SESSION["nombreAdmin"]) {header("location:ingreso");exit();}?>
<body class="body">
    <div class="mains">
        <div class="card bg-primary text-white">
            <div class="card-block">
                Esta sección es exclusiva para  el Administrador del sistema.
            </div>
        </div>
        <br/>
        <div class="row">
            <!-- <center> -->
            <div class="col-lg-5">
                <figure>
                    <img height="300" src="views/bootstrap/img/logsin.png"/>
                </figure>
            </div>
            <?php $result = ProductosController::getInventarioController();?>
            <div>
            </div>
            <div class="col-lg-7">
              <p class="font-italic text text-uppercase"><u>Seccíón de inventario.</u></p>
                <div class="card">
                    <div class="card-block">
                <div class="alert alert-warning" align="center ">
                    <?php echo date('d-m-Y H:i') ?>
                </div>
                        <?php foreach ($result as $key): ?>
                        <?php if ($key['existenciaActual'] <= 10): ?>
                        <div class="alert alert-danger">
                            <h5>
                                <strong>
                                    <?php echo 'Quedan ' . $key['existenciaActual'] . ' unidades de ' . $key['nombreProducto']; ?>
                                </strong>
                            </h5>
                        </div>
                        <?php endif?>
                        <?php endforeach?>
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
