<?php
	require_once('includes/funciones.php');
	if(isset($_POST["txtNumreg"]))
		$MaxReg = $_POST["txtNumreg"];
	setcookie("VCookie", $MaxReg ,time() + (60*60*24*365));
	Conectar();
	$sql = "SELECT * FROM categorias";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>HomeStore</title>
	</head>
	<body>
		<!-- nav carrito y sesion 	-->	
		<div style="background-color:#e3e1dc; ">
			<div class='row' style=" justify-content:flex-end;height: 30px; margin-right: 0px;">
				<div class="col-4" style="background-color:#e3e1dc">
					<?php
					if(!isset($_SESSION['habilitarCar'])){?>
						<button class="btn" style="display:inline;color:black" data-bs-toggle="modal" data-bs-target="#exampleModal">
							<i style="font-size: 1.3rem;" class="bi bi-cart-fill"></i> 
						</button>
					<?php 
					}
					if(isset($_SESSION['usuario'])):							
					?>
					<div class="dropdown" style="display:inline;">
						<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							<i style="font-size: 1.3rem;" class="bi bi-person-fill"></i> &nbsp;<?=$_SESSION['usuario']['nombres_cliente']?>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<li><a class="dropdown-item" href="datosCliente.php">Mi cuenta</a></li>
							<li><a class="dropdown-item" href="comprasCliente.php">Mis compras</a></li>
							<li><a class="dropdown-item" href="cambioPass.php">Cambiar contraseña</a></li>
							<li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
						</ul>
					</div>
					<?php else:?>
					<button onclick="location.href='login.php'"class='btn'>
						<i style="font-size: 1.3rem;" class="bi bi-person-fill"></i> &nbsp; Acceder
					</button>
					<?php endif;?>
				</div>
			</div>
		</div>
		<!-- Carrito de compras-->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Carrito de compras</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<table class="table table-hover">			
						<?php
							if(isset($_SESSION['cart'])){
								?>
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Producto</th>
										<th scope="col">Cantidad</th>
										<th scope="col">Precio</th>
										<th scope="col"> </th>
									</tr>
								</thead>
								<tbody>
								<?php
								$cont=0;
								$precioTotal=0;
								foreach($_SESSION['cart'] as $id => $arr){
									$cont+=1; 
									?>	
									<tr>
										<th scope="row"><?=$cont?></th>
									<?php						
									foreach($arr as $key => $value){										
										if($key == "cantidad"){
											$cantidad = $value
											?>
											<td>
												<form action="carrito.php?actualizar=true" method="post">
													<input type="hidden" name="id" value="<?=$id?>">
													<input type="number" style="width:45px" name="cantidad" value="<?=$value?>">
													<button class="btn" type="submit" style="width:25px">
														<i class="bi bi-arrow-repeat"></i>
													</button>
												</form>
											</td>
											<?php
										}
										else{
											if($key=="precio"){
												$value = $cantidad * $value;
												$precioTotal = $precioTotal + $value;
											}
											?>											
											<td><?=$value?></td>
										<?php
										}					
									}
									?>
										<td>
											<a class="btn" href="carrito.php?eliminar=<?=$id?>">
											<i style="font-size: 1.3rem; color:red" class="bi bi-trash"></a></i>
										</td>
									</tr>
									<?php
								}
								?>
								</tbody>
								<tfoot>
									<tr>
										<td></td>
										<td></td>
										<td>Precio Total:</td>
										<td>$<?=$precioTotal?></td>
									</tr>
								</tfoot>
								<?php							
							}else{?>
								<div>
									<img src="images/empty-cart.svg" style='display:block;margin:auto; width:50%' ><br/>
									<p style='text-align:center'>Carrito vacío</p>
								</div>
							<?php
							}
						?>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<a href="carrito.php?usuario=true"> 
						<button type="button" class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5'>Comprar</button>
					</a>
				</div>
				</div>
			</div>
		</div>
		<!-- nav categoria y buscar -->
		<div class="row " style="justify-content:space-between; align-items: center; background-color:#e3e1dc; margin-right: 0px; margin-left: 0px;">
			<nav class="col-7 navbar navbar-expand-lg navbar-light " style="background-color:#e3e1dc;    padding-top: 0px; margin-right: 0px;">
				<div class="container-fluid" >
					<a class="navbar-brand" href="index.php">
						<img src="images/logo.png" alt="logo" width='90%'>
					</a>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Categorías
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?php  
										try{
											$cursor = $conn->query($sql);
											foreach($cursor as $fila)
											{
									?>
												<li><a class="dropdown-item" href="categoria.php?id=<?= $fila["id_categoria"]?>"><?= $fila["nombre_categoria"]?></a></li>
												<li><hr class="dropdown-divider"></li>
									<?php
											}
										}
										catch(PDOException $e){
											echo("Error!, ".$e->getMessage()."<br/>");
										}
									?>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link"  href="nosotros.php">Nosotros</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contacto.php">Contacto</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="col-4 d-flex" >
				<form class="d-flex" action="busqueda.php" method="post">
					<input class="form-control" type="search" placeholder="Buscar" name="txtBuscar">
						<button class="btn" type="submit">
							<i class="bi bi-search"></i>
						</button>
				</form>
				&nbsp;&nbsp;
				<!-- Busqueda Avanzada-->
				<form action="busquedaAvanzada.php" method="post">
					<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style='background-color:#12bfb5; border-color:#12bfb5'>
						<i class="bi bi-funnel"></i>
					</button>
					<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
						<div class="offcanvas-header" style="padding-bottom: 0px;">
							<h5 id="offcanvasRightLabel">Búsqueda Avanzada</h5>
							<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body" style='padding-left: 32px;padding-right: 60px;'>
							<div><strong>Flitrar precios</strong><br/>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="precio" value="rango1" >
									<label class="form-check-label" >
										Menor a $100
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="precio" value="rango2">
									<label class="form-check-label" >
										$100 a $400
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="precio" value="rango3">
									<label class="form-check-label" >
										$400 a $700
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="precio" value="rango4">
									<label class="form-check-label" >
										Mayor a $700
									</label>
								</div>
							</div><br/>
							<div><strong>Ordenar por precios</strong>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="orden" value="precioDESC">
									<label class="form-check-label" >
										Más alto
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="orden" value="precioASC">
									<label class="form-check-label" >
										Más bajo
									</label>
								</div>
							</div><br/>
							<div><strong>Nombre del producto</strong>
								<br/>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="orden" value="ordenASC" >
									<label class="form-check-label" >
										<i style="font-size: 1.4rem" class="bi bi-sort-alpha-down"></i>
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="orden" value="ordenDESC">
									<label class="form-check-label" >
										<i style="font-size: 1.4rem" class="bi bi-sort-alpha-down-alt"></i>
									</label>
								</div>
							</div><br/>
							<div><strong>Categorías</strong><br/>
								<?php  
									try{
										$cont=0;
										$cursor = $conn->query($sql);
										foreach($cursor as $fila)
										{
											$cont+=1;
									?>		
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="checkbox<?= $fila['id_categoria']?>" value="<?= $fila['id_categoria']?>">
											<label class="form-check-label">
												<?= $fila['nombre_categoria']?>
											</label>
										</div>
									<?php
										}
										?><input type='hidden' name='longitudcheck' value='<?=$cont?>'>
										<?php
									}
									catch(PDOException $e){
										echo("Error!, ".$e->getMessage()."<br/>");
									}
									$cursor=null;
									$conn=null;
								?>
							</div><br/>
							<div style="text-align:right">
								<button type="submit" class="btn btn-primary" name="busAvanzada" style='background-color:#12bfb5; border-color:#12bfb5'>Buscar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>	