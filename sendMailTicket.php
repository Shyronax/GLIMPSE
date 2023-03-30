<?php
require_once "model.php";
require "phpmailer/vendor/autoload.php";

// librairie PHPMailer pour gérer l'envoi de mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

try {
    if(isset($_SESSION['mail']) && $_GET['id']){

    include("createTicketPDF.php");
    $pdfTicket=$dompdf->output();

    include("createFacturePDF.php");
    $pdfFacture=$dompdf->output();

    $toEmail=$_SESSION['mail'];
    
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
    $mail->addStringAttachment($pdfFacture, 'facture-mcuo-reservation.pdf');
    $mail->addStringAttachment($pdfTicket, 'ticket-mcuo-reservation.pdf');
    $mail->Subject = 'Ticket et facture de votre réservation';
    $mail->Body    = "
    <h1 style='font-size:1.2rem'>Merci pour votre réservation !</h1>
    <p style='font-size:1rem'>Bonjour ! Vous avez réservé une place pour l'exposition <strong>Les Pueblos</strong> sur le site de <a href='https://millecultureuneorigine.but-mmi-champs.fr'>Mille Cultures, une Origine</a>.<br> 
    Vous trouverez votre facture et votre ticket en pièce jointe au format PDF.<br>
    <p style='font-size:1rem'>Cordialement,<br>
    Mille Culture, une Origine</p>";
    
    $mail->send();
    header('Location: controller.php?page=booking5');
} else {
    header('Location: controller.php?page=booking1&status=error');
    die();
}
} catch(Exception $e) {
    header('Location: controller.php?page=booking1&status=error');
}