<?php
require_once "model.php";
require "phpmailer/vendor/autoload.php";

// librairie PHPMailer pour gérer l'envoi de mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['mail'])){

    $toEmail=$_POST['mail'];
    $url="https://millecultureuneorigine.but-mmi-champs.fr/controller.php?page=accountconf"; 

    // Config du mail à envoyer
    $mail = new PHPMailer(true);
    $mail->CharSet="UTF-8";
    $mail->isSMTP();

    // Paramètres Gmail
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'milleculturesuneorigine@gmail.com';
    $mail->Password = 'milleculturesuneorigine77420';
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    // Config des emails et message
    $mail->setFrom('milleculturesuneorigine@gmail.com', 'Mille Cultures, une Origine');
    $mail->addAddress($toEmail);
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation de création du compte';
    $mail->Body    = "
    <h1 style='font-size:1.2rem'>Confirmation de compte</h1>
    <p style='font-size:1rem'>Bonjour ! Vous avec procédé à la création d'un compte sur le site de <a href='https://millecultureuneorigine.but-mmi-champs.fr'>Mille Cultures, une Origine</a>.<br> 
    Cliquez sur ce lien pour confirmer votre inscription : <br>
    $url<br>
    Si vous n'êtes pas à l'origine de cette demande, merci d'ignorer ce mail.</p>
    <p style='font-size:1rem'>Cordialement,<br>
    Mille Culture, une Origine</p>";
    
    $mail->send();
    header('Location: controller.php?page=accountconf');
} else {
    header("Location: controller.php?page=inscription");
}
?>

