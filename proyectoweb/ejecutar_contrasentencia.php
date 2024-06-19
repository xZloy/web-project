<?php
include "conn.php";


// Verificar conexión
if (!$con) {
    die("Error en la conexión: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reverseSQL = $_POST['reverseSQL'];

    // Ejecutar la contra-sentencia
    if ($con->query($reverseSQL) === TRUE) {
        echo "Contra-sentencia ejecutada exitosamente";
        header("Location: Admin.php?adminID=1");
    } else {
        echo "Error ejecutando la contra-sentencia: " . $conn->error;
    }
}

?>