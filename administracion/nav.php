<nav class="sb-topnav navbar navbar-expand" style="background-color:#eaeaea">
	<div class='col-5'>
		<button class="btn btn-link btn-sm order-1 order-lg-0" style="color:#12bfb5" id="sidebarToggle" href="#">
			<i style='font-size:1.5rem' class="fas fa-bars"></i>
		</button>
	</div>
	<div class='col-5'>
		<a class="navbar-brand" href="Administracion.php">
			<img src="../images/logo.png" alt="logo" width='90%'>
		</a>
	</div>
	<div class='col-1'>
		<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" style="color:#12bfb5" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i style='font-size:1.2rem' class="fas fa-user fa-fw" ></i>
					<font size=3><strong>Administrador</strong>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<font size=2><a class="dropdown-item" href="ModificarClaveAdmin.php">Cambiar Contraseña</a>
					<div class="dropdown-divider"></div>
					<font size=2><a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<div id="layoutSidenav" >
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<br/>
					<font size=4><a style='padding-left:35px;' class="nav-link" href="VisualizarCategoria.php">Categorías</a>
					<font size=4><a style='padding-left:35px;' class="nav-link" href="VisualizarProducto.php">Productos</a>
					<font size=4><a style='padding-left:35px;' class="nav-link" href="VisualizarCiudad.php">Ciudades</a>
					<font size=4><a style='padding-left:35px;' class="nav-link" href="VisualizarCliente.php">Clientes</a>
					<font size=4><a style='padding-left:35px;' class="nav-link" href="Administracion.php">Compras</a>
				</div>
			</nav>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>