<?php
include('model.php');
addClient($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp']);
?>