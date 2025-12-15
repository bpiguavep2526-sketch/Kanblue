let form =  document.querySelector('form');

form.addEventListener('submit', checkForm);

/**
 * Valida el formulario de registro antes de enviarlo.
 * Muestra un mensaje de error si:
 * - El nombre de usuario ya existe.
 * - El correo electrónico ya está registrado.
 * - Las contraseñas no coinciden.
 * 
 * @param {Event} event - Evento de envío del formulario.
 */
function checkForm(event) {
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('passwordconfirm').value;
    let error = document.querySelector('.alert-danger');
    error.innerHTML = '';
    error.style.visibility = 'hidden';
    error.style.display = 'none';

    users.forEach(user => {
        if (user.username.toLowerCase() === username.toLowerCase()) {
            event.preventDefault();
            error.append('El nombre de usuario ya existe. Por favor, elige otro.');
            error.style.visibility = 'visible';
            error.style.display = 'block';
        } else if (user.email.toLowerCase() === email.toLowerCase()) {
            event.preventDefault();
            error.append('El correo electrónico ya está registrado. Por favor, utiliza otro.');
            error.style.visibility = 'visible';
            error.style.display = 'block';
        } else if (password.toLowerCase() !== confirmPassword.toLowerCase()) {
            event.preventDefault();
            error.append('Las contraseñas no coinciden. Por favor, verifica e intenta de nuevo.');
            error.style.visibility = 'visible';
            error.style.display = 'block';
        }
    });
}