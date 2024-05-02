<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['producto_id']) && isset($_POST['boton_id'])) {
        $producto_id = $_POST['producto_id'];
        $boton_id = $_POST['boton_id'];

        // Realizar la consulta SQL para obtener la información del producto
        // Aquí asumo que tienes una tabla llamada 'Producto' con campos como 'NombreProd', 'DescProd', 'PrecioProd', etc.
        include 'conn.php';
        $sql = mysqli_query($con, "SELECT * FROM producto WHERE ID_prod = $producto_id");
        $producto = mysqli_fetch_array($sql);

        // Verificar si el carrito ya existe en la sesión, si no, crearlo
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['carrito'][$boton_id])) {
            // Aumentar la cantidad del producto en el carrito
            $_SESSION['carrito'][$boton_id]['Cantidad']++;
            $_SESSION['carrito'][$boton_id]['Subtotal'] = $_SESSION['carrito'][$boton_id]['PrecioProduct'] * $_SESSION['carrito'][$boton_id]['Cantidad'];
        } else {
            // Si el producto no está en el carrito, agregarlo con una cantidad inicial de 1
            $producto_carrito = array(
                'ID_prod' => $producto['ID_prod'],
                'NombreProd' => $producto['NombreProd'],
                'PrecioProduct' => $producto['PrecioProduct'],
                'Cantidad' => 1,
                'Subtotal' => $producto['PrecioProduct']
            );
            $_SESSION['carrito'][$boton_id] = $producto_carrito;
        }
        echo "<pre>";
        print_r($_SESSION['carrito']);
        echo "</pre>";

        header("Location: productos.php");
        exit;
    }

?>