<?php
// Incluir una sola vez el archivo de conexión a la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener elos campos de la tabla
$sql = "select nombre, duracion, precio, descripcion from cursos where id = 2";


// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Verificar si la consulta devolvió al menos una fila
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = htmlspecialchars($row["nombre"]);
    $duracion = htmlspecialchars($row["duracion"]);
    $precio = htmlspecialchars($row["precio"]);
    $descripcion = htmlspecialchars($row["descripcion"]);
    $tplId = "tpl-detalle-bbdd";
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

    ?>
    <template id="tpl-detalle-bbdd">
      <div class="modal__grid two">
        <div>
          <h4>Temario (resumen)</h4>
          <ul>
            <li>Modelo relacional: entidades, relaciones, claves y normalización (1FN–3FN).</li>
            <li>SQL esencial: SELECT, JOIN, GROUP BY, subconsultas.</li>
            <li>SQL avanzado: CTE, ventanas (OVER), pivot/unpivot (si aplica).</li>
            <li>PL/SQL / Procedural SQL: funciones, procedimientos, paquetes, cursores.</li>
            <li>Integridad y transacciones: ACID, índices, vistas, triggers.</li>
            <li>Diseño y performance: EXPLAIN PLAN, índices compuestos, particionado (nociones).</li>
          </ul>
          <h4>Requisitos</h4>
          <p>Conocimientos básicos de informática. No se requiere programación previa.</p>
        </div>
        <div>
          <h4>Metodología</h4>
          <ul>
            <li>Laboratorios con un servidor local (XAMPP/MAMP o contenedor).</li>
            <li>Dataset realista para practicar consultas de negocio.</li>
            <li>Rúbrica de buenas prácticas y revision de esquemas.</li>
          </ul>
          <h4>Proyecto final</h4>
          <p>Diseño completo de una base de datos para un caso real (p.ej., reservas de un restaurante) con diagrama ER, script de creación, carga de datos y un set de 15 consultas clave.</p>
          <h4>Qué obtendrás</h4>
          <ul>
            <li>Script SQL listo para producción educativa.</li>
            <li>Documento de diseño (ERD) y memoria técnica.</li>
            <li>Certificado de aprovechamiento (demo).</li>
          </ul>
        </div>
      </div>
    </template>
    <?php
}
?>