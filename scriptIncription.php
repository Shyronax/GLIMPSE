<?php
include 'start.php';
include 'model.php';
addUser($_GET['pseudo'], $_GET['mdp'], $_GET['email'], $_GET['nom'], $_GET['prenom']);
?>
