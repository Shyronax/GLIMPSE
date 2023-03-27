<?php
include('model.php');
for($i=0; $i < $_SESSION['price1']; $i++){
    addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['mail'], 'plein');
}
for($i=0; $i < $_SESSION['price2']; $i++){
    addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['mail'], 'reduit');
}
for($i=0; $i < $_SESSION['price3']; $i++){
    addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['mail'], 'gratuit');
}
header("Location: controller.php?page=booking5");
?>