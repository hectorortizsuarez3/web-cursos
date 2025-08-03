<form action ="includes/procesar_formulario.php" method="post">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="tel" name="telefono" placeholder="Telefono" required>
    <textarea name="mensaje" placeholder="Mensaje" required></textarea>
    <textarea name="horario" placeholder="Horario en que podemos contactarle"></textarea>
    <input type="submit" value="Enviar">
</form>