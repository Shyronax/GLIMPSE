<?php
session_start();

function dbConnect() {
    $db = new PDO('mysql:host=localhost;dbname=mcuo;port=3306;charset=utf8','root', '');
    return $db;
}

function addClient($nom, $prenom, $email, $mdp){
    $db=dbConnect();
    var_dump($db);
    $query="SELECT * FROM client WHERE email=:email";
    $stmt=$db->prepare($query);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        return("déjà existant");
        // header("Location: controller.php?page=inscription");
    } else {
        $query='INSERT INTO client (nom, prenom, email, pass) VALUES (:nom, :prenom, :email, :pass)';
        $hash=password_hash($mdp, PASSWORD_DEFAULT);

        $stmt=$db->prepare($query);
        $stmt->bindParam(':nom',$nom, PDO::PARAM_STR); 
        $stmt->bindParam(':prenom',$prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email',$email, PDO::PARAM_STR); 
        $stmt->bindParam(':pass', $hash , PDO::PARAM_STR); 
        $stmt->execute();
        var_dump($nom);
        var_dump($prenom);
        var_dump($email);
        var_dump($mdp);
        var_dump($hash);
        var_dump($stmt);
    }
}

function loginClient($email, $mdp){
    $db=dbConnect();
    var_dump($db);
    $query="SELECT * FROM client WHERE email = :email";
    
    $stmt=$db->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        if(password_verify($mdp, $result['pass'])){
            $_SESSION['id'] = $result['id'];
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
            $_SESSION['mail'] = $result['mail'];
            return("connecté");
            // header("Location: controller.php?page=home");
        } else {
            return("pas connecté");
            // header("Location: controller.php?page=connection");
        }
    } else {
        return("pas connecté");
        // header("Location: controller.php?page=connection");
    }
}

function addTicket($jour, $heure, $nom, $prenom, $mail, $tarif, $client=null){
    $db=dbConnect();
    $query="INSERT INTO ticket (jour_ticket, heure_ticket, ext_utilisateur, nom, prenom, mail, tarif) VALUES (:jour_ticket, :heure_ticket, :ext_utilisateur, :nom, :prenom, :mail, :tarif)";

    $stmt=$db->prepare($query);
    $stmt->bindParam(':jour_ticket', $jour);
    $stmt->bindParam(':heure_ticket', $heure);
    $stmt->bindParam(':ext_utilisateur', $client, PDO::PARAM_INT);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':tarif', $tarif, PDO::PARAM_STR);
    $stmt->execute();
}
?>