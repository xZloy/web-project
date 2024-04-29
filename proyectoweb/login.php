<?php
include "conn.php";
session_start();
/*if(!isset($_SESSION['correo'])){
    header('location: index.php');
    exit();
}else{*/
    $email = $_POST['email'];
    $pswd = $_POST['password'];
    $sql = "SELECT * FROM  user WHERE emailUser = '$email' AND pswdUser = '$pswd'";
        $result = mysqli_query($con, $sql);
                if($result && mysqli_num_rows($result) > 0)
                {    
                    $row = mysqli_fetch_assoc($result); 
                    $username = $row['nameUser'];
                    $_SESSION['correo'] = $email;
                    $_SESSION['username'] = $username;

                    if($_SESSION['username'] == 'admin'){
                        header("refresh:0.5; url=admin.php");
                    }else{
                        header("refresh:0.5; url=index.php");
                    }
                    
                    //echo 'Bienvenido'.$_SESSION['username'];
                }else{
                    echo "Error al iniciar sesion";
                }
   // }
?>
    

    

    
    
    
