<?php
    include 'conn.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = mysqli_query($con, "DELETE FROM Producto WHERE ID_prod = '$id'");
        if($sql){
            header("refresh:0.5; url=admin.php?adminID=1");
        }
    }else{
        echo "No se ha seleccionado un producto";
    }
?>