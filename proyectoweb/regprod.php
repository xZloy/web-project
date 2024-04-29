<?php
include "conn.php";
    $nameprod = $_POST['nameprod'];
    $description = $_POST['descprod'];
    $cost = $_POST['costo'];
    $category = $_POST['categ'];
    $imgurl = $_POST['urlproduct'];

    $sql = mysqli_query($con,"INSERT INTO producto 
    (ID_prod,NombreProd,DescProd,IMG_Prod,PrecioProduct,ID_Cat)
    VALUES (0,'$nameprod','$description','$imgurl','$cost','$category')");
    if($sql){
        $msg = "Producto registrado en RAGE database"; 
        header("refresh:1; url=admin.php?adminID=1");
        echo '<div>'.$msg.'</div>';
        echo '<p>Serás redirigido al índice en 5 segundos.</p>';
    }else{
        echo "Error al registrar un usuario en RAGE database";
    }
?>