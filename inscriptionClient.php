<?php
require 'model.php';
$result = addClient($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mdp']);
switch ($result) {
    case 'already exists':
        header('Location: controller.php?page=inscription&status=existing');
        break;
    
    case 'error':
        header('Location: controller.php?page=inscription&status=error');
        break;
        
    default:
        require 'sendMailCreaCompte.php';
        header('Location: controller.php?page=mailcreacompte');
        break;
}
?>