<?php
require "model.php";
require "phpmailer/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['mail'])){
    $selector=bin2hex(random_bytes(8));
    $token=random_bytes(32);
    $url="http://localhost/controller.php?page=pwdreinit&selector=".$selector."&validator=".bin2hex($token); 
    $expires=date("U")+1800; // 30 minutes
    deleteFromReinitMdp($_POST['mail']); // supprimer les anciens tokens pour le même mail
    insertIntoReinitMdp($_POST['mail'], $selector, $token, $expires); // insérer le nouveau token

    $to=$_POST['mail'];
    $subject="Réinitialisation de votre mot de passe";
} else {
    header("Location: controller.php?page=pwdforgot");
}