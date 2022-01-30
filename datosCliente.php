<?php

	if(!isset($_SESSION['usuario'])){
		header("Location:login.php");
	}
	require_once('includes/header.php');
	Conectar();
	if (isset($_SESSION['usuario'])) {
		try{
			$records = $conn->prepare('SELECT * FROM ciudades WHERE id_ciudad = :id');
			$records->bindParam(':id', $_SESSION['usuario']['ciudades_id_ciudad']);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			$ciudad = null;
			if (count($results) > 0) 
				$ciudad = $results;
		}catch(PDOException $e){
			echo("Error!, ".$e->getMessage()."<br/>");
		}
	}
	$sql = "SELECT * FROM ciudades";
?>

<section>
    <div class='container' style='width:85vh; margin-left:250px;'><br/>	
		<div class="card" >
			<h5 class="card-header" style='text-align:center'>Actualice la siguiente información</h5>
			<div class="card-body" style='margin-left:15px; margin-right:10px;'>
				<form class="row g-2" action="procesar.php" method="post">
					<div class="col-6">
						<label class="form-label">Nombres</label>
						<input type="text" class="form-control" disabled readonly name="txtNombres" value='<?=$_SESSION['usuario']['nombres_cliente']?>'>
					</div>
					<div class="col-6">
						<label class="form-label">Apellidos</label>
						<input type="text" class="form-control" disabled readonly name="txtApellidos" value='<?=$_SESSION['usuario']['apellidos_cliente']?>'>
					</div>
					<div class="col-md-6">
						<label class="form-label">Cédula o Ruc</label>
						<input type="text" class="form-control" name="txtCedula" placeholder="Cédula de 10 dígitos o ruc de 13 dígitos" pattern="[0-9]{10,13}" value='<?=$_SESSION['usuario']['cod_cliente']?>'>
					</div>
					<div class="col-md-6">
						<label class="form-label">Celular</label>
						<input type="text" class="form-control" name="txtCelular" placeholder="Celular de 10 dígitos" pattern="[0-9]{10,10}" value='<?=$_SESSION['usuario']['celular_cliente']?>'>
					</div>
					<div class="col-md-8">
						<label  class="form-label">Dirección de Entrega</label>
						<input type="text" class="form-control" name="txtDireccion" value='<?=$_SESSION['usuario']['direccion_cliente']?>'>
					</div>
					<div class="col-md-4">
						<label class="form-label">Ciudad</label>
						<select  class="form-select" name="txtCiudad" >
							<option selected value='<?=$_SESSION['usuario']['ciudades_id_ciudad']?>'><?= $ciudad['nombre_ciudad']?></option>
							<?php
								try{
									$cursor = $conn->query($sql);
									foreach($cursor as $fila)
									{
							?>
							<option value="<?= $fila["id_ciudad"] ?>"><?= $fila["nombre_ciudad"] ?></option>
							<?php
									}
								}
								catch(PDOException $e){
									echo("Error!, ".$e->getMessage()."<br/>");
								}
							$cursor = null;
							$conn = null;
							?>	
						</select>
					</div>
					<div class="col-md-12">
						<label class="form-label">Correo Electrónico</label>
						<input type="email" class="form-control" name="txtEmail" value='<?=$_SESSION['usuario']['correo_cliente']?>'> 
					</div>
					<?php if(!empty($message)): ?>
						<p> <?= $message ?></p><br/>
					<?php endif; ?>
					<div class="col-4"></div>
					<div class="col-3"><br/>
						<button type="submit" class="btn btn-primary" style='background-color:#fbc526; border-color:#fbc526; width:150px'>Actualizar</button>
						<input type="hidden" name="txtAccion" value="actualizar">
					</div>
				</form>
			</div>
		</div>
	</div><br/>
</section>
<?php require_once('includes/footer.php'); ?>
