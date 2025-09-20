<?php
// Incluir una sola vez el archivo de conexión a la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener elos campos de la tabla
$sql = "select nombre, duracion, precio, descripcion from cursos where id = 1";


// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Verificar si la consulta devolvió al menos una fila
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = htmlspecialchars($row["nombre"]);
    $duracion = htmlspecialchars($row["duracion"]);
    $precio = htmlspecialchars($row["precio"]);
    $descripcion = htmlspecialchars($row["descripcion"]);
    $tplId = "tpl-detalle-html";
    echo '<div class="curso">';
    echo "<h3>$nombre</h3>";
    echo '<div class="contenido-curso">';
    echo "<b>Duración: </b>$duracion<br>";
    echo "<b>Precio: </b>$precio<br>";
    echo "<b>Descripción: </b>$descripcion<br>";
    echo '</div>';
    echo '<div class="mt-4">';
    echo "<button class='btn sm' data-modal-target='$tplId' data-modal-title='Temario y detalles — $nombre'>Más info</button> ";
    echo "<button class='btn sm primary' onclick=\"alert('Demo: aquí iría el proceso de inscripción/pago')\">Inscribirse</button>";
    echo '</div>';
    echo '</div>';

    // Template oculto con el detalle
    ?>
    <template id="tpl-detalle-html">
      <div class="modal__grid two">
        <div>
          <h4>Temario (resumen)</h4>
          <ul>
            <li>Fundamentos de HTML: estructura, semántica y accesibilidad.</li>
            <li>CSS moderno: selectores, herencia, cascada, especificidad.</li>
            <li>Layout: Flexbox, Grid, responsive design con <code>clamp()</code>.</li>
            <li>Componentes UI: tarjetas, modales, tablas, formularios accesibles.</li>
            <li>Buenas prácticas: BEM, variables CSS, performance y organización.</li>
            <li>Mini-proyecto 1: landing responsive.</li>
          </ul>
          <h4>Requisitos</h4>
          <p>Ninguno. Se empieza desde cero. Recomendable saber manejar un editor de código.</p>
        </div>
        <div>
          <h4>Metodología</h4>
          <ul>
            <li>50% práctica con retos guiados y feedback.</li>
            <li>Repositorio base con starter kits y snippets.</li>
            <li>Correcciones sobre estándares de accesibilidad (WAI-ARIA).</li>
          </ul>
          <h4>Proyecto final</h4>
          <p>Construcción de una web responsive completa (home, listado, ficha y formulario) con estilos limpios y buenas prácticas.</p>
          <h4>Qué obtendrás</h4>
          <ul>
            <li>Repositorio público con tu proyecto.</li>
            <li>Checklist de revisión (accesibilidad, responsive, performance básica).</li>
            <li>Certificado de aprovechamiento (demo).</li>
          </ul>
        </div>
      </div>
    </template>
    <?php
}
?>