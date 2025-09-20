<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" 
  content="Plataforma con cursos de desarrollo web: HTML, CSS, JavaScript y Bases de Datos. Aprende desde cero">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--Para que se vea bien en dispositivos movil-->
  <title>Web de Cursos</title>
  <link rel="stylesheet" href="css/nuevos-estilos.css?v=1">
</head>
<body>
  <header class="hero container mb-8">
    <h1>Bienvenido a nuestra plataforma de cursos</h1>
    <p class="mt-2">Aprende desarrollo web con cursos prácticos y orientados a proyectos.</p>
  </header>

  <section class="container">
  <h2 class="mb-4">Cursos disponibles</h2>

  <div class="contenedor-cursos">
    <div class="curso">
      <?php
        include 'includes/curso_html.php';
      ?>
  </div>

  <div class="curso">
      <?php
        include 'includes/curso_bbdd.php';
      ?>
  </div>

  <div class="curso">
      <?php
        include 'includes/curso_js.php';
      ?>
  </div>
</div>
</section>

<!--Tabla-resumen de los cursos-->
<section class="container mt-8">
  <h2 class="mb-4">Fechas de los cursos:</h2>
    <?php
        include 'includes/fechas_cursos.php';
    ?>
    </section>

<!--Sección de preguntas frecuentes-->
<section class="container mt-8">
  <h2 class="mb-4">Preguntas frecuentes</h2>
  <div class="faq">
      <?php
        include 'includes/faq.php';
      ?>
  </div>
</section>

<!--Formulario de contacto-->
<section class="container mt-8">
    <h2 class="mb-4">Formulario de contacto</h2>
    <div class="formulario">
    <?php include 'includes/formulario_contacto.php'; ?>
  </div>
  </section>

<!-- LEGAL -->
  <section class="container">
    <h2 class="mb-4">Aviso Legal</h2>
    <div class="legal">
      <?php include 'includes/legal.php'; ?>
    </div>
  </section>

<script 
  src="assets/faq.js">
</script>

<script 
  src="assets/validar_formulario.js" defer>
</script>

<script 
  src="assets/modal.js">
</script>

</body>
</html>
