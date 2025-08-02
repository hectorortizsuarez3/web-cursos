<?php
// Incluir una sola vez el archivo de conexión a la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener el texto legal (solo el primero encontrado)
$sql = "SELECT texto FROM legal LIMIT 1";

// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Verificar si la consulta devolvió al menos una fila
if ($result && $result->num_rows > 0) {
    // Obtener la primera fila como un array asociativo
    $row = $result->fetch_assoc();

    // Generar el contenido HTML para mostrar el texto legal
    echo '<p>' . nl2br(htmlspecialchars($row["texto"])) . '</p>';
}
?>