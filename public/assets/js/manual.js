(function () {
  const progress = document.querySelector('#progressBar');
  const content = document.querySelector('#manual-content');
  const menu = document.querySelector('[data-mobile-menu]');

  function updateProgress() {
    if (!progress) return;
    const max = document.documentElement.scrollHeight - window.innerHeight;
    progress.style.width = max > 0 ? `${Math.min(100, (window.scrollY / max) * 100)}%` : '0%';
  }

  document.querySelector('[data-view-toggle]')?.addEventListener('click', (event) => {
    content.classList.toggle('presentation');
    content.classList.toggle('continuous');
    event.currentTarget.textContent = content.classList.contains('presentation') ? 'Leitura contínua' : 'Modo apresentação';
  });

  document.querySelector('[data-fullscreen]')?.addEventListener('click', async () => {
    if (!document.fullscreenElement) {
      await document.documentElement.requestFullscreen().catch(() => {});
      return;
    }
    await document.exitFullscreen().catch(() => {});
  });

  const menuOpenButton = document.querySelector('[data-menu-open]');
  const menuCloseButton = document.querySelector('[data-menu-close]');

  function closeMenu() {
    if (!menu) return;
    menu.hidden = true;
    document.body.style.overflow = '';
    menuOpenButton?.setAttribute('aria-expanded', 'false');
  }

  menuOpenButton?.addEventListener('click', () => {
    menu.hidden = false;
    document.body.style.overflow = 'hidden';
    menuOpenButton.setAttribute('aria-expanded', 'true');
    menuCloseButton?.focus();
  });

  menuCloseButton?.addEventListener('click', closeMenu);
  menu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && menu && !menu.hidden) {
      closeMenu();
      menuOpenButton?.focus();
    }
  });

  document.querySelectorAll('[data-copy]').forEach((button) => {
    button.addEventListener('click', async () => {
      await navigator.clipboard.writeText(button.dataset.copy);
      const original = button.textContent;
      button.textContent = 'Copiado';
      window.setTimeout(() => { button.textContent = original; }, 1400);
    });
  });

  document.querySelector('[data-download-assets]')?.addEventListener('click', () => {
    ['/assets/logos/metal-life-primary.svg', '/assets/logos/metal-life-white.svg', '/assets/logos/metal-life-monochrome.svg', '/assets/logos/metal-life-symbol.svg'].forEach((url) => {
      const link = document.createElement('a');
      link.href = url;
      link.download = url.split('/').pop();
      document.body.appendChild(link);
      link.click();
      link.remove();
    });
  });

  updateProgress();
  window.addEventListener('scroll', updateProgress, { passive: true });
  window.addEventListener('resize', updateProgress);
})();
