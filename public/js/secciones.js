document.addEventListener("DOMContentLoaded", function() {
    // Mostrar solo la sección de comentarios al cargar
    showSection('commentsSection');

    // Función para manejar la navegación
    function showSection(section) {
        document.getElementById('commentsSection').style.display = 'none';
        document.getElementById('productsSection').style.display = 'none';
        document.getElementById('usersSection').style.display = 'none';

        document.getElementById(section).style.display = 'block';
    }

    // Añadir evento a los enlaces del menú de navegación
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(event) {
            // Prevenir el comportamiento predeterminado del enlace
            event.preventDefault();

            // Comprobar si el enlace apunta a una sección o a una ruta
            const section = this.getAttribute('data-section');

            if (section) {
                showSection(section); // Mostrar la sección correspondiente
            } else {
                // Si no es una sección, redirigir a la ruta
                const href = this.getAttribute('href');
                window.location.href = href;
            }
        });
    });
});