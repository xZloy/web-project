// Función para agregar al carrito
function addToCart(productId) {
    $.ajax({
        url: 'modify.php',
        type: 'POST',
        data: { action: 'add', id: productId },
        success: function(data) {
            $('#cart-table').html(data); // Actualizar la tabla del carrito con los nuevos datos
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
    return false; // Evitar que se recargue la página al hacer clic en el enlace
}

// Función para restar del carrito
function removeFromCart(productId) {
    $.ajax({
        url: 'modify.php',
        type: 'POST',
        data: { action: 'remove', id: productId },
        success: function(data) {
            $('#cart-table').html(data); // Actualizar la tabla del carrito con los nuevos datos
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
    return false; // Evitar que se recargue la página al hacer clic en el enlace
}

// Función para eliminar del carrito
function deleteFromCart(productId) {
    $.ajax({
        url: 'modify.php',
        type: 'POST',
        data: { action: 'delete', id: productId },
        success: function(data) {
            $('#cart-table').html(data); // Actualizar la tabla del carrito con los nuevos datos
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);
        }
    });
    return false; // Evitar que se recargue la página al hacer clic en el enlace
}