<?php
require "model.php";
require "phpmailer/vendor/autoload.php";

// librairie PHPMailer pour gérer l'envoi de mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['mail'])){

    $toEmail=$_POST['mail'];

    // création du selector et token qui seront dans l'url
    $selector=bin2hex(random_bytes(8));
    $token=random_bytes(32);

    $url="https://millecultureuneorigine.but-mmi-champs.fr/controller.php?page=pwdchangeform&selector=".$selector."&token=".bin2hex($token); 


    // Date actuelle au format Unix + 1800 sec = fin de valitidé du lien
    $expires=date("U")+1800; // 30 minutes

    // Supprime toute entrée de ce mail dans table reinit_mdp avant d'en créer une
    deleteFromReinitMdp($_POST['mail']); // 

    // Créé le row (insère le token)
    insertIntoReinitMdp($_POST['mail'], $selector, $token, $expires);

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
    $mail->Subject = 'Réinitialisation de votre mot de passe';
    $mail->Body    = "
    <h1 style='font-size:1.2rem'>Réinitialisation de mot de passe</h1>
    <p style='font-size:1rem'>Bonjour ! Vous avez demandé un lien de réinitialisation de mot de passe sur le site de <a href='https://millecultureuneorigine.but-mmi-champs.fr'>Mille Cultures, une Origine</a>.<br> 
    Cliquez sur ce lien pour réinitialiser votre mot de passe : <br>
    $url<br>
    Attention, ce lien n'est valide que pendant 30 minutes.</p>
    <p style='font-size:1rem'>Cordialement,<br>
    Mille Culture, une Origine</p>";
    
    $mail->send();
    header('Location: controller.php?page=mailconf');
} else {
    header("Location: controller.php?page=pwdforgot");
}
?>

