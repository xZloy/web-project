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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAGE productos</title>
    <link rel="stylesheet" href="principal.css?1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
        </div>
        <nav>
                <a href="index.php" class="nav-link">Inicio</a>
                <a href="#" class="nav-link">Productos</a>
                <a href="nostros.php" class="nav-link">Nosotros</a>
                <?php if(isset($_SESSION['username'])): ?>
                    <a href="perfil.php" class="nav-link"><i class="fa-solid fa-user"></i></a>
                    <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <a href="cartvisualizer.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                <?php else: ?>
                <a href="logform.html" class="nav-link">Iniciar sesión</a>
                <a href="regform.html" class="nav-link">Registrarse</a>
                <?php endif; ?>
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
                    <p><?php echo $row['NombreProd'] ?><br/><?php echo $row['DescProd'] ?><br>$<?php echo $row['PrecioProduct'] ?></p>
                <?php if(isset($_SESSION['username'])): ?>
                    <form action="agregar_al_carrito.php" method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $row['ID_prod'] ?>">
                        <input type="hidden" name="boton_id" value="boton_<?php echo $row['ID_prod'] ?>">
                        <button type="submit" class="agregar-carrito">Agregar al carrito</button>
                    </form>
                <?php else: ?>
                    <a href="logform.html" class="nav-link">Agregar al carrito</a>
                <?php endif; ?>
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
    <script>
            $(document).ready(function(){
                $(".agregar-carrito").click(function(event){
                    event.preventDefault(); // Prevenir la recarga de la página
                    var form = $(this).closest('form');
                    var formData = form.serialize(); // Serializar los datos del formulario

                    $.ajax({
                        type: "POST",
                        url: "agregar_al_carrito.php",
                        data: formData,
                        success: function(response) {
                            console.log("Producto agregado al carrito!");
                        },
                        error: function() {
                            console.log("Hubo un error al agregar el producto al carrito.");
                        }
                    });
                });
            });
</script>
</body>
</html>