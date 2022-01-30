<?php
	if(!isset($_SESSION)){
		session_start();
	}

	if(!isset($_SESSION['usuario'])){
		header("Location:login.php");
	}
	require_once('includes/header.php');
    if(isset($_REQUEST["message"])){
		$message=$_REQUEST["message"];
	}
?>
<section>
	<div class="container" style='width:65vh; margin-left: 300px;'><br/>
		<div class="card">
			<h5 class="card-header" style='text-align:center'>Cambio de Contraseña</h5>
			<div class="card-body">
				<form class="row g-2 needs-validation" action="procesar.php" method="post">
					<div class="col-12">
						<label class="form-label">Contraseña anterior</label>
						<input type="password" class="form-control" name="txtPasswordAnt" required>
					</div>
					<div class="col-12">
						<label class="form-label">Nueva contraseña </label>
						<input type="password" class="form-control" placeholder='8 caracteres o más' pattern=".{8,} name="txtPasswordNew" required>
					</div>
					<?php if(!empty($message)): ?>
						<p> <?= $message ?></p>
					<?php endif; ?>
					<div class="col-4"></div>
					<div class="col-2"><br/>
						<button type="submit" class="btn btn-primary" style='background-color:#fbc526; border-color:#fbc526; width:105px'>Cambiar</button>
						<input type="hidden" name="txtAccion" value="cambiarPass">
					</div>
				</form>
			</div>
		</div>
    </div>
	<br/><br/>
</section>
<?php require_once('includes/footer.php'); ?>