<?php
session_start();

function dbConnect() {
    $db = new PDO('mysql:host=localhost;dbname=mcuo;port=3306;charset=utf8','root', '');
    return $db;
}

function addClient($nom, $prenom, $email, $mdp){
    $db=dbConnect();
    $query="SELECT * FROM client WHERE email=:email";
    $stmt=$db->prepare($query);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        return ("already exists");
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
        $insertedId=$db->lastInsertId();

        $query='SELECT * FROM ticket WHERE id=:id';
        $stmt=$db->prepare($query);
        $stmt->bindParam(':id', $insertedId, PDO::PARAM_INT);
        $stmt->execute();
    
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            return ("added");
        } else {
            return ("error");
        }
    }
}

function loginClient($email, $mdp){
    $db=dbConnect();
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
            return true;
            // header("Location: controller.php?page=home");
        } else {
            return false;
            // header("Location: controller.php?page=connection");
        }
    } else {
        return false;
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
    $insertedId=$db->lastInsertId();

    $query='SELECT * FROM ticket WHERE id=:id';
    $stmt=$db->prepare($query);
    $stmt->bindParam(':id', $insertedId, PDO::PARAM_INT);
    $stmt->execute();

    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    if($result){
        return true;
    } else {
        return false;
    }
}
?>