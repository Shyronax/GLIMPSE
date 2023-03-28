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

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.fr';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'site@milleculturesuneorigine.but-mmi-champs.fr';
    $mail->Password = 'Milleculturesuneorigine77420!';
    $mail->setFrom('site@milleculturesuneorigine.but-mmi-champs.fr', 'Mille Cultures, une Origine');
    $mail->addAddress($to, $to);
    $mail->Subject = 'Réinitialisation de votre mot de passe';
    $mail->msgHTML(file_get_contents('message.html'), __DIR__); // message.html est le fichier contenant le message du mail, dans le même répertoare que ce fichier
    $mail->Body = 'contenu du message en clair';
 
    header('Location: controller.php?page=mailenvoye');'
} else {
    header("Location: controller.php?page=pwdforgot");
}