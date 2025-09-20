<?php
// Incluir una sola vez el archivo de conexión a la base de datos
include_once __DIR__ . '/../config/db.php';

// Consulta SQL para obtener elos campos de la tabla
$sql = "select nombre, duracion, precio, descripcion from cursos where id = 3";


// Ejecutar la consulta y guardar el resultado
$result = $conn->query($sql);

// Verificar si la consulta devolvió al menos una fila
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = htmlspecialchars($row["nombre"]);
    $duracion = htmlspecialchars($row["duracion"]);
    $precio = htmlspecialchars($row["precio"]);
    $descripcion = htmlspecialchars($row["descripcion"]);
    $tplId = "tpl-detalle-js";
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
    <template id="tpl-detalle-js">
      <div class="modal__grid two">
        <div>
          <h4>Temario (resumen)</h4>
          <ul>
            <li>JS moderno: let/const, funciones, módulos, objetos y arrays.</li>
            <li>DOM y eventos: interacción, formularios, accesibilidad básica.</li>
            <li>Fetch API: consumo de APIs, manejo de errores y loaders.</li>
            <li>Asincronía: promesas, async/await, patrones comunes.</li>
            <li>Arquitectura front: componentes, estado ligero, organización.</li>
            <li>Herramientas: bundlers ligeros, ESLint/Prettier (nociones).</li>
          </ul>
          <h4>Requisitos</h4>
          <p>Conocer HTML y CSS básicos. Se parte desde fundamentos de JS y se avanza de forma práctica.</p>
        </div>
        <div>
          <h4>Metodología</h4>
          <ul>
            <li>Mini-proyectos semanales (todo-list, FAQ, galería, buscador).</li>
            <li>Buenas prácticas: separación de responsabilidades y eventos.</li>
            <li>Testing manual básico y depuración con DevTools.</li>
          </ul>
          <h4>Proyecto final</h4>
          <p>Aplicación SPA ligera (sin framework pesado) que consuma una API pública, con router simple, filtros y almacenamiento local.</p>
          <h4>Qué obtendrás</h4>
          <ul>
            <li>Repositorio con tu SPA y guía de despliegue estático.</li>
            <li>Checklist de calidad (rendimiento, accesibilidad básica, UX).</li>
            <li>Certificado de aprovechamiento (demo).</li>
          </ul>
        </div>
      </div>
    </template>
    <?php
}
?>