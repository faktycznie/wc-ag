document.addEventListener('DOMContentLoaded', () => {
  const forms = document.querySelectorAll('.needs-validation');
  if (forms) {
    Array.prototype.slice.call(forms).forEach((form) => {
      form.addEventListener(
        'submit',
        (event) => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add('was-validated');
        },
        false,
      );
    });

    const togglePassword = document.querySelector('#loginPageShowPassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
      // eslint-disable-next-line func-names
      togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.innerHTML = type === 'password' ? 'Pokaż' : 'Schowaj';
      });
    }
  }
});
