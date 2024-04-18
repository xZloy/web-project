<?php
include "conn.php";
    $email = $_POST['email'];
    $pswd = $_POST['password'];
        $sql = mysqli_query($con,"SELECT * FROM  user WHERE emailUser = '$email' AND pswdUser = '$pswd'");
        if($sql)
        {
            $msg = "Sesion iniciada con el correo: ".$email; 
            header("refresh:1; url=index.php?email=$email");
            echo '<div>'.$msg.'</div>';
            echo '<p>Serás redirigido al índice en 5 segundos.</p>';
        }else{
            echo "Error al iniciar sesion";
        }
    
?>