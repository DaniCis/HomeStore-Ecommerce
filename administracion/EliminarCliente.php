<?php
require_once('funciones.php');
session_start();
if(!isset($_SESSION['SesionAdmin'])){
	header("Location: index.php");
}
$id=$_GET['Id'];
$sql="SELECT * FROM clientes WHERE id_cliente=".$id;
try{
	global $conn;
	Conectar();
	$resultado = $conn->query($sql);
	foreach($resultado as $fila)
	{
		$id_cliente = $fila["id_cliente"];
		$ciudades_id_ciudad = $fila["ciudades_id_ciudad"];
		$nombres_cliente = $fila["nombres_cliente"];
		$apellidos_cliente = $fila["apellidos_cliente"];
		$cod_cliente = $fila["cod_cliente"];
		$celular_cliente = $fila["celular_cliente"];
		$direccion_cliente = $fila["direccion_cliente"];
		$correo_cliente = $fila["correo_cliente"];
		$contraseña_cliente = $fila["contraseña_cliente"];
	}
	$resultado = null;
	$conn = null;
	$sql="SELECT nombre_ciudad FROM ciudades WHERE id_ciudad=".$ciudades_id_ciudad;
	global $conn;
	Conectar();
	$resultado = $conn->query($sql);
	foreach($resultado as $fila)
	{
		$ciudad = $fila["nombre_ciudad"];
	}
}
catch(PDOException $e)
{
	echo ("Error: ".$e->getMessage()."<br/>");
}
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
						<h5>Eliminar Clientes</h5>
					</div>
					<div class="card-body">
						<form action="procesarAdmin.php" method="post">
							<div class="row">
								<div class="col-2">Id: </div><div class="col-1"><input class="form-control" type="text" name="txtId" size="50" value="<?=$id_cliente ?>" readonly></div></div><br/>
								<div class="row">
									<div class="col-2">Ciudades:</div><div class="col-4"><input class="form-control" type="text" name="txtCiudad" value="<?=$ciudad?>" readonly></div></div><br/>
									<div class="row">
										<div class="col-2">Nombres: </div><div class="col-4"><input class="form-control" type="text" name="txtNombres" size="50" value="<?=$nombres_cliente ?>"readonly></div></div><br/>
										<div class="row">
											<div class="col-2">	Apellidos: </div><div class="col-4"><input class="form-control" type="text" name="txtApellidos" size="50" value="<?=$apellidos_cliente ?>"readonly ></div></div><br/>
											<div class="row">
												<div class="col-2">Cédula/RUC: </div><div class="col-4"><input class="form-control" type="text" name="txtCodigo" size="50" value="<?=$cod_cliente ?>" readonly></div></div><br/>
												<div class="row">
													<div class="col-2">Celular: </div><div class="col-4"><input class="form-control" type="text" name="txtCelular" size="50" value="<?=$celular_cliente ?>" pattern="[0-9]{10,10}" readonly></div></div><br/>
													<div class="row">
														<div class="col-2">	Dirección: </div><div class="col-4"><textarea class="form-control" name="txtDireccion" rows="5" cols="50" readonly><?=$direccion_cliente ?></textarea></div></div><br/>
														<div class="row">
															<div class="col-2">Correo: </div><div class="col-4"><input class="form-control" type="email" name="txtCorreo" size="50" value="<?=$correo_cliente ?>" readonly></div></div><br/>		
															<div class="row">
																<div class="col-2">Contraseña: </div><div class="col-4"><input class="form-control" type="password" name="txtContraseña" size="50" value="<?=$contraseña_cliente ?>" pattern=".{8,}" readonly></div></div><br/>
																<br/><br/>
																<div class="row">
																	<div class="col-5"></div>
																	<div class="col-2" style="text-align:center"><input class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5; width:105px' type="submit" value="Eliminar"></div>
																</div>
																<input type="hidden" name="txtAccion" value="eliminarCliente">
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
