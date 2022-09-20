document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.sidebar.sidebar--desktop');
  if (sidebar) {
    const close = document.querySelector('.sidebar .mobile-filters-close');
    if (close) {
      close.addEventListener('click', (e) => {
        e.preventDefault();
        sidebar.classList.toggle('open');
      });
    }

    document.body.addEventListener('click', (event) => {
      if (event.target.classList.contains('mobile-filters-open')) {
        event.preventDefault();
        sidebar.classList.toggle('open');
      }

      if (event.target.classList.contains('bapf_update')) {
        sidebar.classList.toggle('open');
      }

      if (event.target.classList.contains('bapf_reset')) {
        sidebar.classList.toggle('open');
      }
    });

    document.body.addEventListener('change', (event) => {
      if (event.target.tagName === 'SELECT' && event.target.closest('.sidebar--mobile .bapf_sfilter')) {
        const apply = document.querySelector('.sidebar .bapf_update');
        apply.click();
        sidebar.classList.remove('open');
      }
    });
  }
});
