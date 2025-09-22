// Modal genérico reutilizable
(function () {
  // Crear nodos base
  const backdrop = document.createElement('div');
  backdrop.className = 'modal-backdrop';

  const modal = document.createElement('div');
  modal.className = 'modal';
  modal.setAttribute('role', 'dialog');
  modal.setAttribute('aria-modal', 'true');

  modal.innerHTML = `
    <div class="modal__dialog" role="document">
      <div class="modal__header">
        <h3 class="modal__title">Detalles del curso</h3>
        <button class="modal__close" aria-label="Cerrar">✕</button>
      </div>
      <div class="modal__body"></div>
    </div>
  `;

  // Montar en DOM
  document.body.appendChild(backdrop);
  document.body.appendChild(modal);

  // Referencias
  const titleEl = modal.querySelector('.modal__title');
  const bodyEl  = modal.querySelector('.modal__body');
  const closeEl = modal.querySelector('.modal__close');

  // Cierre
  function closeModal() {
    modal.classList.remove('is-open');
    backdrop.classList.remove('is-open');
    bodyEl.innerHTML = '';
    titleEl.textContent = 'Detalles del curso';
    document.body.classList.remove('no-scroll');
  }

  // Eventos de cierre
  closeEl.addEventListener('click', closeModal);
  modal.addEventListener('click', (e) => {
    if (!e.target.closest('.modal__dialog')) closeModal();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  // Apertura delegada
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
    document.body.classList.add('no-scroll');
  });
})();


