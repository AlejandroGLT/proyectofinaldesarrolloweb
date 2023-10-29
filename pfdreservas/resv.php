<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $horaInicio = $_POST["hora_inicio"];
    $horaFinalizacion = $_POST["hora_finalizacion"];
    $sala = $_POST["sala"];

    // Conexión a la base de datos (cambia los valores según tu configuración)
    $conexion = new mysqli("localhost", "root", "", "eventos", 3307);
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener el user_id del usuario (puedes implementar un sistema de autenticación)
    $user_id = 1; // Reemplaza con la lógica de autenticación

    // Insertar la reserva en la base de datos
    $insertarReserva = "INSERT INTO Reservas (user_id, sala_id, fecha, hora_de_inicio, hora_de_finalizacion) 
                        VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($insertarReserva);
    $stmt->bind_param("sssss", $user_id, $sala, $fecha, $horaInicio, $horaFinalizacion);

    $redirect = false;
    if ($stmt->execute()) {
        echo "<script>alert('Reserva realizada con éxito.');</script>";
        $redirect = true;
    } else {
        echo "Error al realizar la reserva: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();

    if($redirect == true){
        header("Location: index.html");
    }


}
?>
