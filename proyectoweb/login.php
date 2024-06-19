<?php
include "conn.php";
session_start();
    $email = $_POST['email'];
    $pswd = $_POST['password'];
    //$nombre = $_POST['name'];
    $sql = "SELECT * FROM  user WHERE emailUser = '$email' AND pswdUser = '$pswd'";
        $result = mysqli_query($con, $sql);
                if($result && mysqli_num_rows($result) > 0)
                {    
                    $row = mysqli_fetch_assoc($result); 
                    $username = $row['nameUser'];
                    $nombre = $row['fullName'];
                    $_SESSION['correo'] = $email;
                    $_SESSION['username'] = $username;
                    $_SESSION['nombre'] = $nombre;

                    if($_SESSION['username'] == 'admin'){
                        header("refresh:0.5; url=admin.php?adminID=1");
                    }else{
                        header("refresh:0.5; url=index.php");
                    }
                    
                    //echo 'Bienvenido'.$_SESSION['username'];
                }else{
                    echo "Error al iniciar sesion";
                }
   // }
?>
    

    

    
    
    
