<main class="Table">
            <section class="table_header">
                <h1>Lista de Usuarios</h1>
            </section>
            <section class="table_body">
                <ul id="lista-usuarios"></ul>
            </section>
        </main>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                fetch("usermeta.php")
                .then((response) => response.json())
                .then((usuarios) => {
                    const listaUsuarios = document.getElementById("lista-usuarios");
                    usuarios.forEach((usuario) => {
                    const li = document.createElement("li");
                    li.innerHTML = `ID: ${usuario.idUser}, Nombre: ${usuario.nameUser}, Correo: ${usuario.emailUser} 
                        <button onclick="eliminarUsuario(${usuario.idUser}, this)">Eliminar</button>`;
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