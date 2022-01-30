<?php
	require_once('includes/header.php');
	Conectar();
	$sqlCiudad = "SELECT * FROM ciudades";
	
	if(isset($_REQUEST["message"])){
		$message=$_REQUEST["message"];
	}
?>
<section style="background-image: url('images/registro.png');">
    <div class='container' style='width:85vh; margin-left:350px;'><br/>
		<div class="card" >
			<h5 class="card-header" style='text-align:center'>Registro</h5>
			<div class="card-body" style='margin-left:15px; margin-right:10px;'>
				<form class="row g-2 needs-validation" action="procesar.php" method="post" >
					<div class="col-6">
						<label class="form-label">Nombres</label>
						<input type="text" class="form-control"  name="txtNombres" required>
					</div>
					<div class="col-6">
						<label class="form-label">Apellidos</label>
						<input type="text" class="form-control" name="txtApellidos" required>
					</div>
					<div class="col-md-6">
						<label class="form-label">Cédula o Ruc</label>
						<input type="text" class="form-control" name="txtCedula" placeholder="Cédula de 10 dígitos o ruc de 13 dígitos" pattern="[0-9]{10,13}" value="" required>
					</div>
					<div class="col-md-6">
						<label class="form-label">Celular</label>
						<input type="text" class="form-control" placeholder="Celular de 10 dígitos" pattern="[0-9]{10,10}" value="" name="txtCelular" required>
					</div>
					<div class="col-md-6">
						<label  class="form-label">Dirección de Entrega</label>
						<input type="text" class="form-control" name="txtDireccion" required>
					</div>
					<div class="col-md-6">
						<label class="form-label">Ciudad</label>
						<select  class="form-select" name="txtCiudad">
							<option selected></option>
							<?php
								try{
									$cursor = $conn->query($sqlCiudad);
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
					<div class="col-md-6">
						<label class="form-label">Correo Electrónico</label>
						<input type="email" class="form-control" name="txtEmail" required>
					</div>
					<div class="col-md-6">
						<label class="form-label">Contraseña</label>
						<input type="password" class="form-control" name="txtPassword" placeholder='8 caracteres o más' pattern='.{8,}' required>
					</div>
					<?php if(!empty($message)): ?>
						<p> <?= $message ?></p><br/>
					<?php endif; ?>
					<div class="col-4"></div>
					<div class="col-3"><br/>
						<button type="submit" class="btn btn-primary" style='background-color:#fbc526; border-color:#fbc526; width:150px'>Registrarse</button>
						<input type="hidden" name="txtAccion" value="registro">
					</div>
					<div style='text-align:center'><br/>
						<p>Ya tienes una cuenta? <a href="login.php"><br/>Inicia sesión aquí</a></p>
					</div>
				</form>
			</div>
		</div>
	</div><br/>
</section>

<?php require_once('includes/footer.php'); ?>
