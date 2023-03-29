function checkMailAndPass(){
    console.log("foo");
    if((document.getElementById('mail').value === document.getElementById('mail-conf').value) && (document.getElementById('password').value === document.getElementById('passwordConf').value)){
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
        
        if(document.getElementById('mail').value != document.getElementById('mail-conf').value){
            document.getElementById('mail').classList.add('form__input--error');
            document.getElementById('mail-conf').classList.add('form__input--error');
        }
        if(document.getElementById('password').value != document.getElementById('passwordConf').value){
            document.getElementById('password').classList.add('form__input--error');
            document.getElementById('passwordConf').classList.add('form__input--error');
        }
    }
}