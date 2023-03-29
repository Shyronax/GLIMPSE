<?php
require "model.php";
require "phpmailer/vendor/autoload.php";

// librairie PHPMailer pour gérer l'envoi de mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['mail'])){

    $toEmail=$_POST['mail'];

    // Config du mail à envoyer
    $mail = new PHPMailer(true);
    $mail->CharSet="UTF-8";
    $mail->isSMTP();
    $mail->SMTPDebug = 2;

    // Paramètres SMTP Hostinger
    $mail->Host = 'smtp.hostinger.fr';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'site@milleculturesuneorigine.but-mmi-champs.fr';
    $mail->Password = 'Milleculturesuneorigine77420!';

    // Config des emails et message
    $mail->setFrom('site@milleculturesuneorigine.but-mmi-champs.fr', 'Mille Cultures, une Origine');
    $mail->addAddress($toEmail);
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation de création du compte';
    $mail->Body    = "
    <h1 style='font-size:1.2rem'>Bonjour !</h1>
    <p style='font-size:1rem'>Bonjour ! Vous avec procédé à la création d'un compte sur le site de <a href='https://millecultureuneorigine.but-mmi-champs.fr'>Mille Cultures, une Origine</a>.<br> 
    Cliquez sur ce lien pour confirmer votre inscription : <br>
    $url<br>
    Si vous n'êtes pas à l'origine de cette demande, merci d'ignorer ce mail.</p>
    <p style='font-size:1rem'>Cordialement,<br>
    Mille Culture, une Origine</p>";
    
    $mail->send();
    header('Location: controller.php?page=accountconf');
} else {
    // header("Location: controller.php?page=pwdforgot");
}
?>

