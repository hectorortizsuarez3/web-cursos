<?php
// Incluir una sola vez el archivo de conexión a la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener elos campos de la tabla
$sql = "select nombre, duracion, precio, descripcion from cursos where id = 3";


// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Verificar si la consulta devolvió al menos una fila
if ($result && $result->num_rows > 0) {
    // Obtener la primera fila como un array asociativo
    $row = $result->fetch_assoc();

    // Mostrar el contenido con formato y protección básica
    echo '<h3>' . htmlspecialchars($row["nombre"]) . '</h3>';
    echo '<div class="contenido-curso">';
    echo '<b>Duración: </b>' . htmlspecialchars($row["duracion"]) . '<br>';
    echo '<b>Precio: </b>' . htmlspecialchars($row["precio"]) . '<br>';
    echo '<b>Descripción: </b>' . htmlspecialchars($row["descripcion"]) . '<br>';
    echo '</div>';
    echo '<br><br>';
}
?>