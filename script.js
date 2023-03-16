// fonction pour afficher/cacher le mot de passe
const icon = document.querySelector('#eyeIcon');
const password = document.querySelector('#password');

eyeIcon.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});