<?php
$server = 'localhost';
$data = 'ragedb';
$user = 'root';
$pass = '';
$con = mysqli_connect($server,$user,$pass,$data);
if(!$con){
    die("Fallo en la conexion a RAGE database");
}else{
   /* $mensaje = "Conexion exitosa con RAGE database";
    echo '<div>'.$mensaje.'</div>';*/
    
}


?>