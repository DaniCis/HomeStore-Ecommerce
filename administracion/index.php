<?php
	if(isset($_REQUEST["message"])){
		$message=$_REQUEST["message"];
	}

?>

<html>
	<head>
		<link href="styles.css" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div class="container" style='width:70vh; margin-left: 300px;'><br><br>
			<div class="card">
				<h5 class="card-header" style='text-align:center'>Inicio Sesión</h5>
				<div class="card-body">
					<form method="post" action="procesarAdmin.php" class="row g-2 needs-validation">
						<div class="col-12">
							<label class="form-label">Usuario</label>
							<input class="form-control" type="text" name="usuario" required>&nbsp<br/>
						</div>
						<div class="col-12">
							<label class="form-label">Contraseña</label>
							<input class="form-control" type="password" name="pwd" required>
						</div>
						<?php if(!empty($message)): ?>
							<p> <?= $message ?></p>
						<?php endif; ?>
						<input type="hidden" name="txtAccion" value="login">
						<div class="col-4"></div>
						<div class="col-2"><br/>
							<input class="btn btn-primary" type="submit" value="Ingresar" class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5; width:105px'>
						</div>
					</form>
				</div>
			</div>
   		</div>
	</body>
</html>
