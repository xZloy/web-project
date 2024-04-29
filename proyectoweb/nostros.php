<?php 
    session_start();
    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAGE nosotros</title>
    <link rel="stylesheet" href="principal.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
        </div>
        <nav>
                <a href="index.php" class="nav-link">Inicio</a>
                <a href="productos.php" class="nav-link">Productos</a>
                <a href="#" class="nav-link">Nosotros</a>
                <?php if(isset($_SESSION['username'])): ?>
                <a href="perfil.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
                <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                <a href="cartvisualizer" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                <?php else: ?>
                <a href="logform.html" class="nav-link">Iniciar sesión</a>
                <a href="regform.html" class="nav-link">Registrarse</a>
                <?php endif; ?>
        </nav>
    </header>

    <div class="about-us">
        <section>
            <div class="baner">
                <img src="img/DISPONIBLE_AHORA (1).png" alt="">

            </div>
        </section>
        <section>
            <div class="sec-abtus">
                <h2>Acerca de RAGE</h2>
                    <p>RAGE surge de la necesidad de producir ropa de alta calidad con buenos 
                        y minimalistas diseños para el público amante de ello y que aquel que
                        no sea un fan de este estilo, pueda probarlo y llevarse lo mejor
                        de lo mejor a su hogar.
                    </p>
            </div>
        </section>
        <section>
            <div class="dividirh2">
                <h2>Conoce a nuestros fundadores</h2>
            </div>
            <div class="founders">
                <div class="textofounder">
                    <h3>Jesús Rostro</h3>
                    <p>Desarrollador de software</p>
                </div>
                <div class="fotofounder">
                    <img src="img/TSHIRT_WHITE_FRONT-removebg-preview.png" alt="Jesus">    
                </div>
            </div>
            <div class="founders">
                <div class="fotofounder">
                    <img src="img/TSHIRT_WHITE_FRONT-removebg-preview.png" alt="Jesus">    
                </div>
                <div class="textofounder">
                    <h3>Fabian</h3><br>
                    <p>Diseñador</p>
                </div>
            </div>
        </section>

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