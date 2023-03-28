<?php
session_start();

function dbConnect() {
    $db = new PDO('mysql:host=localhost;dbname=mcuo;port=3306;charset=utf8','root', '');
    return $db;
}

function addClient($nom, $prenom, $email, $mdp){
    $db=dbConnect();
    var_dump($db);
    $query="SELECT * FROM utilisateur WHERE email_utilisateur=:email";
    $stmt=$db->prepare($query);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        return("déjà existant");
        // header("Location: controller.php?page=inscription");
    } else {
        $query='INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, mdp_utilisateur) VALUES (:nom, :prenom, :email, :pass)';
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
    $query="SELECT * FROM utilisateur WHERE email_utilisateur = :email";
    
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

function getOneById($id, $table){
    $db=dbConnect();
    $query="SELECT * FROM $table WHERE id_$table = :id";
    $stmt=$db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getClientTickets($client){
    $db=dbConnect();
    $query="SELECT * FROM tickets WHERE id_utilisateur = :id";
    $stmt=$db->prepare($query);
    $stmt->bindParam(':id', $client, PDO::PARAM_INT);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function modifClient($id,$login,$mail){
    $db=dbConnect();
    $query="UPDATE utilisateur SET login_utilisateur=:login, email_utilisateur=:mail WHERE id_utilisateur=:id";
    $stmt=$db->prepare($query);
    $stmt->bindParam(':login',$login, PDO::PARAM_STR);
    $stmt->bindParam(':mail',$mail, PDO::PARAM_STR);
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->execute();
}


// fonctions pour la réinitialisation du mot de passe
function deleteFromReinitMdp($mail){
    $db=dbConnect();
    $query="DELETE FROM reinit_mdp WHERE email_reinit_mdp=:mail";
    $stmt=$db->prepare($query);
    $stmt->bindParam(':mail',$mail, PDO::PARAM_STR);
    $stmt->execute();
}

function insertIntoReinitMdp($mail,$selector,$token,$exp){
    $db=dbConnect();
    $query="INSERT INTO reinit_mdp (email_reinit_mdp, selector_reinit_mdp, token_reinit_mdp, exp_reinit_mdp) VALUES (:mail, :selector, :token, :exp)";

    $tokenHash = password_hash($token, PASSWORD_DEFAULT);

    $stmt=$db->prepare($query);
    $stmt->bindParam(':mail',$mail, PDO::PARAM_STR);
    $stmt->bindParam(':selector',$selector, PDO::PARAM_STR);
    $stmt->bindParam(':token',$tokenHash, PDO::PARAM_STR);
    $stmt->bindParam(':exp',$exp, PDO::PARAM_STR);
    $stmt->execute();
}

