<?php
include('model.php');
for($i=0; $i < $_SESSION['price1']; $i++){
    if(addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['mail'], 'plein') == false){
        header('Location: controller?page=booking1&status=error');
    }
}
for($i=0; $i < $_SESSION['price2']; $i++){
    if(addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['mail'], 'reduit') == false){
        header('Location: controller?page=booking1&status=error');
    }
}
for($i=0; $i < $_SESSION['price3']; $i++){
    if(addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['mail'], 'gratuit') == false){
        header('Location: controller?page=booking1&status=error');
    }
}

?>