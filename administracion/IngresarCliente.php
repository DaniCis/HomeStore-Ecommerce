<?php
require_once('funciones.php');
session_start();
if(!isset($_SESSION['SesionAdmin'])){
	header("Location: index.php");
}
Conectar();
$sql="SELECT * FROM ciudades";
$cursor = $conn->prepare($sql);
$cursor ->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<link href="styles.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed" >
	<?php include("nav.php"); ?>
	<div id="layoutSidenav" style="margin:1em; margin-left: 3em; margin-right: 3em">
		<div id="layoutSidenav_content">
			<main>
				<div class="card text-center">
					<div class="card-header">
						<h5>Ingresar Cliente</h5>
					</div><br/>	
					<div class="card-body">
						<form class="needs-validation" action="procesarAdmin.php" method="post">
							<div class="row">
								<div class="col-2">Ciudades:</div><div class="col-4">
									<select class="form-select" id="ciudades" name="txtCiudad">
										<?php $cursor = $conn->query($sql);
										foreach ($cursor as $fila)
											{?>
												<option value="<?= $fila["nombre_ciudad"] ?>"><?= $fila["nombre_ciudad"] ?></option>
											<?php } ?>	
										</select></div></div><br/>
										<div class="row">
											<div class="col-2">Nombres: </div><div class="col-4"><input class="form-control" type="text" name="txtNombres" size="50" value="" required></div></div><br/>
											<div class="row">
												<div class="col-2">	Apellidos: </div><div class="col-4"><input class="form-control" type="text" name="txtApellidos" size="50" value="" required></div></div><br/>
												<div class="row">
													<div class="col-2">Cédula/Ruc: </div><div class="col-4"><input class="form-control" type="text" name="txtCodigo" size="50" placeholder="Cédula de 10 dígitos o ruc de 13 dígitos" pattern="[0-9]{10,13}" value="" required></div></div><br/>
													<div class="row">
														<div class="col-2">Celular: </div><div class="col-4"><input class="form-control" type="text" name="txtCelular" size="50" value="" required placeholder="Celular de 10 dígitos" pattern="[0-9]{10,10}"></div></div><br/>
														<div class="row">
															<div class="col-2">	Dirección: </div><div class="col-4"><textarea class="form-control" name="txtDireccion" rows="5" cols="50" required></textarea></div></div><br/>
															<div class="row">
																<div class="col-2">Correo: </div><div class="col-4"><input class="form-control" type="email" name="txtCorreo" size="50" required placeholder="Correo electrónico en formato correo@dominio.com" value=""></div></div><br/>		
																<div class="row">
																	<div class="col-2">Contraseña: </div><div class="col-4"><input class="form-control" type="password" name="txtContraseña" required placeholder="Contraseña de 8 caracteres o más" size="50" value="" pattern=".{8,}"></div></div><br/>
																	<br/><br/>
																	<input type="hidden" name="txtAccion" value="ingresarCliente">
																	<div class="row">
																		<div class="col-5"></div>
																		<div class="col-2" style="text-align:center"><input class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5; width:125px' type="submit" value="Ingresar"></div>
																	</div>
																</form>
															</div>
															<div class="card-footer text-muted">
																<a href="VisualizarCliente.php">Regresar</a>
															</div>
														</div>
													</main>
												</div>
											</div>
										</body>
										</html>
