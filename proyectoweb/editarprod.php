<?php
    include "conn.php";
    session_start();
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        
        }
        $nameProd = $_POST['nameprod'];
        $descProd = $_POST['descprod'];
        $price = $_POST['costo'];
        $category = $_POST['categ'];
        $sql = "UPDATE producto SET NombreProd = '$nameProd', DescProd = '$descProd', PrecioProduct = '$price', ID_Cat = '$category' WHERE ID_prod = '$id'";
            $result = mysqli_query($con, $sql);
            if($sql){
                header("refresh:0.5; url=admin.php?adminID=1");
            }else{
            echo "No se ha seleccionado un producto";
        }
        
?>