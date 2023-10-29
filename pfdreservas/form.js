document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        const nombre = document.getElementById('nombre').value;
        const fecha = document.getElementById('fecha').value;
        const horaInicio = document.getElementById('hora_inicio').value;
        const horaFinalizacion = document.getElementById('hora_finalizacion').value;
        const sala = document.getElementById('sala').value;

        if (!nombre || !fecha || !horaInicio || !horaFinalizacion || sala === "0") {
            alert("Por favor, complete todos los campos.");
            return false;
        }

        // Puedes agregar más validaciones aquí según tus necesidades.

        return true;
    }
});
