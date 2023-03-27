// fonction pour afficher/cacher le mot de passe
const icon = document.querySelector('#eyeIcon');
const password = document.querySelector('#password');

icon.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

// fonction pour afficher/cacher le mot de passe
const iconConf = document.querySelector('#eyeIconConf');
const passwordConf = document.querySelector('#passwordConf');

iconConf.addEventListener('click', function () {
    const type = passwordConf.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConf.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

