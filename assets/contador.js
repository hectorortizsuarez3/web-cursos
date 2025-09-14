function addCharCounter(textareaId, counterId, maxChars = 500) {
    const textarea = document.getElementById(textareaId);
    const counter = document.getElementById(counterId);

    if (!textarea || !counter) return;

    const updateCounter = () => {
      const length = textarea.value.length;
      counter.textContent = `${length} / ${maxChars}`;
      
      // opcional: poner rojo si quedan menos de 50
      if (maxChars - length <= 50) {
        counter.style.color = "red";
      } else {
        counter.style.color = "";
      }
    };

    textarea.addEventListener("input", updateCounter);
    updateCounter(); // inicializa al cargar
  }

  addCharCounter("mensaje", "contador-mensaje");
  addCharCounter("horario", "contador-horario");
