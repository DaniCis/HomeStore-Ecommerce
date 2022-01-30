<?php
    require_once('includes/header.php');
    $pagina=0;
	if (isset($_GET['pagina']))
		if ($_GET['pagina']>0)
			$pagina=$_GET['pagina'];

	if(isset($_POST["txtNumreg"]))
        $MaxReg = $_POST["txtNumreg"];
    
    Conectar();
    if(!empty($_POST)){
        $longitud = $_POST["longitudcheck"];
        $sql = "SELECT * FROM PRODUCTOS WHERE habilitado_producto='1' "; 
        $busqueda='';
        $cont2=0;
        for($i=1;$i<=$longitud;$i++){
            $cad="checkbox" .$i;
            if(isset($_POST[$cad])){
                if($cont2==0){
                    $cont2++;
                    $sql.= "AND (categorias_id_categoria = ". $i;
                } else{
                    $sql.=" OR categorias_id_categoria = ". $i;
                    $cont2++;
                }
                $sqlCategoria = "SELECT nombre_categoria FROM categorias WHERE id_categoria=".$i;
                $cursor = $conn->Prepare($sqlCategoria);
                $cursor->execute();
                $results = $cursor->fetch(PDO::FETCH_ASSOC);
                $categoria=$results;
                $busqueda .= $categoria["nombre_categoria"]."  ";
            }
            if($i==$longitud && $cont2!=0)
                $sql.= ")";          
        }
        
        if(!empty($_POST["precio"])){
            $cad = $_POST["precio"];
            if($cad ==='rango1'){
                $sql .= " AND precio_producto < 100";
                $busqueda .= ' precios menor a $100 ';
            }else if($cad ==='rango2'){
                $sql .= " AND precio_producto BETWEEN 100 AND 400";
                $busqueda .='  precios entre $100 y $400 ';
            }else if($cad ==='rango3'){
                $sql .= " AND precio_producto BETWEEN 400 AND 700";
                $busqueda .='  precios entre $400 y $700 ';
            }else{
                $sql .= " AND precio_producto > 700";
                $busqueda .='  precios mayores a $700 ';
            }   
        }

        if(isset($_POST["orden"])){
            $cad = $_POST["orden"];
            if($cad =='precioASC'){
                $sql .= " ORDER BY precio_producto ASC";
                $busqueda .=' precios más bajos ';
            }elseif($cad =='precioDESC'){
                $sql .= " ORDER BY precio_producto DESC";
                $busqueda .=' precios más altos ';
            }elseif($cad =='ordenASC'){
                $sql .= " ORDER BY descripcionCorta_producto ASC";
                $busqueda .=' descripción ASC';
            }else{
                $sql .= " ORDER BY descripcionCorta_producto DESC";
                $busqueda .= ' descripción DESC';
            }
        }       
        $cursor = $conn->prepare($sql);
        $cursor ->execute();	
        $resultado =$cursor->fetchAll();
        $totalRegistros=count($resultado); 
        $cursor = null;
        $pagTotal = ceil($totalRegistros/$MaxReg)-1;
        $sql .= " LIMIT ".$MaxReg;
    }
?>
<section>
    <br/>
	<h5 style='text-align:center'>Resultados encontrados para '<?=$busqueda?>' </h5><br/>
    <div class="container">
        <?php
            if($totalRegistros != 0){
        ?>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                try{
                    $cursor = $conn->query($sql);
                    foreach($cursor as $fila)
                    {
            ?>
                <div class="col">
                    <div class="card" style="width:36vh; height: 56vh" >
                        <img src="images/<?= $fila["categorias_id_categoria"];?>/<?= $fila["foto_producto"];?>" class="card-img-top" onclick="location.href='producto.php?id=<?= $fila['id_producto'] ?>'">
                        <div class="card-body">
                            <div style='height:11vh'>
                                <h5 style='font-size: 15px' class="card-title"><?= $fila["descripcionCorta_producto"] ?></h5>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-5">
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
                <?php Paginamiento($pagina, $pagTotal, $MaxReg, 'busquedaAvanzada.php?')?>
            </ul>
        </nav><?php
        }else{
            ?>
            <div><br/>
                <img src="images/empty.png" style='display:block;margin:auto; width:12%' ><br/>
                <p style='text-align:center'>Resultados no encontrados </p>
                <br/>
            </div>
        <?php
        }
        ?> 
    </div>
</section>

<?php require_once('includes/footer.php'); ?>