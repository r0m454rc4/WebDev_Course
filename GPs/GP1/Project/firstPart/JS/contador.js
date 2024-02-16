// Función para obtener el contador de visitas
function getVisitas() {
    // Obtiene el valor del contador de `localStorage`, o 0 si no existe
    return parseInt(localStorage.getItem('visitas') || '0');
}

// Función para incrementar y actualizar el contador de visitas
function incrementarVisitas() {
    // Obtiene el contador actual y lo incrementa
    let visitas = getVisitas();
    visitas++;

    // Actualiza el contador en `localStorage`
    localStorage.setItem('visitas', visitas.toString());

    // Actualiza el texto en la página
    document.getElementById('contador').textContent = `Esta página ha sido visitada ${visitas} veces.`;
}

// Incrementa y muestra el contador cuando se carga la página
document.addEventListener('DOMContentLoaded', incrementarVisitas);
