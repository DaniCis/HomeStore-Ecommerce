<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['usuario'])){
        header("Location:login.php");
    }

    $_SESSION['habilitarCar']=true;
    require_once('includes/header.php');

    $today = date("Y-m-d H:i:s");
    $estado = "Pendiente";
    $nombre = $_SESSION['usuario']['nombres_cliente'];
    $precioFinal = $_SESSION['precioTotal'];
    $id_cliente = $_SESSION['usuario']['id_cliente'];
    $id_compra = date("dHis").substr($nombre,0,2).$id_cliente;

    Conectar();
	$sqlCompleto = "INSERT INTO compras(id_compra, fecha_compra, estado_compra, precioFinal_compra, clientes_id_cliente) VALUES ('$id_compra','$today', '$estado', '$precioFinal', '$id_cliente') ";
	$cursor = $conn->prepare($sqlCompleto);
	$cursor ->execute();

    $cont=0;
    foreach($_SESSION['cart'] as $id => $arr){
        $cont+=1; 					
        $cantidad = $_SESSION['cart'][$id]['cantidad'];
        $sqlCompleto = "INSERT INTO detalleCompras(id_detalleCompra, compras_id_compra, cantidad_detalleCompra, productos_id_producto) VALUES ('$cont','$id_compra', '$cantidad', '$id')";
        $cursor = $conn->prepare($sqlCompleto);
        $cursor ->execute();
    }
?>

<section><br/>
    <div class="container">
        <div class="card text-center" style="width: 110vh; margin-left: 130px;">
            <div class="card-header d-flex">
                <div class='col-5'></div>
                <div class='col-2'>
                    <a class="navbar-brand" href="index.php">HomeStore</a>
                </div>
                <div class='col-4'></div>
                <div class='col-1'>
                    <a href='reciboPDF.php?id=<?= $id_compra?>' target='_blank'>
                        <i style='font-size:1.4rem' class="bi bi-printer"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Recibo de Compra #<?=$id_compra?></h5>
                <p class="card-text">
                    <div class="row align-items-center">
                        <div class="col">
                           <strong>Nombre: </strong><?=$nombre?> <?=$_SESSION['usuario']['apellidos_cliente']?>
                        </div>
                        <div class="col">
                            <strong># de identificación: </strong><?=$_SESSION['usuario']['cod_cliente']?>                            
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col">
                            <strong>Dirección: </strong><?=$_SESSION['usuario']['direccion_cliente']?>
                        </div>
                        <div class="col">
                            <strong>Fecha: </strong><?=$today?>
                        </div>
                    </div>
                    <br/>
                    <table class="table table-hover">			
                        <?php
                            if(isset($_SESSION['cart'])){
                        ?>
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cont=0;
                            $precioTotal=0;
                            foreach($_SESSION['cart'] as $id => $arr){
                                $cont+=1; 
                                ?>	
                                <tr>
                                <th scope="row"><?=$cont?></th>
                                <?php						
                                foreach($arr as $key => $value){										
                                    if($key == "cantidad"){
                                        $cantidad = $value
                                        ?>
                                        <td>
                                            <?=$value?>
                                        </td>
                                        <?php
                                    }
                                    else{
                                        if($key=="precio"){
                                            $value = $cantidad * $value;
                                            $precioTotal = $precioTotal + $value;
                                        }
                                        ?>											
                                        <td><?=$value?></td>
                                    <?php
                                    }					
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Precio Total:</strong></td>
                                    <td>$<?=$precioTotal?></td>
                                </tr>
                            </tfoot>
                            <?php							
                        }
                        else{?>
                            <div>
									<img src="images/empty-cart.svg" style='display:block;margin:auto; width:25%' ><br/>
									<p style='text-align:center'>Carrito vacío</p>
						    </div>
                        <?php } 
                    ?>
                    </table>
                </p>
				<a href="index.php"> <button type="button" style='background-color:#12bfb5; border-color:#12bfb5' class="btn btn-primary">Regresar al inicio</button></a>
            </div>
            <div class="card-footer text-muted">
                <br/>
            </div>
        </div>
    </div><br/>
</section>
<?php require_once('includes/footer.php');
    unset($_SESSION['cart']);
    unset($_SESSION['habilitarCar']);
?>