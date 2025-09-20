<?php
// 1) Cargar la conexión
require_once __DIR__ . '/../config/db.php';  // ajusta la ruta si hace falta

// 2) Solo aceptamos POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index-off.html');
    exit;
}

// 3) Recoger los datos y limpiar espacios al principio/final mediante trim
$nombre   = trim($_POST['nombre']   ?? '');  //toma el nombre o '' si no viene
$correo   = trim($_POST['email']    ?? '');  //toma el email o '' si no viene
$telefono = trim($_POST['telefono'] ?? '');
$mensaje  = trim($_POST['mensaje']  ?? '');
$horario  = trim($_POST['horario']  ?? '');

/*Las dos interrogaciones (??) forman el operador null coalescing, y su papel es:
“Usa el valor de $_POST['email'] si existe y no es null; en caso contrario, usa la cadena vacía ('').” */

/*Osea es equivalente a escribir esto:
if (isset($_POST['email'])) {
    $correo = $_POST['email'];
} else {
    $correo = '';
}  */

//inicializamos array para errores
$errores=[];

//Validaciones sencillas
if (strlen($nombre) < 2) {
    $errores[] = "El nombre debe tener al menos 2 caracteres";
}
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo no es válido";
}
if (!preg_match('/^[\d\s\-\+]{7,15}$/', $telefono)) {
    $errores[] = "El teléfono no es válido";
}
if (empty($mensaje)) {
    $errores[] = "El mensaje no puede estar vacío";
}
if (!empty($horario) && strlen($horario) > 5) {
    $errores[] = "Indica un horario más descriptivo";
}

//Mostrar errores si hay
if (!empty($errores)) {
    echo "<h3>❌ Se han encontrado errores en el formulario:</h3><ul>";
    foreach ($errores as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul><p><a href='../index-off.php'>Volver al formulario</a></p>";
    exit;
}

// 4) Guardar en la base de datos
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
    echo "<p><a href='../index-off.php'>Volver al formulario</a></p>";
} else {
    echo '<p>❌ Error al enviar el mensaje.</p>';
    echo "<p><a href='../index-off.php'>Volver al formulario</a></p>";
}

$stmt->close();
$conn->close();
