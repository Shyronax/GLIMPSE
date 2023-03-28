<?php
include('model.php');
if(addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['price1'], $_SESSION['price2'], $_SESSION['price3']) == false){
    header('Location: controller.php?page=booking1&status=error');
} else {
    header('Location: controller.php?page=booking5');
}

?>