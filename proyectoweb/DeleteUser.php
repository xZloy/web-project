<?php
include "conn.php";

if (isset($_GET['id'])) {
    $idUsuario = intval($_GET['id']);

    $query_delete = "DELETE FROM user WHERE idUser = $idUsuario";
    $result_delete = mysqli_query($con, $query_delete);

    if ($result_delete) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID de usuario no proporcionado']);
}
?>