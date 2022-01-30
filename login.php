<?php
	if(!isset($_SESSION)){
		session_start();
	}	
	if(isset($_SESSION['usuario'])){
		header("Location:index.php");
		die();
	}
	require_once('includes/header.php');
	if(isset($_REQUEST["message"])){
		$message=$_REQUEST["message"];
	}
	
?>
<section style="background-image: url('images/login.png');" ><br/>
    <div class="container" style='width:65vh; margin-right: 450px;'>
		<div class="card">
			<h5 class="card-header" style='text-align:center'>Inicio Sesión</h5>
			<div class="card-body">
				<form class="row g-2 needs-validation" action="procesar.php" method="post">
					<div style='margin-left:25px; margin-right:10px;'>
						<div class="col-10">
							<label class="form-label">Correo electrónico</label>
							<input type="email" class="form-control" name="txtEmail" required>
						</div><br/>
						<div class="col-10">
							<label class="form-label">Contraseña</label>
							<input type="password" class="form-control" name="txtPassword" required>
						</div>
					</div>
					<?php if(!empty($message)): ?>
						<p> <?= $message ?></p>
					<?php endif; ?>
					<div class="col-4"></div>
					<div class="col-2"><br/>
						<button type="submit" class="btn btn-primary" style='background-color:#fbc526; border-color:#fbc526; width:105px'>Iniciar</button>
						<input type="hidden" name="txtAccion" value="login">
					</div>
					<div style='text-align:center'><br/>
						<p>No tienes una cuenta? <a href="registro.php"><br/>Regístrate aquí</a></p>
					</div>
				</form>
			</div>
		</div>
    </div>
	<br/>
</section>

<?php require_once('includes/footer.php'); ?>