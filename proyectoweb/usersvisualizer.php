<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuarios</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Admin.css" />
  </head>
  <body>
    <header>
      <div class="contenedor">
        <h1 class="titulo">Tu amigo Amigurumi</h1>
        <input type="checkbox" id="menu-bar" />
        <label class="icon-menu" for="menu-bar"></label>
        <nav class="menu">
          <a>
            <?php
                    session_start();
                    if (isset($_SESSION['usuario'])) {
                        echo $_SESSION['usuario'];
                    } elseif (isset($_SESSION['admin'])) {
                        echo "Admin";
                    } else {
                        echo "Invitado";
                    }
                    ?>
          </a>
          <a href="Admin.php">Inicio</a>
          <a href="Usuariosv.php">Usuarios</a>
          <a href="bitacora.php">Bitacora</a>
          <a href="logout.php">Cerrar Sesión</a>
        </nav>
      </div>
    </header>

    <section id="banner">
      <img class="img" src="Imagenes/logoami.png" alt="center" />
      <div class="contenedor">
      </div>
    </section>

    <main class="Table">
      <section class="table_header">
        <h1>Lista de Usuarios</h1>
      </section>
      <section class="table_body">
        <ul id="lista-usuarios"></ul>
      </section>
    </main>

    <footer>
      <div class="container">
        <p>&copy; Tu Amigo Amigurumi. Todos los derechos reservados.</p>
        <ul>
          <li>
            <a href="https://www.facebook.com/amigurumiscrochetgdl"
              ><i class="fab fa-facebook-f"></i
            ></a>
          </li>
          <li>
            <a href="https://www.instagram.com/tuamigoamigurumi/?hl=es"
              ><i class="fab fa-instagram"></i
            ></a>
          </li>
        </ul>
      </div>
    </footer>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        fetch("Usuarios.php")
          .then((response) => response.json())
          .then((usuarios) => {
            const listaUsuarios = document.getElementById("lista-usuarios");
            usuarios.forEach((usuario) => {
              const li = document.createElement("li");
              li.innerHTML = `ID: ${usuario.IdUsuario}, Nombre: ${usuario.NombreUsuario}, Correo: ${usuario.CorreoUsuario} 
                <button onclick="eliminarUsuario(${usuario.IdUsuario}, this)">Eliminar</button>`;
              listaUsuarios.appendChild(li);
            });
            localStorage.setItem("usuarios", JSON.stringify(usuarios));
          })
          .catch((error) => console.error("Error al obtener usuarios:", error));
      });

      function eliminarUsuario(idUsuario, button) {
        if (confirm("¿Está seguro de que desea eliminar este usuario?")) {
          fetch(`EliminarUsuario.php?id=${idUsuario}`, {
            method: 'GET'
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              const li = button.parentElement;
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
  </body>
</html>