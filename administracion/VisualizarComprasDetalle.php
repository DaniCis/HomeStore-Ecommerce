<?php
require_once('funciones.php');
session_start();
if(!isset($_SESSION['SesionAdmin'])){
	header("Location: index.php");
}
if (isset($_GET['pagina']))
	$pagina=$_GET['pagina'];
else
	$pagina=0;
Conectar();
$id=$_GET['id'];
$sql="SELECT * FROM detallecompras WHERE compras_id_compra='".$id."'";
$cursor = $conn->prepare($sql);
$cursor ->execute();
$inicio=$pagina*$MaxReg; 
$resultado=$cursor->fetchAll();
$totalRegistros = count($resultado);
$cursor =null;
$totalPaginas=ceil($totalRegistros/$MaxReg)-1;
$sql2="SELECT * FROM detallecompras INNER JOIN compras on detallecompras.compras_id_compra = compras.id_compra INNER JOIN clientes on compras.clientes_id_cliente = clientes.id_cliente INNER JOIN productos on detallecompras.productos_id_producto = productos.id_producto WHERE compras_id_compra='".$id."' LIMIT ".$inicio.",".$MaxReg;

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
				<table class="table " width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID de la Compra</th>
							<th>Nombre Cliente</th>
							<th>Apellido Cliente</th>
							<th>Celular Cliente</th>
							<th>Precio Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							try{
								$bandera=0;
								$cursor = $conn->query($sql2);
								foreach ($cursor as $fila)
								{
									?>
									<tr>
										<th><?= $fila["id_compra"] ?></th>
										<td><?= $fila["nombres_cliente"] ?></td>
										<td><?= $fila["apellidos_cliente"] ?></td>
										<td><?= $fila["celular_cliente"] ?></td>
										<td><?= $fila["precioFinal_compra"] ?></td>
									</tr>
									<?php
									$bandera++;
									if ($bandera==1)
										break;
								}
							}
							catch (PDOException $e)
							{
								echo("Error: ".$e->getMessage()."<br/>");
							}
							$cursor=null;

							?>
						</tbody>
					</table>
					<h1><center>Detalle de Compras</center></h1>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>	
								<tr>
									<th scope="col">Cantidad</th>
									<th scope="col">Producto</th>
									<th scope="col">Precio Unitario</th>
									<th scope="col">Precio Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								try{
									$cursor = $conn->query($sql2);
									foreach ($cursor as $fila)
									{
										?>
										<tr>
											<th><?= $fila["cantidad_detalleCompra"] ?></th>
											<td><?= $fila["descripcionCorta_producto"] ?></td>
											<td><?= $fila["precio_producto"] ?></td>
											<td><?= round($fila["precio_producto"]*$fila["cantidad_detalleCompra"],2) ?></td>
										</tr>
										<?php
									}
								}
								catch (PDOException $e)
								{
									echo("Error: ".$e->getMessage()."<br/>");
								}
								$cursor=null;

								?>
								<tr>
									<td colspan="4">
										<ul class="pagination justify-content-center"><?php Paginamiento($pagina,$totalPaginas, $MaxReg, "VisualizarComprasDetalle.php?id=".$id."&")?></ul>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-1"><a href="Administracion.php">Regresar</a></div></div>
				</main>
			</div>

		</div>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
	</body>
	</html>