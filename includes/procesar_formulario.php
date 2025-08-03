<?php
// 1) Cargar la conexión
require_once __DIR__ . '/../config/db.php';  // ajusta la ruta si hace falta

// 2) Solo aceptamos POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.html');
    exit;
}

// 3) Recoger los datos tal cual vienen
$nombre   = $_POST['nombre']   ?? '';
$correo   = $_POST['email']    ?? '';  // tu <input name="email">
$telefono = $_POST['telefono'] ?? '';
$mensaje  = $_POST['mensaje']  ?? '';
$horario  = $_POST['horario']  ?? '';

// 4) Insertar en mensajes_recibidos
$stmt = $conn->prepare(
    "INSERT INTO mensajes_recibidos
       (nombre, correo, telefono, mensaje, horario_contacto)
     VALUES (?, ?, ?, ?, ?)"
);

// bind_param: cinco strings ("sssss")
$stmt->bind_param("sssss",
    $nombre,
    $correo,
    $telefono,
    $mensaje,
    $horario
);

// 5) Ejecutar y notificar
if ($stmt->execute()) {
    echo '<p>✅ Mensaje enviado correctamente.</p>';
} else {
    echo '<p>❌ Error al enviar el mensaje.</p>';
}

$stmt->close();
$conn->close();
