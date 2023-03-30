function checkMailAndPass(){
    console.log("foo");
    if((document.getElementById('mail').value === document.getElementById('mail-conf').value) && (document.getElementById('password').value === document.getElementById('passwordConf').value) && pwdStrength() === true){
        document.getElementById('submit').disabled = false;

        document.getElementById('mail').classList.remove('form__input--error');
        document.getElementById('mail-conf').classList.remove('form__input--error');
        document.getElementById('mail-error').classList.add('hidden');

        document.getElementById('password').classList.remove('form__input--error');
        document.getElementById('passwordConf').classList.remove('form__input--error');
        document.getElementById('pass-error').classList.add('hidden');
    } else {
        document.getElementById('submit').disabled = true;
        
        if(document.getElementById('mail').value != document.getElementById('mail-conf').value){
            document.getElementById('mail').classList.add('form__input--error');
            document.getElementById('mail-conf').classList.add('form__input--error');
            document.getElementById('mail-error').classList.remove('hidden');
        } else {
            document.getElementById('mail').classList.remove('form__input--error');
            document.getElementById('mail-conf').classList.remove('form__input--error');
            document.getElementById('mail-error').classList.add('hidden');
        }

        if(document.getElementById('password').value != document.getElementById('passwordConf').value){
            document.getElementById('password').classList.add('form__input--error');
            document.getElementById('passwordConf').classList.add('form__input--error');
            document.getElementById('pass-error').classList.remove('hidden');
        } else {
            document.getElementById('password').classList.remove('form__input--error');
            document.getElementById('passwordConf').classList.remove('form__input--error');
            document.getElementById('pass-error').classList.add('hidden');
        }
    }
}

function pwdStrength(){
    let pwd = document.getElementById('password').value;
    let characters = pwd.match(/./g);
    let maj = pwd.match(/[A-Z]/g);
    let num = pwd.match(/[0-9]/g);
    console.log(characters, maj, num);

    try {
        if(characters.length >= 10){
            document.getElementById('char').classList.replace('form__message--error', 'form__message--success');
        } else {
            document.getElementById('char').classList.replace('form__message--success', 'form__message--error');
        }
    } catch (error) {
        document.getElementById('char').classList.replace('form__message--success', 'form__message--error');
    }
    
    try {
        if(maj.length >= 1){
            document.getElementById('maj').classList.replace('form__message--error', 'form__message--success');
        } else {
            document.getElementById('maj').classList.replace('form__message--success', 'form__message--error');
        }
    } catch (error) {
        document.getElementById('maj').classList.replace('form__message--success', 'form__message--error');
    }

    try{
        if(num.length >= 2){
            document.getElementById('num').classList.replace('form__message--error', 'form__message--success');
        } else {
            document.getElementById('num').classList.replace('form__message--success', 'form__message--error');
        }
    } catch(error){
        document.getElementById('num').classList.replace('form__message--success', 'form__message--error');
    }

    if(characters.length >= 10 && maj.length >= 1 && num.length >= 2){
        return true;
    } else {
        return false;
    }
}

function onKeyUp(){
    checkMailAndPass();
    pwdStrength();
}