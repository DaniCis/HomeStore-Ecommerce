<?php 
	require_once('funciones.php'); 
	session_start();
	if(!isset($_SESSION['SesionAdmin']))
	{ 
		header("Location: index.php"); 
	} 
	if(isset($_GET['pagina'])) 
		$pagina=$_GET['pagina']; 
	else $pagina=0; 
	Conectar();
	$sql="SELECT * FROM productos"; 
	$cursor = $conn->prepare($sql); 
	$cursor->execute(); $inicio=$pagina*$MaxReg;  
	$resultado=$cursor->fetchAll();
	$totalRegistros = count($resultado); 
	$cursor =null;
	$totalPaginas=ceil($totalRegistros/$MaxReg)-1; 
	$sql="SELECT * FROM productos INNER JOIN categorias on 
	productos.categorias_id_categoria=categorias.id_categoria ORDER BY id_producto LIMIT ".$inicio.",".$MaxReg; 
?>

<!DOCTYPE html>
<html>
<head>
	<link href="styles.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>
<body class="sb-nav-fixed" >
	<?php include("nav.php"); ?>
	<div id="layoutSidenav" style="margin:2em; margin-left: 3em; margin-right: 3em">
		<div id="layoutSidenav_content">
			<main>
				<h4><center>Productos</center></h4>
					<div >
						<a href="ingresarProducto.php" class='btn btn-primary'>
							<i class="bi bi-plus"> Agregar</i>
						</a>
					</div><br/>
				<form method="POST">
					<div class="table-responsive">
						<table class="table" width="50%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Producto</th>
									<th scope="col">Imagen</th>
									<th scope="col">Descripción</th>
									<th scope="col">Precio</th>
									<th scope="col">Habilitado</th>
									<th scope="col">Categoría</th>
									<th scope="col">&nbsp;</td>
									<th scope="col">&nbsp;</td>
								</tr>
							</thead>
							<tbody>
								<?php
									try{
										$cursor = $conn->query($sql);
										foreach ($cursor as $fila){
										?>
											<tr>
												<th><?= $fila["id_producto"] ?></th>
												<td><?= $fila["descripcionCorta_producto"] ?></td>
												<td><img src="../images/<?= $fila["categorias_id_categoria"] ?>/<?= $fila["foto_producto"]  ?>"width="150" height="150"?></th>
												<td><?= $fila["descripcionLarga_producto"] ?></td>
												<td><?= $fila["precio_producto"] ?></th>
												<td>
												<?php 
													if ($fila["habilitado_producto"])
														{echo "Habilitado";} 
													else{echo" No habilitado";} ?></td>
														<td><?= $fila["nombre_categoria"] ?></th>
														<td><a href="ModificarProducto.php?Id=<?= $fila["id_producto"] ?>"><i style="font-size:1.1em;color:gray" class="bi bi-pencil-square"></i></a></td>
														<td><a href="EliminarProducto.php?Id=<?= $fila["id_producto"] ?>"><i style="font-size:1.1em;color:red" class="bi bi-trash"></i></a></td>
											</tr>
											<?php
										}
									}catch (PDOException $e){
										echo("Error: ".$e->getMessage()."<br/>");
									}
									$cursor=null;
									$conn=null;
									?>
								</tbody>
						</table>
					</div>
				</form>
				<ul class="pagination justify-content-center"><?php Paginamiento($pagina,$totalPaginas, $MaxReg, "VisualizarProducto.php?")?></ul>
			</main>
		</div>
	</div>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/datatables-demo.js"></script>
</body>
</html>
