<form id="contactForm" action ="includes/procesar_formulario.php" method="post" novalidate>  <!--novalidate sirve para desactivar los mensajes por defecto del navegador-->
    <div class="field">
        <input id="nombre" type="text" name="nombre" placeholder="Nombre" required>
        <small class="error" id="error-nombre"></small>  <!--Creo contenedores para escribir el mensaje de error-->
    </div>

    <div class="field">
        <input id="email" type="email" name="email" placeholder="Correo" required>
        <small class="error" id="error-email"></small>
    </div>

    <div class = "field">
        <input id="telefono" type="tel" name="telefono" placeholder="Telefono" required>
        <small class="error" id="error-telefono"></small>
    </div>

    <div class= "field">
        <textarea id="mensaje" name="mensaje" placeholder="Mensaje" required></textarea>
        <small class="error" id="error-mensaje"></small>
    </div>

     <div class="field">
        <textarea id="horario" name="horario" placeholder="Horario en que podemos contactarle"></textarea>
        <small class="error" id="error-horario"></small>
    </div>
    <div class="campo">
        <input type="submit" class="boton boton-principal" value="Enviar">
    </div>
</form>