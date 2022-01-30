<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['usuario'])){
        header("Location:login.php");
    }
    require_once('includes/header.php');
    Conectar();
    $sql= "SELECT * FROM compras WHERE clientes_id_cliente =" . $_SESSION['usuario']['id_cliente'];
    try{
        $cursor = $conn->prepare($sql);
        $cursor ->execute();	
        $resultado =$cursor->fetchAll();
        $totalRegistros=count($resultado);
        $conn = null;
    }
    catch(PDOException $e){
        echo("Error!, ".$e->getMessage()."<br/>");
    }
?>
<section>
    <div class='container'>
        <br/><h5 style='text-align:center'>Compras realizadas</h5>
        <?php
        if($totalRegistros != 0){
            ?>
            <table class="table table-hover">   
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Precio total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        try{
                            $cont=0;
                                                 
                            foreach($resultado as $fila){
                                $cont+=1;
                            ?>
                            <tr>
                                <th scope="row"><?= $cont;?></th>
                                <td><?= $fila["id_compra"]?></td>
                                <td><?= $fila["fecha_compra"]?></td>
                                <td>$<?= $fila["precioFinal_compra"]?></td>
                                <td><a href='detallesCompra.php?id=<?=$fila["id_compra"]?>'><i class="bi bi-search"></i></a></td>
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
            </table>                                
            <?php
        }else{
            ?>
            <div><br/>
                <img src="images/empty.png" style='display:block;margin:auto; width:12%' ><br/>
                <p style='text-align:center'>No existen compras realizadas.</p>
            </div>
        <?php
        }
        ?>        
        <br/>
    </div><br/> 
</section>
<?php require_once('includes/footer.php'); ?>