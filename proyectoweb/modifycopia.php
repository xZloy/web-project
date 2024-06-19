<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch ($action) {
            case 'add':
                // Incrementar la cantidad del producto en el carrito
                if (isset($_SESSION['carrito'][$id])) {
                    $_SESSION['carrito'][$id]['Cantidad']++;
                    $_SESSION['carrito'][$id]['Subtotal'] = $_SESSION['carrito'][$id]['PrecioProduct'] * $_SESSION['carrito'][$id]['Cantidad'];
                }
                break;

            case 'remove':
                // Disminuir la cantidad del producto en el carrito
                if (isset($_SESSION['carrito'][$id])) {
                    $_SESSION['carrito'][$id]['Cantidad']--;
                    if ($_SESSION['carrito'][$id]['Cantidad'] <= 0) {
                        unset($_SESSION['carrito'][$id]);
                    } else {
                        $_SESSION['carrito'][$id]['Subtotal'] = $_SESSION['carrito'][$id]['PrecioProduct'] * $_SESSION['carrito'][$id]['Cantidad'];
                    }
                }
                break;

            case 'delete':
                // Eliminar el producto del carrito
                if (isset($_SESSION['carrito'][$id])) {
                    unset($_SESSION['carrito'][$id]);
                }
                break;

            default:
                break;
        }
    }

    header("Location: cartvisualizer.php"); 
    exit;
?>