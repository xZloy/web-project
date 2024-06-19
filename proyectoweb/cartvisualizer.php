<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css?1.5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>RAGE</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
        </div>
        <nav>
                <a href="index.php" class="nav-link">Inicio</a>
                <a href="productos.php" class="nav-link">Productos</a>
                <a href="nostros.php" class="nav-link">Nosotros</a>
                <?php if(isset($_SESSION['username'])): ?>
                <a href="perfil.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
                <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
            <?php else: ?>
            <a href="logform.html" class="nav-link">Iniciar sesión</a>
            <a href="regform.html" class="nav-link">Registrarse</a>
            <?php endif; ?>
            
    </nav>
    
</header>

<h2>Carrito de Compras</h2>
<div class="table-container">
<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total = 0; // Inicializamos el total en 0
            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $boton_id => $producto) {
                    echo "<tr>";
                    echo "<td>{$producto['NombreProd']}</td>";
                    echo "<td>$ {$producto['PrecioProduct']}</td>";
                    echo "<td>{$producto['Cantidad']}</td>";
                    echo "<td>$ {$producto['Subtotal']}</td>";
                    echo "<td>";
                    echo "<a href='modify.php?action=add&id={$boton_id}' class='nav-link'><i class='fa-solid fa-plus'></i></a> ";
                    echo "<a href='modify.php?action=remove&id={$boton_id}' class='nav-link'><i class='fa-solid fa-minus'></i></a> ";
                    echo "<a href='modify.php?action=delete&id={$boton_id}' class='nav-link'><i class='fa-solid fa-trash'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                    $total += $producto['Subtotal']; // Sumamos al total el subtotal de cada producto
                }
            } else {
                echo "<tr><td colspan='5'>El carrito está vacío</td></tr>";
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>$ <?php echo $total; ?></strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>
</div>
<div class="botonpagar">
    <a href="pdf.php" class="btn-pdf">Pagar<i class="fa-solid fa-file-pdf"></i></a>
</div>
    <footer class="footer">
        <div class="contenedor">
            <div class="row">
                <div class="footer-col">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="#">Compra online</a></li>
                        <li><a href="#">Pago</a></li>
                        <li><a href="#">Envio</a></li>
                        <li><a href="#">Devoluciones</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Nosotros somos RAGE</h4>
                    <ul>
                        <li><a href="#">Acerca de RAGE</a></li>
                        <li><a href="#">Sostenibilidad</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>asdasdsd</h4>
                    <ul>
                        <li><a href="#">eae</a></li>
                        <li><a href="#">aeba</a></li>
                        <li><a href="#">dasdasd</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Siguenos</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/rageshop.mx/"><i class="fab fa-instagram"></i></a>
                    </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>