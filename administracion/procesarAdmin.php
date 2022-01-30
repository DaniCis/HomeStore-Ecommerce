<?php
require_once('funciones.php');
$accion = $_POST["txtAccion"];
switch($accion)
{
	case "login":
		login();
		break;
	case "editarContrasenaAdmin":
		$id = $_POST["idAdmin"];
		actualizarContrasenaAdmin($id);
		break;
	case "modificarAtendido":
		$id = $_POST["id_compra"];
		actualizarPedidoAtendido($id);
		break;
	case "ingresarCategoria":
		ingresarCategoria();
		break;
	case "editarCategoria":
		$id = $_POST["txtId"];
		actualizarCategoria($id);
		break;
	case "eliminarCategoria":
		$id = $_POST["txtId"];
		eliminarCategoria($id);
		break;
	case "ingresarProducto":
		ingresarProducto();
		break;
	case "editarProducto":
		$id = $_POST["txtId"];
		actualizarProducto($id);
		break;
	case "eliminarProducto":
		$id = $_POST["txtId"];
		eliminarProducto($id);
		break;
	case "ingresarCiudad":
		ingresarCiudad();
		break;
	case "editarCiudad":
		$id = $_POST["txtId"];
		actualizarCiudad($id);
		break;
	case "eliminarCiudad":
		$id = $_POST["txtId"];
		eliminarCiudad($id);
		break;
	case "ingresarCliente":
		ingresarCliente();
		break;
	case "editarCliente":
		$id = $_POST["txtId"];
		actualizarCliente($id);
		break;
	case "eliminarCliente":
		$id = $_POST["txtId"];
		eliminarCliente($id);
		break;
}

function login(){
	if (isset($_POST['usuario']) && isset($_POST['pwd'])) 
	{
		$usuario=$_POST['usuario'];
		$contra=$_POST['pwd'];
	}
	$sql="SELECT * FROM administradores WHERE nombre_admin='".$usuario."'";
	try{
		global $conn;
		Conectar();
		$resultado = $conn->query($sql);
		foreach($resultado as $fila)
		{
			$usuarioBase = $fila["nombre_admin"];
			$contraBase = $fila["contrasena_admin"];
		}
		if ($usuario===$usuarioBase && $contra===$contraBase){
			session_start(); 
			$_SESSION["SesionAdmin"]=$usuario;
			header("location:Administracion.php");
		}
		else {
			header("location:index.php?message=Usuario o contraseña incorrecta. Vuelva a ingresar.");
		}
		$resultado = null;
		$conn = null;
	}
	catch(PDOException $e){
		echo ("Error: ".$e->getMessage()."<br/>");
	}
}

function actualizarContrasenaAdmin($id){
	$contrasena_admin=$_POST["txtContrasena"];
	global $conn;
	Conectar();
	try{
		$sql = "UPDATE administradores SET contrasena_admin='".$contrasena_admin."' WHERE id_admin=".$id;
		$cursor=$conn->exec($sql);
		header("Location:Administracion.php");
	}
	catch(PDOException $e)
	{
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$cursor = null;
	$conn = null;
}

function actualizarPedidoAtendido($id){
	$correo_cliente=$_POST["correoCliente"];
	$valor_Total=$_POST["valorTotal"];
	global $conn;
	Conectar();
	try{
		$sql = "UPDATE compras SET estado_compra='Atendido' WHERE id_compra='".$id."'";
		$cursor=$conn->exec($sql);
		enviarCorreo($id, $correo_cliente,$valor_Total);
		header("Location:VisualizarComprasPendientes.php");
	}
	catch(PDOExecption $e)
	{
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$cursor = null;
	$conn = null;
}

function enviarCorreo($id, $correo_cliente, $valor){
	$asunto    = 'Su orden #'.$id.' ha sido atendida';
	$mensaje = '
	<html>
	<body>
	<img src="https://drive.google.com/uc?export=view&id=1hZ_hJfx-k9KTIwQPXoQGLJG_KxAsRjK2" width="200px"/>
	<p>Número de Compra: ';
	$mensaje.=$id;
	$mensaje.='<p>Valor Total: $';
	$mensaje.=$valor;
	$mensaje.='</p>
	Gracias por su compra!
	</body>
	</html>
	';
	$de  = 'MIME-Version: 1.0' . "\r\n";
	$de .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	mail($correo_cliente, $asunto, $mensaje,$de);
}

function ingresarCategoria(){
	$categoria=$_POST["txtCategoria"];
	$imagen=$_FILES["fileImagen"]["name"];
	global $conn;
	Conectar();
	try{
		$sql = $conn->prepare("INSERT INTO categorias (nombre_categoria, imagen_categoria) VALUES (:categorias, :img_categ)");
		$sql->execute([':categorias' => $categoria, ':img_categ' => $imagen]);
		$sql="SELECT id_categoria FROM categorias WHERE nombre_categoria='".$categoria."'";
		$cursor = $conn->prepare($sql);
		$cursor ->execute();
		$cursor = $conn->query($sql);
		foreach ($cursor as $fila){
			$id_categoria=$fila["id_categoria"];
		}
		$path = "../images/".$id_categoria;
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		copiarImagen($id_categoria);
	}
	catch(PDOException $e){
		echo("Error: ".$e->getMessage()."<br/>");
		exit();
	}
	$conn = null;
	header("Location:VisualizarCategoria.php");
}

function copiarImagen($id){
	$target_dir = "../images/".$id."/";
	$target_file = $target_dir . basename($_FILES["fileImagen"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	move_uploaded_file($_FILES["fileImagen"]["tmp_name"], $target_file);
}

function actualizarCategoria($id){
	$categoria=$_POST["txtCategoria"];
	if (!empty($_FILES["fileImagen"]["name"]))
		$imagen=$_FILES["fileImagen"]["name"];
	else
		$imagen=$_POST["txtImagen"];
	global $conn;
	Conectar();
	try{
		$sql = "UPDATE categorias SET nombre_categoria='".$categoria."',imagen_categoria='".$imagen."' WHERE id_categoria=".$id;
		$cursor=$conn->exec($sql);
		copiarImagen($id);
		header("Location:VisualizarCategoria.php");
	}
	catch(PDOException $e)
	{
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$cursor = null;
	$conn = null;
}

function eliminarCategoria($id){
	$categoria=$_POST["txtCategoria"];
	global $conn;
	Conectar();
	try{
		$sql = "DELETE FROM categorias WHERE id_categoria=".$id;
		$cursor=$conn->exec($sql);
		if ($cursor>0)
			header("Location:VisualizarCategoria.php");
		else
			echo '<script language="javascript">alert("Error al eliminar la Categoria");window.location.href="VisualizarCategoria.php"</script>';
	}
	catch(PDOException $e)
	{
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$cursor = null;
	$conn = null;
}

function ingresarProducto(){
	$descripcionCorta_producto = $_POST["txtDescripcionC"];
	$foto_producto = $_FILES["fileImagen"]["name"];
	$descripcionLarga_producto = $_POST["txtDescripcionL"];
	$precio_producto = $_POST["txtPrecio"];
	if (isset($_POST['txtHabilitado'])){
		$habilitado_producto = 1;}
		else{
			$habilitado_producto = 0;
		}
		$categorias_id_categoria = $_POST["txtCategoria"];
		global $conn;
		Conectar();
		try{
			$sql="SELECT id_categoria FROM categorias WHERE nombre_categoria='".$categorias_id_categoria."'";
			$cursor = $conn->prepare($sql);
			$cursor ->execute();
			$cursor = $conn->query($sql);
			foreach ($cursor as $fila)
			{
				$id_categoria=$fila["id_categoria"];
			}

		}catch(PDOException $e)
		{
			echo("Error: ".$e->getMessage()."<br/>");
		}
		try{
			$sql = "INSERT INTO productos (descripcionCorta_producto,foto_producto,descripcionLarga_producto,
			precio_producto,habilitado_producto,categorias_id_categoria) VALUES ('".$descripcionCorta_producto."',
			'".$foto_producto."','".$descripcionLarga_producto."','".$precio_producto."','".$habilitado_producto."',
			'".$id_categoria."')";
			$cursor=$conn->exec($sql);
			copiarImagen($id_categoria);
		}
		catch(PDOException $e)
		{
			echo("Error: ".$e->getMessage()."<br/>");
		}
		$conn = null;
		header("Location:VisualizarProducto.php");
}

function actualizarProducto($id){
		$descripcionCorta_producto = $_POST["txtDescripcionC"];
		$descripcionLarga_producto = $_POST["txtDescripcionL"];
		$precio_producto = $_POST["txtPrecio"];
		if (!empty($_FILES["fileImagen"]["name"]))
			$foto_producto=$_FILES["fileImagen"]["name"];
		else
			$foto_producto=$_POST["txtImagen"];
		if (isset($_POST['txtHabilitado'])){
			$habilitado_producto = 1;}
			else{
				$habilitado_producto = 0;
			}
			$categorias_id_categoria = $_POST["txtCategoria"];
			global $conn;
			Conectar();
			$sql="SELECT id_categoria FROM categorias WHERE nombre_categoria='".$categorias_id_categoria."'";
			$cursor = $conn->prepare($sql);
			$cursor ->execute();
			$cursor = $conn->query($sql);
			foreach ($cursor as $fila)
			{
				$id_categoria=$fila["id_categoria"];
			}
			
			try{
				$sql = "UPDATE productos SET descripcionCorta_producto='".$descripcionCorta_producto."', foto_producto='".$foto_producto."',
				descripcionLarga_producto='".$descripcionLarga_producto."',	precio_producto='".$precio_producto."', 
				habilitado_producto='".$habilitado_producto."',categorias_id_categoria='".$id_categoria."' WHERE id_producto=".$id;
				$cursor=$conn->exec($sql);	
				copiarImagen($id_categoria);
				header("Location:VisualizarProducto.php");		
			}
			catch(PDOException $e)
			{
				echo("Error: ".$e->getMessage()."<br/>");
			}
			$cursor = null;
			$conn = null;
}

function eliminarProducto($id){
	global $conn;
	Conectar();
	try{
		$sql = "DELETE FROM productos WHERE id_producto=".$id;
		$cursor=$conn->exec($sql);
		if ($cursor>0)
			header("Location:VisualizarProducto.php");
		else
			echo '<script language="javascript">alert("Error al eliminar el producto");window.location.href="VisualizarProducto.php"</script>';
	}catch(PDOException $e){
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$cursor = null;
	$conn = null;
}

function ingresarCiudad(){
	$ciudad=$_POST["txtCiudad"];
	global $conn;
	Conectar();
	try{
		$sql = $conn->prepare("INSERT INTO ciudades (nombre_ciudad) VALUES (:ciudades)");
		$sql->execute([':ciudades' => $ciudad]);
	}catch(PDOException $e){
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$conn = null;
	header("Location:VisualizarCiudad.php");
}

function actualizarCiudad($id){
			$ciudad=$_POST["txtCiudad"];
			global $conn;
			Conectar();
			try{
				$sql = "UPDATE ciudades SET nombre_ciudad='".$ciudad."' WHERE id_ciudad=".$id;
				$cursor=$conn->exec($sql);
				header("Location:VisualizarCiudad.php");
			}
			catch(PDOException $e)
			{
				echo("Error: ".$e->getMessage()."<br/>");
			}
			$cursor = null;
			$conn = null;
}

function eliminarCiudad($id){
	global $conn;
	Conectar();
	try{
		$sql = "DELETE FROM ciudades WHERE id_ciudad=".$id;
		$cursor=$conn->exec($sql);
		if ($cursor>0)
			header("Location:VisualizarCiudad.php");
		else
			echo '<script language="javascript">alert("Error al eliminar la Ciudad");window.location.href="VisualizarCiudad.php"</script>';
	}catch(PDOException $e){
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$cursor = null;
	$conn = null;
}

function ingresarCliente(){
			$ciudades_id_ciudad = $_POST["txtCiudad"];
			$nombres_cliente = $_POST["txtNombres"];
			$apellidos_cliente = $_POST["txtApellidos"];
			$cod_cliente = $_POST["txtCodigo"];
			$celular_cliente = $_POST["txtCelular"];
			$direccion_cliente = $_POST["txtDireccion"];
			$correo_cliente = $_POST["txtCorreo"];
			$contraseña_cliente = password_hash($_POST["txtContraseña"], PASSWORD_BCRYPT);
			global $conn;
			Conectar();
			$sql="SELECT id_ciudad FROM ciudades WHERE nombre_ciudad='".$ciudades_id_ciudad."'";
			$cursor = $conn->prepare($sql);
			$cursor ->execute();
			$cursor = $conn->query($sql);
			foreach ($cursor as $fila)
			{
				$id_ciudad=$fila["id_ciudad"];
			}
			
			try{
				$sql = "INSERT INTO clientes (ciudades_id_ciudad,nombres_cliente,apellidos_cliente,
				cod_cliente,celular_cliente,direccion_cliente,correo_cliente,contraseña_cliente) VALUES ('".$id_ciudad."',
				'".$nombres_cliente."','".$apellidos_cliente."','".$cod_cliente."','".$celular_cliente."',
				'".$direccion_cliente."','".$correo_cliente."','".$contraseña_cliente."')";
				$cursor=$conn->exec($sql);
			}
			catch(PDOException $e)
			{
				echo("Error: ".$e->getMessage()."<br/>");
			}
			$conn = null;
			header("Location:VisualizarCliente.php");
}

function actualizarCliente($id){
			$ciudades_id_ciudad = $_POST["txtCiudad"];
			$nombres_cliente = $_POST["txtNombres"];
			$apellidos_cliente = $_POST["txtApellidos"];
			$cod_cliente = $_POST["txtCodigo"];
			$celular_cliente = $_POST["txtCelular"];
			$direccion_cliente = $_POST["txtDireccion"];
			$correo_cliente = $_POST["txtCorreo"];
			$contraseña_cliente = password_hash($_POST["txtContraseña"], PASSWORD_BCRYPT);
			global $conn;
			Conectar();
			$sql="SELECT id_ciudad FROM ciudades WHERE nombre_ciudad='".$ciudades_id_ciudad."'";
			$cursor = $conn->prepare($sql);
			$cursor ->execute();
			$cursor = $conn->query($sql);
			foreach ($cursor as $fila)
			{
				$id_ciudad=$fila["id_ciudad"];
			}
			
			try{
				$sql = "UPDATE clientes SET ciudades_id_ciudad='".$id_ciudad."', nombres_cliente='".$nombres_cliente."',
				apellidos_cliente='".$apellidos_cliente."',	cod_cliente='".$cod_cliente."',	celular_cliente='".$celular_cliente."',
				direccion_cliente='".$direccion_cliente."', correo_cliente='".$correo_cliente."', contraseña_cliente='".$contraseña_cliente."'
				WHERE id_cliente=".$id;
				$cursor=$conn->exec($sql);
				header("Location:VisualizarCliente.php");
			}
			catch(PDOException $e)
			{
				echo("Error: ".$e->getMessage()."<br/>");
			}
			$cursor = null;
			$conn = null;
}

function eliminarCliente($id){
	global $conn;
	Conectar();
	try{
		$sql = "DELETE FROM clientes WHERE id_cliente=".$id;
		$cursor=$conn->exec($sql);
		if ($cursor>0)
			header("Location:VisualizarCliente.php");
		else
			echo '<script language="javascript">alert("Error al Eliminar el Cliente");window.location.href="VisualizarCliente.php"</script>';
	}catch(PDOException $e){
		echo("Error: ".$e->getMessage()."<br/>");
	}
	$cursor = null;
	$conn = null;
}

?>