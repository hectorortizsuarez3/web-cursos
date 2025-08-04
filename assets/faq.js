//Esperar a que todo el html esté cargado antes de ejecutar el código js
document.addEventListener("DOMContentLoaded", function () {
    const preguntas = document.querySelectorAll('.faq-question'); //Busca todos los elementos del DOM que tengan la clase faq-question y los guarda en una lista llamada preguntas

  preguntas.forEach(pregunta => {   //Recorre uno por uno todos los botones encontrados anteriormente. La variable pregunta representa cada uno de ellos en cada vuelta del bucle.
    pregunta.addEventListener('click', () => {
      const respuesta = pregunta.nextElementSibling;
      if (respuesta.hasAttribute('hidden')) {
        respuesta.removeAttribute('hidden');
      } else {
        respuesta.setAttribute('hidden', '');
      }
    });
  });
});