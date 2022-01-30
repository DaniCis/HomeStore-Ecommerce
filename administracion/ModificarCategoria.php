<?php
	require_once('funciones.php');
	session_start();
	if(!isset($_SESSION['SesionAdmin'])){
			header("Location: index.php");
		}
	$id=$_GET['Id'];
	$sql="SELECT * FROM categorias WHERE id_categoria=".$id;
	try{
		global $conn;
		Conectar();
		$resultado = $conn->query($sql);
		foreach($resultado as $fila)
		{
			$id_categoria = $fila["id_categoria"];
			$nombre = $fila["nombre_categoria"];
			$imagen_categoria = $fila["imagen_categoria"];
		}
		$resultado = null;
		$conn = null;
	}catch(PDOException $e){
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
			<main class='container' >
				<div class="card text-center">
					<div class="card-header">
						<h5>Modificar Categorías</h5>
					</div>
					<div class="card-body">
						<form action="procesarAdmin.php" method="post" class="row g-2 needs-validation" enctype="multipart/form-data">
							<div class="row">
								<div class="col-3">Id </div>
								<div class="col-3"><input type="text" class="form-control" name="txtId" value="<?= $id_categoria ?>" readonly></div>
							</div><br/><br/>
							<div class="row">
								<div class="col-3">Nombre</div>
								<div class="col-4"> <input class="form-control" type="text" name="txtCategoria" value="<?=$nombre ?>"></div>
							</div><br/><br/>
							<div class="row">
								<div class="col-3">Imagen</div>
								<div class="col-1"><img src="../images/<?= $id_categoria ?>/<?= $imagen_categoria ?>" width="100px"></div>
							</div><br/><br/><br/><br/><br/>
							<div class="row">
								<div class="col-3">Nueva Imagen</div>
								<div class="col-6"><input class="form-control" type="file" name="fileImagen"></div>
							</div><br/><br/><br/>
							<div class="row">
								<div class="col-5"></div>
								<div class="col-2" style="text-align:center">
									<input  class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5; width:105px' type="submit" value="Modificar">
								</div>
							</div><br/>
								<input type="hidden" name="txtImagen" value="<?= $imagen_categoria ?>">
								<input type="hidden" name="txtAccion" value="editarCategoria">
						</form>
					</div>
					<div class="card-footer text-muted">
						<a href="VisualizarCategoria.php">Regresar</a>
					</div>
				</div>
			</main>
		</div>
	</div>
</body>
</html>
