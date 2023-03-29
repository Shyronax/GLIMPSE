<?php
require_once "model.php";
require "phpmailer/vendor/autoload.php";

// librairie PHPMailer pour gérer l'envoi de mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_SESSION['mail']) && $_GET['id']){

    include("createTicketPDF.php");
    $toEmail=$_SESSION['mail'];
    $pdf=$dompdf->output();

    // Config du mail à envoyer
    $mail = new PHPMailer(true);
    $mail->CharSet="UTF-8";
    $mail->isSMTP();

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
    $mail->addStringAttachment($pdf, 'mcuo-reservation-facture.pdf');
    $mail->Subject = 'Facture de votre réservation';
    $mail->Body    = "
    <h1 style='font-size:1.2rem'>Merci pour votre réservation !</h1>
    <p style='font-size:1rem'>Bonjour ! Vous avez réserver une place pour l'exposition <strong>Les Pueblos</strong> sur le site de <a href='https://millecultureuneorigine.but-mmi-champs.fr'>Mille Cultures, une Origine</a>.<br> 
    Vous trouverez votre facture en pièce jointe au format PDF.<br>
    <p style='font-size:1rem'>Cordialement,<br>
    Mille Culture, une Origine</p>";
    
    $mail->send();
    header('Location: controller.php?page=booking5');
} else {
    header('Location: controller.php?page=booking1&status=error');
    die();
}
