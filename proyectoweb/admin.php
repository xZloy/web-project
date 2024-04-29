<?php
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.11">
    <title>Registrar producto</title>
    <link rel="stylesheet" href="principal.css?1.2">
    <link rel="stylesheet" href="estilo.css?1.2">
    
</head>
<body>
    
    <?php
        if(isset($_GET['adminID'])){
            $adminID = $_GET['adminID'];
        }
        include 'conn.php';
        if($adminID == 1)
        {
            ?>
            <header>
                <div class="logo">
                <a href="admin.php?adminID=1"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
                </div>
                <nav>
                        <a href="admin.php?adminID=2" class="nav-link">Registrar productos</a>
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

                <?php  
                    $sql = mysqli_query($con, "SELECT * FROM Producto");
                    while($row = mysqli_fetch_array($sql)){ 
                        ?>
                        <tr class="product-row">
                            <td class="id"><?php echo $row['ID_prod']; ?></td>
                            <td class="name""><?php echo $row['NombreProd']; ?></td>
                            <td class="description"><?php echo $row['DescProd']; ?></td>
                            <td class="price">$<?php echo $row['PrecioProduct']; ?></td>
                            <td class="actions">
                                <a href="admin.php?adminID=3&id=<?php echo $row['ID_prod']; ?>" class="nav-link"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="eliminar_producto.php?id=<?php echo $row['ID_prod']; ?>" class="nav-link"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
    <?php } 
        else if($adminID == 2)
        {
            ?>
            <header>
                <div class="logo">
                <a href="admin.php?adminID=1"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
                </div>
                <nav>
                        <a href="admin.php?adminID=1" class="nav-link"><i class="fa-solid fa-user-tie"></i></a>
                        <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                </nav>
            </header>
                <div class="registroproducto">
                    <h1>Registrar producto</h1>
                    <h4>Registra un producto que desees agregar</h4>
                    <form action="regprod.php" method="post">
                        <label>Nombre del producto</label>
                        <input type="text" name="nameprod" required>
                        <label>Descripcion del producto</label>
                        <input type="text" name="descprod" required>
                        <label>Precio del producto</label>
                        <input type="text" name="costo" required>
                        <label>Categoria</label>
                        <input type="text" name="categ" required>
                        <label>Imagen del producto (url)</label>
                        <input type="text" name="urlproduct" required>
                        <input type="submit" value="Registrar producto">
                    </form>
                </div>
            <?php
        }

        else if($adminID==3){
    ?>
            <header>
                <div class="logo">
                <a href="admin.php?adminID=1"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
                </div>
                <nav>
                        <a href="admin.php?adminID=1" class="nav-link"><i class="fa-solid fa-user-tie"></i></a>
                        <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                </nav>
            </header>
                <div class="registroproducto">
                    <h1>Editar producto</h1>
                    <h4>Parte superior: nombre antiguo, coloque en la parte inferior el dato que desee cambiar</h4>
                        <?php
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $sql = mysqli_query($con, "SELECT * FROM Producto WHERE ID_prod = '$id'");
                                while($row = mysqli_fetch_array($sql)){ 
                        ?>
                    <form action="editarprod.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['ID_prod']; ?>">
                        <label>Nombre del producto</label>
                        <input type="text" name="nameprod"  value="<?php echo $row['NombreProd']; ?>" require>
                        <label>Descripcion</label>
                        <input type="text" name="descprod" value="<?php echo $row['DescProd']; ?>" required>
                        <label>Precio actual</label>
                        <input type="text" name="costo" value="<?php echo $row['PrecioProduct']; ?>" required>
                        <label>Categoria actual</label>
                        <input type="text" name="categ"  value="<?php echo $row['ID_Cat']; ?>" required>
                        <label>URL actual</label>
                        <input type="text" name="urlproduct" value="<?php echo $row['IMG_Prod']; ?>" required>
                        <input type="submit" value="Editar producto">
                    </form>
                </div>
    <?php
            

        }}}
        ?>
    

</body>
</html>