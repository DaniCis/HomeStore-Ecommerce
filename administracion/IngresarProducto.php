<?php
require_once('funciones.php');
session_start();
if(!isset($_SESSION['SesionAdmin'])){
	header("Location: index.php");
}
Conectar();
$sql="SELECT * FROM categorias";
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
<?php
$cursor = $conn->query($sql);
foreach ($cursor as $fila)
{
	$id = $fila["nombre_categoria"];
}
?>
<body class="sb-nav-fixed" >
	<?php include("nav.php"); ?>
	<div id="layoutSidenav" style="margin:1em; margin-left: 3em; margin-right: 3em">
		<div id="layoutSidenav_content">
			<main>
				<div class="card text-center">
					<div class="card-header">
						<h5>Ingresar Producto</h5>
					</div><br/>	
					<div class="card-body">
						<form class="needs-validation" action="procesarAdmin.php" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-2">Nombre:</div><div class="col-4"><input class="form-control" type="text" name="txtDescripcionC" size="50" required></div></div><br/>
								<div class="row">
									<div class="col-2">Foto: </div><div class="col-4"><input class="form-control" type="file" name="fileImagen" required></div></div><br/>
									<div class="row">
										<div class="col-2">	Descripción: </div><div class="col-4"><textarea class="form-control" name="txtDescripcionL" rows="10" cols="50" required></textarea></div></div><br/>
										<div class="row">
											<div class="col-2">Precio: </div><div class="col-4"><input class="form-control" type="number" step="0.01" name="txtPrecio" min=0 required></div></div><br/>
											<div class="row">
												<div class="col-2">Habilitado: </div><div class="col-1"><input class="form-check-input" type="checkbox" name="txtHabilitado" ></div></div><br/>
												<div class="row">
													<div class="col-2">	Categoría Id: </div><div class="col-2">
														<select class="form-select" id="categorias" name="txtCategoria" required>
															<?php $cursor = $conn->query($sql);
															foreach ($cursor as $fila)
																{?>
																	<option value="<?= $fila["nombre_categoria"] ?>"><?= $fila["nombre_categoria"] ?></option>
																<?php } ?>	
															</select></div></div>
															<br/><br/>
															<input type="hidden" name="txtAccion" value="ingresarProducto">
															<div class="row">
																<div class="col-5"></div>
																<div class="col-2" style="text-align:center"><input class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5; width:125px' type="submit" value="Ingresar"></div>
															</div>
														</form>
													</div>
													<div class="card-footer text-muted">
														<a href="VisualizarProducto.php">Regresar</a>
													</div>
												</div>
											</main>
										</div>
									</div>
								</body>
								</html>
