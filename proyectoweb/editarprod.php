<?php
    include "conn.php";
    session_start();
        $id = $_POST['id'];
        $nameprod = $_POST['nameprod'];
        $descprod = $_POST['descprod'];
        $costo = $_POST['costo'];
        $categ = $_POST['categ'];
        $urlproduct = $_POST['urlproduct'];
        $query = "SELECT * FROM Producto WHERE ID_prod = '$id'";
        $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
            $original_values = mysqli_fetch_array($result);
        // Error anterior ? lo igualaba a null, cuando tenia que ver si era un espacio vacio, lol todo sope
        if ($nameprod == '') {
            $nameprod = $original_values['NombreProd'];
        }
        if ($descprod == '') {
            $descprod = $original_values['DescProd'];
        }
        if ($costo == '') {
            $costo = $original_values['PrecioProduct'];
        }
        if ($categ == '') {
            $categ = $original_values['ID_Cat'];
        }
        if ($urlproduct == '') {
            $urlproduct = $original_values['IMG_Prod'];
        }
        $sql = "UPDATE producto SET NombreProd = '$nameprod', DescProd = '$descprod', PrecioProduct = '$costo', ID_Cat = '$categ', IMG_Prod = '$urlproduct' WHERE ID_prod = '$id'";
        $result = mysqli_query($con, $sql);
            if($result){
                header("Location: admin.php?adminID=1");
                exit;
            }else{
            echo "No se ha seleccionado un producto";
        }
    } else {
        echo "No se ha seleccionado un producto para actualizar.";
    }
?>