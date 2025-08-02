<?php
// Incluir una sola vez el archivo de conexión a la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener elos campos de la tabla
$sql = "select texto, telefono, texto2, email from contacto limit 1";


// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Verificar si la consulta devolvió al menos una fila
if ($result && $result->num_rows > 0) {
    // Obtener la primera fila como un array asociativo
    $row = $result->fetch_assoc();

    // Mostrar el contenido con formato y protección básica
    echo '<p>';
    echo htmlspecialchars($row["texto"]);
    echo '<b>' . htmlspecialchars($row["telefono"]) . '</b><br>';
    echo htmlspecialchars($row["texto2"]) . '<br>';
    echo '<b>' . htmlspecialchars($row["email"]) . '</b>';
    echo '</p>';
    
}
?>