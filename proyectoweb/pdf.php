<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['correo'])
{

    $user = $_SESSION['username'];
    $email = $_SESSION['correo'];

    require('fpdf/fpdf.php');
    $x = 10;
    $y = 10;
    $pdf = new FPDF('P', 'mm', 'A4');

    $pdf->AddPage();
    $pdf->SetXY($x, $y);
    $pdf->Image('./img/logo.png',150,20,33,0,'PNG','#');
    $pdf->SetFont('Helvetica','B',20);
    $pdf->SetFillColor(255,196,102);
    $pdf->SetDrawColor(255,255,255);
    $pdf->SetTextColor(0,0,0);

    
    $pdf->SetXY(25,$y+5);
    $pdf->SetFontSize(35);
    $pdf->Cell(150,10,'RECIBO',0,0,'L',0);
    $pdf->SetXY(25,$y+25);
    $pdf->SetFontSize(9);
    $pdf->Cell(60,0,'DE');
    $fecha   = Date("d-m-Y");
    $pdf->Cell(0,0,'FECHA: '.$fecha.'');

    // Datos de la tienda
    $pdf->SetXY(25,38);
    $pdf->Cell(60,5,'RAGE');
    $caducidad = date("d-m-Y", strtotime($fecha.'+ 15 days'));
    $pdf->Cell(0,5,'FECHA DE CADUCIDAD: '.$caducidad.'');
    $pdf->SetXY(25,40);
    $pdf->Cell(40,10,'Calle Artesanias #44');
    $pdf->SetXY(25,43);
    $pdf->Cell(40,10,'45400 Edo.Jalisco');
    //Fin datos de la tienda
    
    //Datos del comprador
    $pdf->SetXY(25,50);
    $pdf->Cell(60,10,'PARA '); 
    $pdf->SetXY(25,53);
    $pdf->Cell(60,10,'User: '.$_SESSION['username'].'');
    $pdf->SetXY(25,57); 
    $pdf->Cell(60,10,'Email: '.$_SESSION['correo'].'');   
    $pdf->SetXY(25,58);


    $y = 40;
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetXY(25,85);
    $pdf->Cell(40,10,'Nombre del producto',1,0,'c');
    $pdf->Cell(20,10,'Precio ',1,0,'c');
    $pdf->Cell(20,10,'Cantidad',1,0,'c');
    $pdf->Cell(20,10,'iva',1,0,'c');
    $pdf->Cell(25,10,'Subtotal',1,1,'c');

    $Total = 0;

    // Verificar si el carrito está definido en la sesión
    if (isset($_SESSION['carrito'])) {
        $pdf->SetXY(25, 95);
        foreach ($_SESSION['carrito'] as $boton_id => $producto) {
            $pdf->SetX(25);
            $pdf->Cell(40, 5, $producto['NombreProd'], 1, 0, "L");
            $pdf->Cell(20, 5, "$" . $producto['PrecioProduct'], 1, 0, "L");
            $pdf->Cell(20, 5, $producto['Cantidad'], 1, 0, "L");
            $iva = $producto['Subtotal'] * 0.16;
            $pdf->Cell(20, 5, "$" . $iva, 1, 0, "L");
            $pdf->Cell(25, 5, "$" . $producto['Subtotal'], 1, 1, "L");
            $Total += $producto['Subtotal'] + $iva;
        }

        $IVA = $Total * 0.16;
        $sub = $Total + $IVA;

        $pdf->SetXY(25, 170);
        $pdf->Cell(30, 5, "Total: $ " . $Total, "", 0, "L");

        $pdf->SetXY(25, 175);
        $pdf->Cell(30, 5, "IVA: $ " . $IVA, "", 0, "L");

        $pdf->SetXY(25, 180);
        $pdf->Cell(30, 5, "Subtotal: $" . $sub, "", 0, "L");
    } else {
        $pdf->SetXY(25, 95);
        $pdf->Cell(0, 10, "Carrito vacio", 0, 1);
    }

    //footer
    $pdf->SetXY($x+10,200);
    $pdf->Cell(0,5,'CONDICIONES & FORMA DE PAGO',0,0,'C');
    $pdf->SetXY($x+10,205);
    $pdf->Cell(0,5,utf8_decode('El pago se realizará en un lapso de 15 días'),0,0,'C');
    $pdf->Image('./img/barras.png',70,215,80,0,'PNG','');
    //Output the document
    $nombredoc = 'Resumen'.$user.Date('F_j_Y').'.'.'pdf';
    $pdf->Output($nombredoc,'F');
    
        // Email configuration
    $to = $email;
    $from = "no-reply@rage.com";
    $subject = "Resumen pedido".$user.Date('F_j_Y');
    $message = "Le adjuntamos el resumen de su pedido";

    // Attachment
    $filename = $nombredoc;
    $attachment = chunk_split(base64_encode(file_get_contents($filename)));
    $boundary = md5(date('r', time()));

    // Headers
    $headers = "From: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

    // Message Body
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "\r\n" . chunk_split(base64_encode($message)) . "\r\n";

    // Attachment
    $body .= "--$boundary\r\n";
    $body .= "Content-Type: application/pdf; name=\"$filename\"\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "\r\n" . $attachment . "\r\n";
    $body .= "--$boundary--";

// Send the email
if (mail($to, $subject, $body, $headers)) {
    header("Location: index.php");
    $_SESSION['carrito'] = [];
    //echo "<script>window.close();</script>";
} else {
    echo "Email sending failed.";
}
    


}
    
?>