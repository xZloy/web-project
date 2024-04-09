<?php
include "conn.php";
    $name = $_POST['name'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pswd = $_POST['pswd'];
    $tel = $_POST['tel'];

    $sql = mysqli_query($con,"INSERT INTO user (idUser,nameUser,fullName,addressUser,emailUser,pswdUser,telUser) VALUES (0,'$user','$name','$address','$email','$pswd','$tel')");
    if($sql){
        $msg = "Usuario registrado en RAGE database"; 
        header("refresh:5; url=index.html");
        echo '<div>'.$msg.'</div>';
        echo '<p>Serás redirigido al índice en 5 segundos.</p>';
    }else{
        echo "Error al registrar un usuario en RAGE database";
    }
?>