<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['usuario'])){
        header("Location:login.php");
    }
    require_once('includes/header.php');
?>
<section>
    <div class="container"><br/>
        <div class="card text-center" style="width: 100vh; margin-left: 160px;">
            <div class="card-header">
                <a class="navbar-brand" href="index.php">HomeStore</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Confirmación de compra</h5>
                <p class="card-text">
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
                                            <form action="carrito.php?actualizar=true" method="post">
                                                <input type="hidden" name="id" value="<?=$id?>">
                                                <input type="number" style="width:45px" name="cantidad" value="<?=$value?>">
                                                <button class="btn" type="submit" style="width:25px">
                                                    <i class="bi bi-arrow-repeat"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <?php
                                    }
                                    else{
                                        if($key=="precio"){
                                            $value = $cantidad * $value;
                                            $precioTotal = $precioTotal + $value;
                                            $_SESSION['precioTotal'] = $precioTotal;
                                        }
                                        ?>											
                                        <td><?=$value?></td>
                                    <?php
                                    }					
                                }
                                ?>
                                <td>
                                    <a class="btn" href="carrito.php?eliminar=<?=$id?>">
                                    <i style="font-size: 1.3rem;color:red" class="bi bi-trash"></a></i>
                                </td>
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
                            <?php  }
                    ?>
                    </table>
                </p>
                <a href="index.php" type="button" class="btn btn-secondary">
                    Agregar más productos
                </a>
                <a href="recibo.php"> 
                    <button type="button" class="btn btn-primary" style='background-color:#12bfb5; border-color:#12bfb5'>Realizar compra</button>
                </a>
            </div>
            <div class="card-footer text-muted">
                <br/>
            </div>
        </div>
    </div><br/>
</section>
<?php require_once('includes/footer.php'); ?>