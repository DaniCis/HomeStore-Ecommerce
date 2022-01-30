<?php
    ob_start();
    require_once('includes/fpdf.php');
    require_once('includes/header.php');
    $id= $_GET["id"];
    $today = date("Y-m-d H:i:s");

    Conectar();
    $sql = "SELECT id_detalleCompra, cantidad_detalleCompra, descripcionCorta_producto, precio_producto 
    FROM detallecompras INNER JOIN productos ON detallecompras.productos_id_producto = productos.id_producto WHERE compras_id_compra = '".$id."'";

    //Generar PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image('images/logo.png',10,6,45);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Recibo de compra #'.$id, 0, 1,'C'); 
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7, utf8_decode('Nombre: '. $_SESSION['usuario']['nombres_cliente'] ." ". $_SESSION['usuario']['apellidos_cliente']), 0, 1);
    $pdf->Cell(0, 7, utf8_decode('Identificación: '. $_SESSION['usuario']['cod_cliente']) , 0, 1);
    $pdf->Cell(0, 7, utf8_decode('Dirección de entrega: '. $_SESSION['usuario']['direccion_cliente'] ), 0, 1);
    $pdf->Cell(0, 7, utf8_decode('Teléfono: '. $_SESSION['usuario']['celular_cliente'] ), 0, 1);
    $pdf->Cell(0, 7, utf8_decode('Fecha: '. $today), 0, 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10, 7, utf8_decode('#'), 1, 0,'C');
    $pdf->Cell(120, 7, utf8_decode( 'Producto'), 1, 0,'C');
    $pdf->Cell(20, 7, utf8_decode( 'Cantidad'), 1, 0,'C');
    $pdf->Cell(25, 7, utf8_decode( 'Precio'), 1, 1,'C');

    $pdf->SetFont('Arial', '', 12);
    try{
        $cont=0;
        $cursor = $conn->query($sql);
        foreach($cursor as $fila){
            $cont+=1;
            $pdf->Cell(10, 7, utf8_decode( $fila["id_detalleCompra"]), 1, 0,'C');
            $pdf->Cell(120, 7, utf8_decode( $fila["descripcionCorta_producto"]), 1, 0,'C');
            $pdf->Cell(20, 7, utf8_decode( $fila["cantidad_detalleCompra"]), 1, 0,'C');
            $pdf->Cell(25, 7, utf8_decode( '$'.$fila["precio_producto"]), 1, 1,'C');
            
        }
    }catch(PDOException $e){
        echo("Error!, ".$e->getMessage()."<br/>");
    }
    $cursor = null;
    $conn = null;

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(150, 7, utf8_decode('TOTAL'), 1, 0,'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(25, 7, utf8_decode('$'.$_SESSION['precioTotal']), 1, 0,'C');

    $pdf->Output('', 'reciboDeCompra.pdf');
    ob_end_flush();

?>