<?php
    include "conn.php";
    session_start();
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the submitted values
        $nameprod = $_POST['nameprod'];
        $descprod = $_POST['descprod'];
        $costo = $_POST['costo'];
        $categ = $_POST['categ'];
        $urlproduct = $_POST['urlproduct'];
    
        // Get the original values from the database
        $original_values = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM Producto WHERE ID_prod = '$id'"));
    
        // Counter to track the number of changes
        $changes = 0;
    
        // Compare the submitted values with the original values
        if ($nameprod != $original_values['NombreProd']) {
            $changes++;
        }
        if ($descprod != $original_values['DescProd']) {
            $changes++;
        }
        if ($costo != $original_values['PrecioProduct']) {
            $changes++;
        }
        if ($categ != $original_values['ID_Cat']) {
            $changes++;
        }
        if ($urlproduct != $original_values['IMG_Prod']) {
            $changes++;
        }
    
        // Check if more than one field has been modified
        if ($changes > 1) {
            echo "Error: Only one field can be modified at a time.";
        } else {
            $sql = "UPDATE producto SET NombreProd = '$nameprod', DescProd = '$descprod', PrecioProduct = '$costo', ID_Cat = '$categ', IMG_Prod = '$urlproduct' WHERE ID_prod = '$id'";
            $result = mysqli_query($con, $sql);
            if($sql){
                header("refresh:0.5; url=admin.php?adminID=1");
            }else{
            echo "No se ha seleccionado un producto";
        }
        }
    }
?>