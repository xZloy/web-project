<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.11">
    <title>Registrar producto</title>
    <link rel="stylesheet" href="principal.css?1.2">
    
</head>
<body>
    <header>
        <div class="logo">
            <img src="RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE">
        </div>
        <nav>
                <a href="regprodform.html" class="nav-link">Registrar productos</a>
                <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
        </nav>
    </header>
    <div class="product-table-container">
        <table class="product-table">
                <thead>
                    <tr>
                        <th class="header">ID</th>
                        <th class="header">Nombre</th>
                        <th class="header">Descripción</th>
                        <th class="header">Precio</th>
                        <th class="header">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php  include 'conn.php';
                    $sql = mysqli_query($con, "SELECT * FROM Producto");
                    while($row = mysqli_fetch_array($sql)){ 
                        ?>
                        <tr class="product-row">
                            <td class="id"><?php echo $row['ID_prod']; ?></td>
                            <td class="name""><?php echo $row['NombreProd']; ?></td>
                            <td class="description"><?php echo $row['DescProd']; ?></td>
                            <td class="price">$<?php echo $row['PrecioProduct']; ?></td>
                            <td class="actions">
                                <a href="editar_producto.php?id=<?php echo $row['ID_prod']; ?>" class="nav-link"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="eliminar_producto.php?id=<?php echo $row['ID_prod']; ?>" class="nav-link"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
    

</body>
</html>