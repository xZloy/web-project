<?php

include "conn.php";

if (!$con) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$triggers = [
    'after_insert_product' => "
        CREATE TRIGGER IF NOT EXISTS after_insert_product
        AFTER INSERT ON producto
        FOR EACH ROW
        BEGIN
            INSERT INTO bitacora (fecha,executedSQL, reverseSQL,sentencia,user)
            VALUES (CURRENT_TIMESTAMP,
            CONCAT('INSERT INTO producto (ID_prod, NombreProd, DescProd, IMG_Prod, PrecioProduct, ID_Cat) VALUES (', NEW.ID_prod, ', \"', NEW.NombreProd, '\", \"', NEW.DescProd, '\", \"', NEW.IMG_Prod, '\", ', NEW.PrecioProduct, ', \"', NEW.ID_Cat, '\")'),);,
            CONCAT('DELETE FROM producto WHERE ID_prod = ', NEW.ID_prod),
            'INSERT',
            'ADMIN');
        END;
    ",
    'after_update_product' => "
        CREATE TRIGGER IF NOT EXISTS after_update_product
        AFTER UPDATE ON producto
        FOR EACH ROW
        BEGIN
            INSERT INTO bitacora (fecha, executedSQL, reverseSQL, sentencia, user)
            VALUES (CURRENT_TIMESTAMP,CONCAT('UPDATE producto SET NombreProd = \"', NEW.NombreProd, '\", DescProd = \"', NEW.DescProd, '\", IMG_Prod = \"', NEW.IMG_Prod, '\", PrecioProduct = ', NEW.PrecioProduct, ', ID_Cat = \"', NEW.ID_Cat, '\" WHERE ID_prod = ', NEW.ID_prod),
            CONCAT('UPDATE producto SET NombreProd = \"', OLD.NombreProd, '\", DescProd = \"', OLD.DescProd, '\", IMG_Prod = \"', OLD.IMG_Prod, '\", PrecioProduct = ', OLD.PrecioProduct, ', ID_Cat = \"', OLD.ID_Cat, '\" WHERE ID_prod = ', OLD.ID_prod),
            'UPDATE','ADMIN');
        END;
    ",
    'after_delete_product' => "
        CREATE TRIGGER IF NOT EXISTS after_delete_product
        AFTER DELETE ON producto
        FOR EACH ROW
        BEGIN
            INSERT INTO bitacora (fecha, executedSQL, reverseSQL, sentencia, user)
            VALUES (CURRENT_TIMESTAMP,  CONCAT('DELETE FROM producto WHERE ID_prod = ', OLD.ID_prod),
             CONCAT('INSERT INTO producto (ID_prod, NombreProd, DescProd, IMG_Prod, PrecioProduct, ID_Cat) VALUES (', OLD.ID_prod, ', \"', OLD.NombreProd, '\", \"', OLD.DescProd, '\", \"', OLD.IMG_Prod, '\", ', OLD.PrecioProduct, ', \"', OLD.ID_Cat, '\")'),
             'DELETE','ADMIN');
        END;
    "
];


foreach ($triggers as $trigger) {
    if (!mysqli_query($con, $trigger)) {
        die("Error al crear el trigger: " . mysqli_error($con));
    }
}

$query = "SELECT * FROM bitacora";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error en la consulta: ' . mysqli_error($con));
}

// Iniciar sesión para obtener el nombre del usuario
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitácora</title>
    <link rel="stylesheet" href="bitacora.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap");
    </style>
    <link rel="stylesheet" href="Admin.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
</head>
<body>
<header>
    <div class="contenedor">
        <h1 class="titulo">Tu amigo Amigurumi</h1>
        <nav class="menu">
            <a>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo $_SESSION['usuario'];
                } elseif (isset($_SESSION['admin'])) {
                    echo "Admin";
                } else {
                    echo "Invitado";
                }
                ?>
            </a>
            <a href="Admin.php">Inicio</a>
            <a href="Usuariosv.php">Usuarios</a>
            <a href="bitacora.php">Bitacora</a>
            <a href="logout.php">Cerrar Sesión</a>
        </nav>
    </div>
</header>

<section id="banner">
    <img class="img" src="Imagenes/logoami.png" alt="center">
    <div class="contenedor"></div>
</section>

<main class="Table">
    <section class="table_header">
        <h1>Bitácora</h1>
    </section>
    <section class="table_body">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Acción</th>
                    <th>Fecha y Hora</th>
                    <th>Usuario</th>
                    <th>Sentencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los registros de la bitacora
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['accion'] . "</td>";
                    echo "<td>" . $row['fecha_hora'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['sentencia'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <div class="container">
        <p>&copy; Tu Amigo Amigurumi. Todos los derechos reservados.</p>
        <ul>
            <li><a href="https://www.facebook.com/amigurumiscrochetgdl"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.instagram.com/tuamigoamigurumi/?hl=es"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
</footer>
</body>
</html>