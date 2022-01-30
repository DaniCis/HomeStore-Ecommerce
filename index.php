<?php
//CHANGKUON ASINC, DAVID ALEJANDRO
//CISNEROS JACOME, DANIELA ESTEFANIA
//PARRA SAMBACHE, XIOMARA DANIELA
//SALAZAR GARZóN, VICTOR RODRIGO
//VACA HERNáNDEZ, JORGE DAVID
	require_once('includes/header.php');
	require_once('includes/carousel.php');
    $pagina=0;
	if (isset($_GET['pagina']))
		if ($_GET['pagina']>0)
			$pagina=$_GET['pagina'];

	if(isset($_POST["txtNumreg"]))
		$MaxReg = $_POST["txtNumreg"];

	Conectar();
	$sqlCompleto = "SELECT id_producto FROM productos";
	$cursor = $conn->prepare($sqlCompleto);
	$cursor ->execute();	
	$resultado =$cursor->fetchAll();
	$totalRegistros=count($resultado); 
	$cursor = null;
	$pagTotal = ceil($totalRegistros/$MaxReg)-1; 

	$sqlCat ="SELECT * FROM categorias ORDER BY RAND() LIMIT 5 ";
	$sql = "SELECT id_producto, descripcionCorta_producto, foto_producto, precio_producto, categorias_id_categoria FROM productos WHERE habilitado_producto = '1' ORDER BY RAND() LIMIT ".$MaxReg;
?>
<section>
	<br/>
	<h4 style='text-align:center'>Categorías</h4><br/>
	<!-- Navegacion de categorias-->
	<div class='container' >
		<div class="row">
			<?php  
				try{
					$cursor = $conn->query($sqlCat);
					foreach($cursor as $fila)
					{
			?>
					<div class="col">
						<img src="images/<?= $fila["id_categoria"]?>/<?= $fila["imagen_categoria"]?>" style="width:20vh; height: 18vh; display:block; margin:auto; cursor:pointer;" class="rounded-circle" onclick="location.href='categoria.php?id=<?=$fila['id_categoria']?>'" alt="categoria">
						<br/>
						<div class="card-footer" >
							<small class="text-muted">
								<a href="categoria.php?id=<?=$fila['id_categoria'];?>" style="text-decoration:none; color: #38393a!important; ">
									<?=$fila['nombre_categoria'];?>
								</a>
							</small>
						</div>
					</div>
			<?php			
					}
				}catch(PDOException $e){
					echo("Error!, ".$e->getMessage()."<br/>");
				}
			?>			
		</div>
	</div>	
	<br/><br/>
	<h4 style='text-align:center'>Productos Más Vendidos</h4><br/>
	<!-- Productos aleatorios -->
	<div class="container" >
		<div>
			<ul class="pagination" style='justify-content: flex-end;'>
				<form action="index.php" method="post" class="d-flex" >
					<li class="page-item d-flex">	
						<a style='text-decoration: none; border: 1px solid #dee2e6; display: block; color: #87898b; position:relative;padding: 0.375rem 0.75rem;border-top-left-radius: 0.25rem;border-bottom-left-radius: 0.25rem;'>
							<small>Productos por página</small>
						</a>
						<select class="form-select page-link" style="width:75px; color:#87898b;" name="txtNumreg">
							<option selected value="<?= $MaxReg ?>"><?= $MaxReg ?></option>
							<?php
								if($MaxReg==20){
									echo "<option value='10'>10</option>";
									echo "<option value='40'>40</option>";
								}else if($MaxReg==10){
									echo "<option value='20'>20</option>";
									echo "<option value='40'>40</option>";
								}else{
									echo "<option value='10'>10</option>";
									echo "<option value='20'>20</option>";
								}
							?>
						</select>
					</li>
					<li class="page-item">
						<input type="submit" class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5' value="Cambiar">
					</li>
				</form>
			</ul>
		</div>
		<div class="row row-cols-1 row-cols-md-4 g-4">
			<?php
			try{
				$cursor = $conn->query($sql);
				foreach($cursor as $fila)
				{
			?>
			<div class="col">
				<div class="card" style="width:36vh; height: 56vh" >
					<img src="images/<?= $fila["categorias_id_categoria"]?>/<?= $fila["foto_producto"]?>" class="card-img-top" onclick="location.href='producto.php?id=<?= $fila['id_producto'] ?>'" style='cursor:pointer;'>
					<div class="card-body">
						<div style='height:11vh'>
							<h5 style='font-size: 15px' class="card-title"><?= $fila["descripcionCorta_producto"] ?></h5>
						</div>
						<div class="row justify-content-between">
							<div class="col-6">
								<p class="card-text">$<?= $fila["precio_producto"] ?></p>
							</div>
							<form action="carrito.php?crear=true" method="post" class="col-6">
								<input type="hidden" name="id" value="<?=$fila['id_producto']?>">
								<input type="hidden" name="nombre" value="<?=$fila['descripcionCorta_producto']?>">
								<input type="hidden" name="precio" value="<?=$fila['precio_producto']?>">
								<input type="hidden" name="cantidad" value="1">
								<div >
									<button type="submit" class="btn btn-sm btn-primary" style='background-color:#9bd401; border-color:#9bd401'>Comprar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
				}
			}
			catch(PDOException $e){
				echo("Error!, ".$e->getMessage()."<br/>");
			}
		$cursor=null;
		$conn=null;
		?>	
		</div><br/>
		<nav>
            <ul class="pagination justify-content-center">
                <?php Paginamiento($pagina, $pagTotal, $MaxReg, 'index.php?')?>
            </ul>
        </nav>
	</div>		
</section>
<?php require_once('includes/footer.php'); ?>
	