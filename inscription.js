function checkMailAndPass(){
    console.log("foo");
    if((document.getElementById('mail').value === document.getElementById('mail-conf').value) && (document.getElementById('password').value === document.getElementById('passwordConf').value)){
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