<?php
    require_once('includes/header.php'); 
    $id= $_GET["id"];
    Conectar();
    $sql = "SELECT * FROM productos INNER JOIN categorias on productos.categorias_id_categoria = categorias.id_categoria WHERE id_producto=". $id. " AND habilitado_producto = '1'";
?>
<section>
    <br/>
    <div class="container">
		<?php
			try{
				$cursor = $conn->query($sql);
				foreach($cursor as $fila)
				{
		?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="categoria.php?id=<?= $fila["id_categoria"]?>"><?= $fila["nombre_categoria"]?></a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
                
            </ol>
        </nav>
        <div class="row justify-content-evenly">
            <div class="col-5">
                <figure class="figure">
                    <img src="images/<?= $fila["categorias_id_categoria"]?>/<?= $fila["foto_producto"]?>" class="img-thumbnail" style="width: 400px; height:400px">
                </figure>
            </div>
            <div class="col-5">
                <br/>
                <form action="carrito.php?crear=true" method="post" >
                    <h4 style='text-align:left'><?= $fila["descripcionCorta_producto"] ?></h4><br/>
                    <p style='text-align: justify; text-justify: inter-word'><?= $fila["descripcionLarga_producto"]?></p>
                    <p style='font-weight:bold'>Precio: $<?= $fila["precio_producto"] ?></p>
                    <p style='font-weight:bold'>Cantidad:</p><input type='number' min='1' value='1' name="cantidad" style='width:60px'>
                    <div class='row'>
                        <div class="col-7"></div>
                        <input type="hidden" name="id" value="<?=$fila['id_producto']?>">
                        <input type="hidden" name="nombre" value="<?=$fila['descripcionCorta_producto']?>">
                        <input type="hidden" name="precio" value="<?=$fila['precio_producto']?>">
                        <div  style='text-align:right' >
                            <button type="submit" class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5' class="col-5">Añadir al carrito</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
				}
			}
			catch(PDOException $e){
				echo("Error!, ".$e->getMessage()."<br/>");
			}
		$cursor = null;
		$conn = null;
		?>	
    </div>
</section>

<?php require_once('includes/footer.php'); ?>