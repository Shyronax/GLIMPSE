<?php
include('model.php');
var_dump($_SESSION);
if(isset($_SESSION['id'])){
    if(addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['price1'], $_SESSION['price2'], $_SESSION['price3'], $_SESSION['id']) == false){
        header('Location: controller.php?page=booking1&status=error');
    } else {
        header("Location: sendMailTicket.php?&id=".$_SESSION['id_ticket']);
    }
} else {
    if(addTicket($_SESSION['date'], $_SESSION['heure'], $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['price1'], $_SESSION['price2'], $_SESSION['price3']) == false){
        header('Location: controller.php?page=booking1&status=error');
    } else {
        header("Location: sendMailTicket.php?&id=".$_SESSION['id_ticket']);
    }
}
?>