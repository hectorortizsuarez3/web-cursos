<?php
// Incluir una sola vez el archivo de conexión a la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener el texto legal (solo el primero encontrado)
$sql = "SELECT texto FROM legal LIMIT 1";

// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Verificar si la consulta devolvió al menos una fila
if ($result && $result->num_rows > 0) {
     $texto = trim($result->fetch_assoc()['texto']);

    // Dividir el texto por saltos de línea
    $parrafos = preg_split('/\r\n|\r|\n/', $texto);

    foreach ($parrafos as $p) {
        $p = trim($p);
        if ($p !== '') {
            echo '<p>' . htmlspecialchars($p) . '</p>';
        }
    }
}
?>