// Modal genérico reutilizable
// - Crea un único modal y backdrop al cargar.
// - Abre por delegación con [data-modal-target] y llena el cuerpo desde un <template>.
// - Accesible: role="dialog", aria-modal, cierre por ESC / backdrop / botón.
(function () {
  // ----- Creación de nodos base -----
  const backdrop = document.createElement('div');
  backdrop.className = 'modal-backdrop';

  const modal = document.createElement('div');
  modal.className = 'modal';
  modal.setAttribute('role', 'dialog');     // A11y: anuncia diálogo
  modal.setAttribute('aria-modal', 'true'); // A11y: modal bloquea la página

  modal.innerHTML = `
    <div class="modal__dialog" role="document">
      <div class="modal__header">
        <h3 class="modal__title">Detalles del curso</h3>
        <button class="modal__close" aria-label="Cerrar">✕</button>
      </div>
      <div class="modal__body"></div>
    </div>
  `;

  // Montaje en DOM
  document.body.appendChild(backdrop);
  document.body.appendChild(modal);

  // Referencias internas
  const titleEl = modal.querySelector('.modal__title');
  const bodyEl  = modal.querySelector('.modal__body');
  const closeEl = modal.querySelector('.modal__close');

  // ----- Comportamiento: cerrar -----
  function closeModal() {
    modal.classList.remove('is-open');
    backdrop.classList.remove('is-open');
    bodyEl.innerHTML = '';                      // Evita “fantasmas” entre aperturas
    titleEl.textContent = 'Detalles del curso'; // Título por defecto
    // (Opcional mejora A11y: devolver foco al botón que abrió el modal)
  }

  // Cierre por botón, fondo y teclado (ESC)
  closeEl.addEventListener('click', closeModal);
  backdrop.addEventListener('click', closeModal);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  // ----- Apertura por delegación -----
  // Cualquier click en un elemento (o hijo) con [data-modal-target]
  // abrirá el modal con el contenido del <template> indicado.
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-modal-target]');
    if (!btn) return;

    const tplId = btn.getAttribute('data-modal-target');
    const title = btn.getAttribute('data-modal-title') || 'Detalles del curso';
    const tpl   = document.getElementById(tplId);
    if (!tpl) return;

    titleEl.textContent = title;
    bodyEl.innerHTML    = tpl.innerHTML;

    backdrop.classList.add('is-open');
    modal.classList.add('is-open');

    // (Opcional mejora A11y: mover foco al primer elemento interactivo del modal)
  });
})();

