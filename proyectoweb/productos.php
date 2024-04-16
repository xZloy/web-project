<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAGE productos</title>
    <link rel="stylesheet" href="principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <header>
        <div class="logo">
            <a href="index.html"><img src="RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
        </div>
        <nav>
                <a href="index.html" class="nav-link">Inicio</a>
                <a href="#" class="nav-link">Productos</a>
                <a href="logform.html" class="nav-link">Iniciar sesion</a>
                <a href="regprodform.html" class="nav-link">Registrarse</a>
                <a href="nostros.html" class="nav-link">Nosotros</a>
        </nav>
    </header>
    
    <div class="productos-caja">
    <?php 
        include 'conn.php';
        $sql = mysqli_query($con, "SELECT * FROM Producto");
        while($row = mysqli_fetch_array($sql)){

        ?>
        <div class="galeria-prods">
            <div class="foto-prods">
                <img src="<?php echo $row['IMG_Prod']?>" alt="RAGE TSHIRT">
            </div>
            <div class="pie-prods">
                <p><?php echo $row['NombreProd']?><br/><?php echo $row['DescProd']?>
                <br><?php echo $row['PrecioProd']?></p>
                <form action="agregar_al_carrito.php" method="post">
                    <input type="hidden" name="producto_id" value="<?php echo $row['ID_prod']?>">
                    <button type="submit" class="agregar-carrito">Agregar al carrito</button>
                </form>
            </div>
        </div>
        <?php } ?>
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