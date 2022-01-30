<?php
require_once('funciones.php');
session_start();
if(!isset($_SESSION['SesionAdmin'])){
	header("Location: index.php");
}
$id=$_GET['Id'];
$sql="SELECT * FROM productos WHERE id_producto=".$id;
try{
	global $conn;
	Conectar();
	$resultado = $conn->query($sql);
	foreach($resultado as $fila)
	{
		$id_producto = $fila["id_producto"];
		$descripcionCorta_producto = $fila["descripcionCorta_producto"];
		$foto_producto = $fila["foto_producto"];
		$descripcionLarga_producto = $fila["descripcionLarga_producto"];
		$precio_producto = $fila["precio_producto"];
		$habilitado_producto = $fila["habilitado_producto"];
		$categorias_id_categoria = $fila["categorias_id_categoria"];
	}
	$resultado = null;
	$conn = null;
	$sql="SELECT nombre_categoria FROM categorias WHERE id_categoria=".$categorias_id_categoria;
	global $conn;
	Conectar();
	$resultado = $conn->query($sql);
	foreach($resultado as $fila)
	{
		$categoria = $fila["nombre_categoria"];
	}
}
catch(PDOException $e)
{
	echo ("Error: ".$e->getMessage()."<br/>");
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
<body class="sb-nav-fixed" >
	<?php include("nav.php"); ?>
	<div id="layoutSidenav" style="margin:1em; margin-left: 3em; margin-right: 3em">
		<div id="layoutSidenav_content">
			<main class='container' >
				<div class="card text-center">
					<div class="card-header">
						<h5>Modificar Productos</h5>
					</div>
					<div class="card-body">
						<form action="procesarAdmin.php" method="post" id="textarea" enctype="multipart/form-data">
							<div class="row">
								<div class="col-2">Id: </div><div class="col-4"><input class="form-control" type="text" name="txtId" size=50 value="<?= $id_producto ?>" readonly></div></div><br/>
								<div class="row">
									<div class="col-2">Descripción Corta: </div><div class="col-4"><input class="form-control" type="text" size=50 name="txtDescripcionC" value="<?= $descripcionCorta_producto ?>"></div></div><br/>
									<div class="row">
										<div class="col-2">Foto: </div><div class="col-4"><img src="../images/<?= $categorias_id_categoria ?>/<?= $foto_producto ?>" width="250" height="250" ></div><div class="col-4"><input class="form-control"  type="file" name="fileImagen"></div></div><br/>
										<div class="row">
											<div class="col-2">	Descripción Larga: </div><div class="col-4"><textarea class="form-control" name="txtDescripcionL" rows="10" cols="50"><?= $descripcionLarga_producto ?></textarea></div></div><br/>
											<div class="row">
												<div class="col-2">Precio: </div><div class="col-2"><input class="form-control" type="number" step="0.01" name="txtPrecio" size=50 min=0 value="<?= $precio_producto ?>"></div></div><br/>
												<div class="row">
													<div class="col-2">Habilitado: </div><div class="col-1"><input class="form-check-input" type="checkbox" name="txtHabilitado" value="<?= $habilitado_producto ?>" <?php if($habilitado_producto==1){?>checked<?php }?>></div></div><br/>	
													<div class="row">
														<div class="col-2">Categoría:</div><div class="col-4">
															<select class="form-select" id="categorias" name="txtCategoria">		
																<?php $cursor = $conn->query($sql);
																foreach ($cursor as $fila)
																{ 
																	if ($categoria == $fila["nombre_categoria"]) {?>
																		<option value="<?= $fila["nombre_categoria"] ?>" selected><?= $fila["nombre_categoria"] ?></option>
																		<?php 
																	}else {?>
																		<option value="<?= $fila["nombre_categoria"] ?>"><?= $fila["nombre_categoria"] ?></option>
																		<?php 
																	}
																} ?>	
															</select>
														</div>
													</div>
													<br/><br/>
													<div class="row">
														<div class="col-5"></div>
														<div class="col-2" style="text-align:center"><input class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5; width:105px' type="submit" value="Modificar"></div>
													</div>
													<input type="hidden" name="txtImagen" value="<?= $foto_producto ?>">
													<input type="hidden" name="txtAccion" value="editarProducto">
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
