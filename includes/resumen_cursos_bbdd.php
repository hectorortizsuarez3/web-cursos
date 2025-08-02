<?php
// Conectar con la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener los cursos
$sql = "SELECT nombre, fecha_comienzo, limite_matriculacion, fecha_fin FROM cursos";

//ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Comprobar si hay resultados
if ($result && $result->num_rows > 0) {
    echo '<table>';
    echo '<tr>
            <th>Curso</th>
            <th>Comienzo del curso</th>
            <th>Límite de matriculación</th>
            <th>Fecha fin</th>
          </tr>';

    // Recorrer los resultados y mostrarlos
    while ($fila = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($fila['nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['fecha_comienzo']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['limite_matriculacion']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['fecha_fin']) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "<p>No hay cursos disponibles en este momento.</p>";
}
?>
