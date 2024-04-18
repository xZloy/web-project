<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css?1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>RAGE</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
        </div>
        <nav>
                <a href="#" class="nav-link">Inicio</a>
                <a href="productos.php" class="nav-link">Productos</a>
                <a href="logform.html" class="nav-link">Iniciar sesion</a>
                <a href="regform.html" class="nav-link">Registrarse</a>
                <a href="nostros.html" class="nav-link">Nosotros</a>
                <?php 
                    if(isset($_GET['email'])){
                        $email = $_GET['email'];
                    }
                ?>
                <a href="pdf.php?email=<?php echo "$email"; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
        </nav>
        
    </header>
    <div class="container">
        <div class="slide">
            <ul>
                <li><img src="DISPONIBLE_AHORA (1).png" alt=""></li>
                <li><img src="DISPONIBLE_AHORA (1).png" alt=""></li>
                <li><img src="DISPONIBLE_AHORA (1).png" alt=""></li>
            </ul>
        </div>
    </div>
    
    <section>
        <div class="dividir">
            <div class="caja-mision">
                <h2>Mision</h2>
                <p>En Rage, nos dedicamos a ofrecer prendas minimalistas de alta 
                    calidad, con precisión en la impresión y colores neutros. Buscamos
                    brindar una experiencia excepcional donde la simplicidad y la 
                    elegancia se unan, reflejando nuestra pasión por el diseño 
                    atemporal y la atención al detalle. Inspiramos un estilo de vida 
                    minimalista, donde cada prenda expresa 
                    individualidad y sofisticación.</p>
                     <img src="RAGE_Shirts.png" alt="RAGE">
            </div>
            <div class="caja-vision">
                <h2>Vision</h2>
                <p>En Rage, visualizamos un futuro donde la moda minimalista 
                    redefine los estándares de elegancia y simplicidad. Nos esforzamos 
                    por ser reconocidos como líderes en la industria de la moda por nuestra 
                    innovación en la impresión de alta calidad y nuestra gama de colores 
                    neutros que trascienden las tendencias pasajeras.</p>
                    <img src="RAGE_GIW.png" alt="RAGE">
            </div>
        </div>
    </section>     
    <section>
        <div >

        </div>
        <div class="caja-producto">
                <div class="galeria">
                    <div class="foto">
                        <img src="TSHIRT_BLACK_FRONT-removebg-preview.png" alt="RAGE BLACK">
                    </div>
                    <div class="pie">
                        <p>RAGE Black T-shirt</p>
                    </div>
                </div>
                <div class="galeria">
                    <div class="foto">
                        <img src="TSHIRT_WHITE_FRONT-removebg-preview.png" alt="RAGE BLACK">
                    </div>
                    <div class="pie">
                        <p>RAGE White T-shirt</p>
                    </div>
                </div>
                <div class="seemore-products">
                    <h2>Productos</h2>
                    <p>Quieres ver más productos?</p><br>
                    <a href="productos.php"><input type="button" name="VerProds" value="Ver productos"></a>
                </div>
        </div>
    </section>
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