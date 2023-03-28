<?php
// CA FONCTIONE !! :DD
require "phpmailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

// Paramètres SMTP Hostinger
$mail->isSMTP(); // Configuration du serveur SMTP
$mail->Host       = 'smtp.hostinger.com'; // Nom du serveur SMTP
$mail->SMTPAuth   = true; // Authentification SMTP active
$mail->Username   = 'site@milleculturesuneorigine.but-mmi-champs.fr'; // Votre email complet
$mail->Password   = 'Milleculturesuneorigine77420!'; // Votre mot de passe d'email
$mail->SMTPSecure = 'tls'; // Sécurité SMTP, TLS est recommandé
$mail->Port       = 587; // Le port SMTP utilisé pour l'envoi d'email

// Configuration de l'email
$mail->setFrom('site@milleculturesuneorigine.but-mmi-champs.fr', 'Mille Cultures, une Origine');
$mail->addAddress('lilas26b@gmail.com', 'Lilas'); // Ajouter une adresse email et un nom optionnel
$mail->isHTML(true); // Activer le support HTML pour l'email

// Configurer le sujet et le corps de l'email
$mail->Subject = "Reinitialisation de votre mot de passe";
$mail->Body    = "Réinitialisez de votre mot de passe en cliquant sur l'urel : url";

// Envoyer l'email
if (!$mail->send()) {
    echo "Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo;
} else {
    echo "Email envoyé avec succès";
}
