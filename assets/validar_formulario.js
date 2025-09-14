document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contactForm');

  const rules = [
    {
      id: 'nombre',
      errorId: 'error-nombre',
      test: v => v.length >= 2,
      msg: 'El nombre no puede estar vacío'
    },
    {
      id: 'email',
      errorId: 'error-email',
      test: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v),
      msg: 'Introduce un correo válido'
    },
    {
      id: 'telefono',
      errorId: 'error-telefono',
      test: v => /^[\d\s\-\+]{7,15}$/.test(v),
      msg: 'Teléfono no válido'
    },
    {
      id: 'mensaje',
      errorId: 'error-mensaje',
      test: v => v.length > 0,
      msg: 'El mensaje no puede estar vacío'
    },
    {
      id: 'horario',
      errorId: 'error-horario',
      test: v => !v || v.length >= 5,  // opcional pero, si hay texto, mínimo 5 chars
      msg: 'Indica un horario más descriptivo'
    }
  ];

  form.addEventListener('submit', e => {
    // Limpiar mensajes previos
    form.querySelectorAll('.error').forEach(el => el.textContent = '');

    let valid = true;
    // Validar cada campo según su regla
    rules.forEach(({ id, errorId, test, msg }) => {
      const value = document.getElementById(id).value.trim();
      if (!test(value)) {
        document.getElementById(errorId).textContent = msg;
        valid = false;
      }
    });

    if (!valid) e.preventDefault(); // si hay algún fallo, bloquea el envío
  });
});