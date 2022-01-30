<?php
	require_once('includes/funciones.php');
    if(!isset($_SESSION)){
        session_start();
    }
	$accion = $_POST["txtAccion"];
    switch($accion){
        case "registro":
            registroCliente();
            break;
        case "login":
            inicioSesion();
            break;
        case "actualizar":
            actualizarCliente();
            break;
        case "cambiarPass":
            cambiarPassword();
            break;
    }
    
    function actualizarCliente(){
        global $conn;
		Conectar();
		try {
			$sql = "UPDATE clientes SET ciudades_id_ciudad=:ciudad, cod_cliente=:codigo, ";
			$sql .= "direccion_cliente=:direccion, celular_cliente=:celular, correo_cliente=:correo WHERE id_cliente=:id";
			$cursor = $conn->Prepare($sql);
			$cursor->bindParam(':ciudad',$_POST["txtCiudad"]);
			$cursor->bindParam(':codigo',$_POST["txtCedula"]);
            $cursor->bindParam(':direccion',$_POST["txtDireccion"]);
            $cursor->bindParam(':celular',$_POST["txtCelular"]);
            $cursor->bindParam(':correo',$_POST["txtEmail"]);
			$cursor->bindParam(':id',$_SESSION['usuario']['id_cliente']);
            if ($cursor->execute()) {
                $records = $conn->prepare('SELECT * FROM clientes WHERE correo_cliente = :email');
                $records->bindParam(':email', $_POST['txtEmail']);
                $records->execute();
                $results = $records->fetch(PDO::FETCH_ASSOC);
                $_SESSION['usuario'] = $results;
                header('Location:datosCliente.php');
            }
            else
                header("Location:datosCliente.php?message=Ocurrió un error al actualizar. Intente de nuevo.");
		}
		catch(PDOException $e){
			echo("Error: ".$e->getMessage()."<br/>");
		}
		$cursor = null;
    }

    function registroCliente(){
        global $conn;
        Conectar();
        if(!empty($_POST)){
            $sql = "INSERT INTO clientes (ciudades_id_ciudad, nombres_cliente, apellidos_cliente, cod_cliente, celular_cliente, direccion_cliente, correo_cliente, contraseña_cliente) ";
            $sql .= "VALUES (:ciudad,:nombres,:apellidos,:codigo,:celular,:direccion,:correo,:password)";
            try{
                $cursor = $conn->Prepare($sql);
                $cursor->bindParam(':ciudad',$_POST["txtCiudad"]);
                $cursor->bindParam(':nombres',$_POST["txtNombres"]);
                $cursor->bindParam(':apellidos',$_POST["txtApellidos"]);
                $cursor->bindParam(':codigo',$_POST["txtCedula"]);
                $cursor->bindParam(':celular',$_POST["txtCelular"]);
                $cursor->bindParam(':direccion',$_POST["txtDireccion"]);
                $cursor->bindParam(':correo',$_POST["txtEmail"]);
                $pass = password_hash($_POST["txtPassword"], PASSWORD_BCRYPT);
                $cursor->bindParam(':password', $pass);
                if ($cursor->execute()) {
                    header('Location:login.php');
                }
                else
                    header("Location:registro.php?message=Ocurrió un error al registrarse. Intente de nuevo.");
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage()."<br/>");
            }
            $cursor = null;
            $conn = null;
        }
    }

    function inicioSesion(){
        global $conn;
        Conectar();
        if (!empty($_POST['txtEmail']) && !empty($_POST['txtPassword'])) {
            try{
                $records = $conn->prepare('SELECT * FROM clientes WHERE correo_cliente = :email');
                $records->bindParam(':email', $_POST['txtEmail']);
                $records->execute();
                $results = $records->fetch(PDO::FETCH_ASSOC);
                if($results!=FALSE){
                    if (count($results) > 0 && password_verify($_POST['txtPassword'], $results['contraseña_cliente'])){
                        $_SESSION['usuario'] = $results;
                        header("Location:index.php");
                    } else{			
                        header("Location:login.php?message=Las credenciales no coinciden. Vuelva a ingresar.");
                    }
                }
                else
                    header("Location:login.php?message=Las credenciales no coinciden. Vuelva a ingresar.");
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage()."<br/>");
            }
            $cursor = null;
            $conn = null;
        }
    }

    function cambiarPassword(){
        global $conn;
        Conectar();
        if(!empty($_POST['txtPasswordAnt']) && !empty($_POST['txtPasswordNew'])){
            if(password_verify($_POST['txtPasswordAnt'], $_SESSION["usuario"]["contraseña_cliente"])){
                try{
                    $sql= "UPDATE clientes SET contraseña_cliente=:pass WHERE correo_cliente = :email";
                    $cursor = $conn->Prepare($sql);
                    $pass = password_hash($_POST["txtPasswordNew"], PASSWORD_BCRYPT);
                    $cursor->bindParam(':pass',$pass);
                    $cursor->bindParam(':email',$_SESSION["usuario"]["correo_cliente"]);
                    if ($cursor->execute()) {
                        $records = $conn->prepare('SELECT * FROM clientes WHERE correo_cliente = :email');
                        $records->bindParam(':email',$_SESSION["usuario"]["correo_cliente"]);
                        $records->execute();
                        $results = $records->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['usuario'] = $results;
                        header('Location:cambioPass.php?message=Contraseña actualizada.');
                    }else{
                        header('Location:cambioPass.php?message=Ocurrió un error al actualizar. Intente de nuevo.');
                    }
                }catch(PDOException $e){
                    echo("Error: ".$e->getMessage()."<br/>");
                }
                $cursor = null;
                $conn = null;
            }else{
                header('Location:cambioPass.php?message=Contraseña incorrecta. Intente de nuevo.');
            }
        }
    }
?>
