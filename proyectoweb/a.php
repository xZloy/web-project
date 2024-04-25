<?php
    session_start();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    if($_SESSION['nombre']==null || $_SESSION['apelliodo']==null){
        echo '<p>Favor de ingresar un usuario</p>';
        echo '<a href="form.html">Iniciar con otro usuario</a>';
    }else{
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;

        echo "Hola ".$_SESSION['nombre']. " ".$_SESSION['apellido'] .'<br>';
        echo '<button><a href="cerrarsesion.php">Cerrar sesion</a></button>';
    }

?>