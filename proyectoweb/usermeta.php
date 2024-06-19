<?php
include "conn.php";

$query_users = "SELECT * FROM user";
$result_users = mysqli_query($con, $query_users);

if (!$result_users) {
    die('Error en la consulta: ' . mysqli_error($con));
}

$usuarios = array();

while ($row = mysqli_fetch_assoc($result_users)) {
    $usuarios[] = $row;
}

header('Content-Type: application/json');
echo json_encode($usuarios);
?>