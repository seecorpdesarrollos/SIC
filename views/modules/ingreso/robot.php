<?php

if (isset($_POST['submit'])) {
    $error = '';
    $rand = $_POST['rand'];
    $vas = $_POST['va'];
    // var_dump($rand);
    // var_dump($vas);
    if ($rand == $vas) {
        $success = '';
        $success .= '<div class="alert alert-info" role="alert">
<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw">
</i>
<span class="text-gray-dark">
    Verificando Informacion....
</span>
';
        $redirect = '<meta content="3;
        URL       = ingreso" http-equiv="Refresh">
    ';
        // header('location:ingreso');
    } else {
        $error .= "Los números ingresados  no son correcto. ";
    }
}

?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <strong>
                Lo Sentimos!
            </strong>
            <span class="text-danger">
                Ha fallado 3 veces, demuestre que no es un robot.
            </span>
        </li>
    </ol>
    <div class="row">
        <div class="col-xs-6">
            <form action="" method="post">
                <?php echo '<span class="badge rand">
                ' . $va = rand(); ?>
                <span class="badge badge-info">
                    Ingrese el número
                </span>
                <br>
                    <br>
                        <input autofocus="" class="form-control" name="rand" type="number">
                            <input name="va" type="hidden" value="<?php echo $va ?>">
                                <br>
                                    <input class="btn btn-outline-primary" name="submit" type="submit">
                                        <br>
                                            <br>
                                            </br>
                                        </br>
                                    </input>
                                </br>
                            </input>
                        </input>
                    </br>
                </br>
            </form>
        </div>
    </div>
    <br>
        <br>
            <div class="row">
                <div class="col-xs-6">
                    <?php if (!empty($error)): ?>
                    <div class="alert alert-warning alert-dismissible fade show animated fadeInDown" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                        <strong>
                            Lo Sentimos!
                        </strong>
                        <?php echo $error; ?>
                    </div>
                    <?php endif;?>
                    <?php if (!empty($success)): ?>
                    <?php
echo $success;
echo $redirect;
?>
                    <?php endif?>
                </div>
            </div>
        </br>
    </br>
</meta>