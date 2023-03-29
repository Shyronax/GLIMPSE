let etape = 1;
document.querySelector('.form__container').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
document.querySelector('.form__container-date').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
document.querySelector('.form__container-ticket').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";

document.querySelector('.btn--retour').addEventListener('click', () => {
    if(etape > 1){
        etape --;
        document.querySelector('.form__container').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
        document.querySelector('.form__container-date').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
        document.querySelector('.form__container-ticket').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
    }
});

document.querySelector('.btn--confirmer').addEventListener('click', () => {
    if(etape < 3){
        etape ++;
        document.querySelector('.form__container').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
        document.querySelector('.form__container-date').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
        document.querySelector('.form__container-ticket').style.transform = "translate("+ (200 - etape * 100) +"%, 0)";
    } else if(document.getElementById('mail').value === document.getElementById('conf-mail').value){
        document.querySelector('form').submit();
    } else {
        document.getElementById('mail').classList.add('form__input--error');
        document.getElementById('mail-conf').classList.add('form__input--error');
    }
});