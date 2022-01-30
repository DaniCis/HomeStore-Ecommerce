<?php
    require_once('includes/header.php');
    $id= $_GET["id"];
    Conectar();
    try{
        $records = $conn->prepare('SELECT * FROM compras WHERE id_compra = :id');
        $records->bindParam(':id', $id);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        $ciudad = null;
        if (count($results) > 0) 
            $compras = $results;
    }catch(PDOException $e){
        echo("Error!, ".$e->getMessage()."<br/>");
    }


    $sql = "SELECT id_detalleCompra, cantidad_detalleCompra, descripcionCorta_producto, precio_producto 
    FROM detallecompras INNER JOIN productos ON detallecompras.productos_id_producto = productos.id_producto WHERE compras_id_compra = '".$id."'";
?>
<section>
    <div class='container ' ><br/>
        <div class="card text-center" style="width: 150vh;">
            <div class="card-header">
                <a class="navbar-brand" href="index.php">HomeStore</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Detalles de la compra # <?= $id?></h5>
                <p class="card-text">
                    <table class="table table-hover">			
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                try{
                                    $cont=0;
                                    $cursor = $conn->query($sql);
                                    foreach($cursor as $fila){
                                        $cont+=1;
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $fila["id_detalleCompra"]?></th>
                                        <td><?= $fila["descripcionCorta_producto"]?></td>
                                        <td><?= $fila["cantidad_detalleCompra"]?></td>
                                        <td>$<?= $fila["precio_producto"]?></td>
                                    </tr>
                                <?php 
                                    }
                                }catch(PDOException $e){
                                    echo("Error!, ".$e->getMessage()."<br/>");
                                }
                                $cursor = null;
                                $conn = null;
                            ?>    
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Precio Total:</td>
                                <td>$<?=$compras["precioFinal_compra"]?></td>
                            </tr>
                        </tfoot>
                    </table>
                </p>
            </div>
            <div class="card-footer text-muted">
                <a href='comprasCliente.php'>Regresar</a>
            </div>
        </div>
    </div><br/><br/>
</section>
<?php require_once('includes/footer.php'); ?>