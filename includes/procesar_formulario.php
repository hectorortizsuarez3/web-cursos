<?php
// 1) Cargar la conexión
require_once __DIR__ . '/../config/db.php';  // ajusta la ruta si hace falta

// 2) Solo aceptamos POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index-off.html');
    exit;
}

// 3) Recoger los datos tal cual vienen
$nombre   = $_POST['nombre']   ?? '';  //toma el nombre o '' si no viene
$correo   = $_POST['email']    ?? '';  //toma el email o '' si no viene
$telefono = $_POST['telefono'] ?? '';
$mensaje  = $_POST['mensaje']  ?? '';
$horario  = $_POST['horario']  ?? '';

/*Las dos interrogaciones (??) forman el operador null coalescing, y su papel es:
“Usa el valor de $_POST['email'] si existe y no es null; en caso contrario, usa la cadena vacía ('').” */

/*Osea es equivalente a escribir esto:
if (isset($_POST['email'])) {
    $correo = $_POST['email'];
} else {
    $correo = '';
}  */

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
