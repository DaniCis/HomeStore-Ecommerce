<?php
	error_reporting(E_ALL);
	if (isset($_COOKIE["VCookie"]))
		$MaxReg=$_COOKIE["VCookie"];
	else
		$MaxReg=20;
	$conn; 

	if(!isset($_SESSION)){
        session_start();
    }

	function Conectar(){
		global $conn; 
		$usuario ="root";
		$clave="";
		$conn = new PDO('mysql:host=localhost;dbname=basefinal',$usuario,$clave);
	}

	function Desconectar(){
		mysqli_close();
	}

	function Paginamiento($pagActual, $pagTotal, $MaxReg, $path){
		if ($pagActual+1==1){
		?>
		<li class="page-item active">
            <a class="page-link" style='background-color: #807e7e; border-color: #807e7e' href="#">1</a>
        </li>
		<?php if ($pagTotal+1>1){ ?>
			<li class="page-item">
                <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=1">2</a>
            </li>
		<?php }if ($pagTotal+1>2){ ?>
			<li class="page-item">
                <a class="page-link"  style='color: #807e7e' href="<?php echo($path); ?>pagina=2">3</a>
            </li>
		<?php }if ($pagTotal+1>1){ ?>
			<li class="page-item">
                <a class="page-link"   style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual+1); ?>">
					<i class="bi bi-chevron-double-right"></i>
                </a>
            </li>
		<?php }if ($pagTotal+1>1){ ?>
			<li class="page-item">
                <a class="page-link"  style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagTotal); ?>">
					<i class="bi bi-chevron-bar-right"></i>
                </a>
            </li>
		<?php
			}
		}
		else if($pagActual+1==2){
			?>
			<li class="page-item">
                <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=0">
					<i class="bi bi-chevron-bar-left"></i>
                </a>
            </li>
			<li class="page-item">
                <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>">
					<i class="bi bi-chevron-double-left"></i>
                </a>
            </li>
			<li class="page-item">
                <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>">1</a>
            </li>
			<li class="page-item active">
            	<a class="page-link" style='background-color: #807e7e; border-color: #807e7e' href="#">2</a>
        	</li>
			<?php if ($pagTotal+1>2){ ?>
			<li class="page-item">
                <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=2">3</a>
            </li>
			<?php }if ($pagTotal+1>2){ ?>
			<li class="page-item">
                <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual+1); ?>">
					<i class="bi bi-chevron-double-right"></i>
                </a>
            </li>
			<?php }if ($pagTotal+1>2){ ?>
			<li class="page-item">
                <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagTotal); ?>">
					<i class="bi bi-chevron-bar-right"></i>
        	    </a>
            </li>
			<?php
			}
		}
		else if($pagActual+1>=3 && $pagActual==$pagTotal){
		?>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=0">
				<i class="bi bi-chevron-bar-left"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>">
				<i class="bi bi-chevron-double-left"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-2); ?>"><?php echo($pagActual-1);?></a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>"><?php echo($pagActual);?></a>
        </li>
		<li class="page-item active">
            	<a class="page-link" style='background-color: #807e7e; border-color: #807e7e' href="#"><?php echo($pagActual+1);?></a>
        </li>
		<?php
		}
		else if($pagActual+1>=3 && $pagActual+1==$pagTotal){
		?>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=0">
				<i class="bi bi-chevron-bar-left"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>">
				<i class="bi bi-chevron-double-left"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>"><?php echo($pagActual);?></a>
        </li>
		<li class="page-item active">
            	<a class="page-link" style='background-color: #807e7e; border-color: #807e7e' href="#"><?php echo($pagActual+1);?></a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual+1); ?>"><?php echo($pagActual+2);?></a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual+1); ?>">
				<i class="bi bi-chevron-double-right"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagTotal); ?>">
				<i class="bi bi-chevron-bar-right"></i>
    	    </a>
        </li>
		<?php
		}
		else if($pagActual+1>=3){
		?>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=0">
				<i class="bi bi-chevron-bar-left"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>">
				<i class="bi bi-chevron-double-left"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual-1); ?>"><?php echo($pagActual);?></a>
        </li>
		<li class="page-item active">
            	<a class="page-link" style='background-color: #807e7e; border-color: #807e7e' href="#"><?php echo($pagActual+1);?></a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual+1); ?>"><?php echo($pagActual+2);?></a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagActual+1); ?>">
				<i class="bi bi-chevron-double-right"></i>
            </a>
        </li>
		<li class="page-item">
            <a class="page-link" style='color: #807e7e' href="<?php echo($path); ?>pagina=<?php echo($pagTotal); ?>">
				<i class="bi bi-chevron-bar-right"></i>
    	    </a>
        </li>
		<?php
		}
	}
?>
