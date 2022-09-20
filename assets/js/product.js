document.addEventListener('DOMContentLoaded', () => {
  const downloadBtn = document.querySelector('.product__downloads .btn');
  if (downloadBtn) {
    downloadBtn.addEventListener('click', (e) => {
      e.preventDefault();
      downloadBtn.classList.toggle('open');
    });
  }
});
