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
    } else {
        document.querySelector('form').submit();
    }
});