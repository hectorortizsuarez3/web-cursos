<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" 
  content="Plataforma con cursos de desarrollo web: HTML, CSS, JavaScript y Bases de Datos. Aprende desde cero">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--Para que se vea bien en dispositivos movil-->
  <title>Web de Cursos</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <h1>Bienvenido a nuestra plataforma de cursos</h1>

  <h2>Cursos disponibles</h2>
</br>
<div class="contenedor-cursos">
  <div class="curso">
  <p>
      <?php
        include 'includes/curso_html.php';
      ?>
  </p>
</div>
<div class="curso">
  <p>
      <?php
        include 'includes/curso_bbdd.php';
      ?>
  </p>
</div>
<div class="curso">
  <p>
      <?php
        include 'includes/curso_js.php';
      ?>
  </p>
</div>
</div>
<br>
<p><h2>Resumen de los cursos:</h2>
<?php
        include 'includes/resumen_cursos_bbdd.php';
      ?>
</p>
<br>

<!--Sección de preguntas frecuentes-->
<h2>Preguntas frecuentes</h2>
  <div class="legal">
    <?php
      include 'includes/faq.php';
    ?>
  </div>
<br>

<!--Sección contacto-->
<h2>Contacto</h2>
<div class="contacto">
<?php
  include 'includes/b_contacto.php';
  ?>
  </div>
<br>
<h2>Aviso Legal</h2>
<div class="legal">
<?php
  include 'includes/legal.php';
  ?>
</div>
</body>
</html>
