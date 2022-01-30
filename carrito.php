<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_REQUEST["eliminar"])){
        $id=$_REQUEST["eliminar"];
        unset($_SESSION['cart'][$id]);
        header("Location:index.php");
    }

    if(isset($_REQUEST["crear"])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $cantidad=$_POST['cantidad'];        
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['cantidad']+=1;
        }else{
            $_SESSION['cart'][$id]['nombre']=$nombre;
            $_SESSION['cart'][$id]['cantidad']=$cantidad;
            $_SESSION['cart'][$id]['precio']=$precio;
        }
        header("Location:index.php");
    }

    if(isset($_REQUEST["actualizar"])){
        $id=$_POST['id'];
        $cantidad=$_POST['cantidad'];
        $_SESSION['cart'][$id]['cantidad']=$cantidad;
        header("Location:index.php");
    }

    if(isset($_REQUEST['usuario'])){
        if($_REQUEST['usuario'] == "true"){
            if(isset($_SESSION["usuario"])){
                header("Location:checkout.php");
            }
            else{
                header("Location:login.php");
            }
        }
    }
?>