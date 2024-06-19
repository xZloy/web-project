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
    <link rel="stylesheet" href="principal.css?1.7">
    <link rel="stylesheet" href="estilo.css?1.2">
    
</head>
<body>
    
    <?php
        if(isset($_GET['adminID'])){
            $adminID = $_GET['adminID'];
        }
        //include 'conn.php';
        if($adminID == 1) {
            // Si toma por GET search como variable entonces muestra el if, sino muestra el else vamoestral
            if(isset($_GET['search'])) {
                $search = $_GET['search'];
                // Consulta SQL con filtro de búsqueda
                $sql = mysqli_query($con,"SELECT * FROM Producto WHERE ID_prod LIKE '%$search%' OR NombreProd = '%$search%' OR DescProd 
                LIKE '%$search%' OR PrecioProduct LIKE '%$search%' OR ID_Cat LIKE '%$search%' OR IMG_Prod LIKE '%$search%'");

            } else {
                // Consulta SQL sin filtro de búsqueda
                $sql = mysqli_query($con, "SELECT * FROM Producto");
            }
    ?>
            <header>
                <div class="logo">
                    <a href="admin.php?adminID=1"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
                </div>
                <nav>
                    <a href="admin.php?adminID=2" class="nav-link"><i class="fa-solid fa-plus"></i><i class="fa-solid fa-shirt"></i></a>
                    <a href="admin.php?adminID=4" class="nav-link"><i class="fa-solid fa-clock"></i></i></a>
                    <a href="admin.php?adminID=5" class="nav-link"><i class="fa-solid fa-users"></i></a>
                    <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                </nav>
            </header>
            <div class="search-container">
                <form action="admin.php" method="GET">
                    <input type="hidden" name="adminID" value="1">
                    <input type="text" placeholder="Buscar..." name="search">
                    <button type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
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
                            while($row = mysqli_fetch_array($sql)){ 
                        ?>
                        <tr class="product-row">
                            <td class="id"><?php echo $row['ID_prod']; ?></td>
                            <td class="name"><?php echo $row['NombreProd']; ?></td>
                            <td class="description"><?php echo $row['DescProd']; ?></td>
                            <td class="price">$<?php echo $row['PrecioProduct']; ?></td>
                            <td class="actions">
                                <a href="admin.php?adminID=3&id=<?php echo $row['ID_prod']; ?>" class="nav-link"><i class="fa-solid fa-pencil"></i></a>
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
                        <input type="text" name="nameprod" value="<?php echo $row['NombreProd']; ?>">
                        <label>Descripcion</label>
                        <input type="text" name="descprod" value="<?php echo $row['DescProd']; ?>">
                        <label>Precio actual</label>
                        <input type="text" name="costo" value="<?php echo $row['PrecioProduct']; ?>">
                        <label>Categoria actual</label>
                        <input type="text" name="categ" value="<?php echo $row['ID_Cat']; ?>">
                        <label>URL actual</label>
                        <input type="text" name="urlproduct" value="<?php echo $row['IMG_Prod']; ?>">
                        <input type="submit" value="Editar producto">
                    </form>
                </div>
    <?php
            

        }}}
        else if($adminID == 4)
        {
            include "conn.php";

                if (!$con) {
                    die("Error en la conexión: " . mysqli_connect_error());
                }

                $triggers = [
                    'after_insert_product' => "
                        CREATE TRIGGER IF NOT EXISTS after_insert_product
                        AFTER INSERT ON producto
                        FOR EACH ROW
                        BEGIN
                            INSERT INTO bitacora (fecha, executedSQL, reverseSQL, sentencia, user)
                            VALUES (
                                now(),
                                CONCAT('INSERT INTO producto (ID_prod, NombreProd, DescProd, IMG_Prod, PrecioProduct, ID_Cat) VALUES (', NEW.ID_prod, ', \"', NEW.NombreProd, '\", \"', NEW.DescProd, '\", \"', NEW.IMG_Prod, '\", ', NEW.PrecioProduct, ', \"', NEW.ID_Cat, '\")'),
                                CONCAT('DELETE FROM producto WHERE ID_prod = ', NEW.ID_prod),
                                'INSERT',
                                'ADMIN'
                            );
                        END;
                    ",
                    'after_update_product' => "
                        CREATE TRIGGER IF NOT EXISTS after_update_product
                        AFTER UPDATE ON producto
                        FOR EACH ROW
                        BEGIN
                            INSERT INTO bitacora (fecha, executedSQL, reverseSQL, sentencia, user)
                            VALUES (
                                now(),
                                CONCAT('UPDATE producto SET NombreProd = \"', NEW.NombreProd, '\", DescProd = \"', NEW.DescProd, '\", IMG_Prod = \"', NEW.IMG_Prod, '\", PrecioProduct = ', NEW.PrecioProduct, ', ID_Cat = \"', NEW.ID_Cat, '\" WHERE ID_prod = ', NEW.ID_prod),
                                CONCAT('UPDATE producto SET NombreProd = \"', OLD.NombreProd, '\", DescProd = \"', OLD.DescProd, '\", IMG_Prod = \"', OLD.IMG_Prod, '\", PrecioProduct = ', OLD.PrecioProduct, ', ID_Cat = \"', OLD.ID_Cat, '\" WHERE ID_prod = ', OLD.ID_prod),
                                'UPDATE',
                                'ADMIN'
                            );
                        END;
                    ",
                    'after_delete_product' => "
                        CREATE TRIGGER IF NOT EXISTS after_delete_product
                        AFTER DELETE ON producto
                        FOR EACH ROW
                        BEGIN
                            INSERT INTO bitacora (fecha, executedSQL, reverseSQL, sentencia, user)
                            VALUES (
                                now(),
                                CONCAT('DELETE FROM producto WHERE ID_prod = ', OLD.ID_prod),
                                CONCAT('INSERT INTO producto (ID_prod, NombreProd, DescProd, IMG_Prod, PrecioProduct, ID_Cat) VALUES (', OLD.ID_prod, ', \"', OLD.NombreProd, '\", \"', OLD.DescProd, '\", \"', OLD.IMG_Prod, '\", ', OLD.PrecioProduct, ', \"', OLD.ID_Cat, '\")'),
                                'DELETE',
                                'ADMIN'
                            );
                        END;
                    "
                ];


                foreach ($triggers as $trigger) {
                    if (!mysqli_query($con, $trigger)) {
                        die("Error al crear el trigger: " . mysqli_error($con));
                    }
                }

                $query = "SELECT * FROM bitacora";
                $result = mysqli_query($con, $query);

                if (!$result) {
                    die('Error en la consulta: ' . mysqli_error($con));
                }

                // Iniciar sesión para obtener el nombre del usuario
                session_start();

                ?>
            <header>
                <div class="logo">
                    <a href="admin.php?adminID=1"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
                </div>
                <nav>
                    <a href="admin.php?adminID=2" class="nav-link"><i class="fa-solid fa-plus"></i><i class="fa-solid fa-shirt"></i></a>
                    <a href="admin.php?adminID=5" class="nav-link"><i class="fa-solid fa-users"></i></a>
                    <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                </nav>
            </header>
            <div class="search-container">
                <form action="admin.php" method="GET">
                    <input type="hidden" name="adminID" value="1">
                    <input type="text" placeholder="Buscar..." name="search">
                    <button type="submit"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
            <div class="product-table-container">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th class="header">ID</th>
                            <th class="header">Fecha</th>
                            <th class="header">Usuario</th>
                            <th class="header">Tipo de accion</th>
                            <th class="header">Sentencia ejecutada</th>
                            <th class="header">Contra-Sentencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            while ($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr class="product-row">
                            <td class="id"><?php echo $row['idbitacora']; ?></td>
                            <td class="name"><?php echo $row['fecha']; ?></td>
                            <td class="name"><?php echo $row['user']; ?></td>
                            <td class="name"><?php echo $row['sentencia']; ?></td>
                            <td class="description"><?php echo $row['executedSQL']; ?></td>
                            <td class="price">$<?php echo $row['reverseSQL']; ?></td>
                            <td class="actions">
                            <form method="POST" action="ejecutar_contrasentencia.php">
                                <input type="hidden" name="reverseSQL" value="<?php echo htmlspecialchars($row['reverseSQL']); ?>">
                                <button type="submit" class="nav-link"><i class="fa-solid fa-clock-rotate-left"></i></button>
                            </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        else if($adminID == 5)
        {
        ?>
        <header>
                <div class="logo">
                    <a href="admin.php?adminID=1"><img src="img/RAGE_LOGO_CAFE_V1.png" alt="Logo de RAGE"></a>
                </div>
                <nav>
                    <a href="admin.php?adminID=2" class="nav-link"><i class="fa-solid fa-plus"></i><i class="fa-solid fa-shirt"></i></a>
                    <a href="admin.php?adminID=4" class="nav-link"><i class="fa-solid fa-clock"></i></i></a>
                    <a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a>
                </nav>
            </header>
            <div class="Table">
                <section class="table_header">
                    <h1>Lista de Usuarios</h1>
                </section>
                <section class="table_body">
                    <ul id="lista-usuarios"></ul>
                </section>
        </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    fetch("usermeta.php")
                    .then((response) => response.json())
                    .then((usuarios) => {
                        const listaUsuarios = document.getElementById("lista-usuarios");
                        usuarios.forEach((usuario) => {
                            const li = document.createElement("li");
                            li.innerHTML = `
                                <div class="usuario-item">
                                    <span class="usuario-info">ID: ${usuario.idUser}, Nombre: ${usuario.nameUser}, Correo: ${usuario.emailUser}</span>
                                    <button class="nav-link" onclick="eliminarUsuario(${usuario.idUser}, this)"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            `;
                            listaUsuarios.appendChild(li);
                        });
                        localStorage.setItem("usuarios", JSON.stringify(usuarios));
                    })
                    .catch((error) => console.error("Error al obtener usuarios:", error));
                });

                function eliminarUsuario(idUser, button) {
                    if (confirm("¿Está seguro de que desea eliminar este usuario?")) {
                        fetch(`DeleteUser.php?id=${idUser}`, {
                            method: 'GET'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const li = button.parentElement.parentElement; // Obtener el <li> padre
                                li.remove();
                                alert("Usuario eliminado exitosamente.");
                            } else {
                                alert("Error al eliminar usuario.");
                            }
                        })
                        .catch(error => {
                            console.error("Error al eliminar usuario:", error);
                            alert("Error al eliminar usuario.");
                        });
                    }
                }
            </script>
        <?php } ?>
        

</body>
</html>