<?php
// Conectar con la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener los cursos
$sql = "SELECT nombre, fecha_comienzo, limite_matriculacion, fecha_fin FROM cursos";

// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Pintar la tabla con la clase que activa los estilos CSS
if ($result && $result->num_rows > 0) {
    echo '<table class="tabla-cursos">';
    echo '  <thead>';
    echo '    <tr>';
    echo '      <th>Curso</th>';
    echo '      <th>Comienzo</th>';
    echo '      <th>Límite de matriculación</th>';
    echo '      <th>Fin</th>';
    echo '    </tr>';
    echo '  </thead>';

    echo '  <tbody>';
    while ($fila = $result->fetch_assoc()) {
        echo '    <tr>';
        echo '      <td>' . htmlspecialchars($fila['nombre']) . '</td>';
        echo '      <td>' . htmlspecialchars($fila['fecha_comienzo']) . '</td>';
        echo '      <td>' . htmlspecialchars($fila['limite_matriculacion']) . '</td>';
        echo '      <td>' . htmlspecialchars($fila['fecha_fin']) . '</td>';
        echo '    </tr>';
    }
    echo '  </tbody>';
    echo '</table>';
} else {
    echo '<p>No hay cursos disponibles en este momento.</p>';
}
?>

