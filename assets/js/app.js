document.querySelectorAll('[data-confirm]').forEach((form) => form.addEventListener('submit', (event) => {
  const button = form.querySelector('button[type="submit"]');
  if (button && button.dataset.busy === '1') event.preventDefault();
  if (button) { button.dataset.busy = '1'; button.textContent = 'Menyimpan...'; }
}));
