
<?php 

 if (isset($_POST['submit'])) {
 	$error  ='';
 	$rand = $_POST['rand'];
    $vas = $_POST['va'];
    // var_dump($rand);
    // var_dump($vas);
 	 if ($rand == $vas) {
 	 	$success = '';
 	 	$success.= '<div class="alert alert-info" role="alert">
             <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
				<span class="text-gray-dark">Verificando Informacion....</span>
              </div>';
		$redirect= "<META HTTP-EQUIV='Refresh' CONTENT='3; URL=ingreso'>";;
 	     // header('location:ingreso');
 	 }else{
 	 	$error .= "Los números ingresados  no son correcto. ";
 	 }
  }


 ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item active"><strong>Lo Sentimos! </strong><span class="text-danger"> Ha fallado 3 veces, demuestre que no es un robot.</span></li>
</ol>
<div class="row">
	<div class="col-xs-6">
		<form action="" method="post">
			<?php echo '<span class="badge rand">'.$va = rand(); ?>  <span class="badge badge-info"> Ingrese el número</span><br><br>
			<input type="number" name="rand" autofocus="" class="form-control">
			<input type="hidden" name="va" value="<?php echo $va ?>">
			<br>
			<input type="submit" name="submit" class="btn btn-outline-primary">
			<br><br>
		</form>
	</div>
</div><br><br>
   <div class="row">
	<div class="col-xs-6">
			<?php if(!empty($error)): ?>
			<div class="alert alert-warning alert-dismissible fade show animated fadeInDown" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  <strong>Lo Sentimos!</strong><?php echo $error; ?>
			</div>
			<?php endif; ?>
			<?php if (!empty($success)): ?>
				<?php 
				echo $success;
				echo $redirect;
				 ?>
			<?php endif ?>
   </div>
</div>