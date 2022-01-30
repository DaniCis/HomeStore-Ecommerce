<?php
	require_once('funciones.php');
	session_start();
	if(!isset($_SESSION['SesionAdmin'])){
		header("Location: index.php");
	}
	Conectar();
	$sql="SELECT * FROM compras INNER JOIN clientes on compras.clientes_id_cliente = clientes.id_cliente ORDER BY fecha_compra DESC";
	$cursor = $conn->prepare($sql);
	$cursor ->execute();

	$sqlPendiente="SELECT COUNT(*) AS pedidosPendientes FROM compras WHERE estado_compra = 'Pendiente'";
	$resultadoPendiente = $conn->query($sqlPendiente);
	foreach($resultadoPendiente as $fila2){
		$numero_Pedidos_Pendientes = $fila2["pedidosPendientes"];
	}

	$sqlAtendido="SELECT COUNT(*) AS pedidosAtendidos FROM compras WHERE estado_compra = 'Atendido'";
	$resultadoAtendido = $conn->query($sqlAtendido);
	foreach($resultadoAtendido as $fila3){
		$numero_Pedidos_Atendidos = $fila3["pedidosAtendidos"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Panel Admin HomeStore</title>
	<link href="styles.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>
<body class="sb-nav-fixed">
	<?php include("nav.php"); ?>
	<div id="layoutSidenav" style="margin:1em; margin-left: 3em; margin-right: 3em">
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h4 class="mt-4 text-center">Resumen de Compras</h4><br/>
					<div class="row" style='padding-left:10px'>
						<div class="col-xl-3 col-md-6">
							<div class="card text-white mb-4" style="background-color:#a149b7">
								<div class="card-body">
									Compras Pendientes:<br/>
									<i style='font-size:1.6rem' class="bi bi-bell-fill"></i>&nbsp;
									<?= $numero_Pedidos_Pendientes?>

								</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="VisualizarComprasPendientes.php">Ver</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card text-white mb-4" style="background-color:#9bd401">
								<div class="card-body">
									Compras Atendidas: <br/>
									<i style='font-size:1.6rem' class="bi bi-bag-check-fill"></i>&nbsp;
									<?= $numero_Pedidos_Atendidos?><i class="bi bi-123"></i></div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="VisualizarComprasAtendidas.php">Ver</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="table-responsive">
							<table class="table" width="60%" cellspacing="0">
								<thead>
									<tr>
										<th>Identificación</th>
										<th>Fecha</th>
										<th>Estado</th>
										<th>Precio Final</th>
										<th>Nombre Cliente</th>
										<th>Apellido Cliente</th>
									</tr>
								</thead>
								<tbody>
									<?php
										try{
											$cursor = $conn->query($sql);
											foreach ($cursor as $fila){
												?>
												<tr>
													<th><?= $fila["id_compra"] ?></th>
													<td><?= $fila["fecha_compra"] ?></td>
													<td><?= $fila["estado_compra"] ?></td>
													<td>$<?= $fila["precioFinal_compra"] ?></td>
													<td><?= $fila["nombres_cliente"] ?></td>
													<td><?= $fila["apellidos_cliente"] ?></td>
													<td><a href="VisualizarComprasDetalle.php?id=<?= $fila["id_compra"] ?>"><i style="font-size:1em" rem class="bi bi-search"></i></a></td>
												</tr>
												<?php
												}
											}
											catch (PDOException $e){
												echo("Error: ".$e->getMessage()."<br/>");
											}
										$cursor=null;
										?>
									</tbody>
							</table>
						</div>	
					</div>
				</div>
			</main>
		</div>

	</div>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/datatables-demo.js"></script>
</body>
</html>
