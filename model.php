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
        return ("already exists");
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
        $insertedId=$db->lastInsertId();

        $query='SELECT * FROM utilisateur WHERE id_utilisateur=:id';
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
    var_dump($db);
    $query="SELECT * FROM utilisateur WHERE email_utilisateur = :email";
    
    $stmt=$db->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        if(password_verify($mdp, $result['mdp_utilisateur'])){
            $_SESSION['id'] = $result['id_utilisateur'];
            $_SESSION['nom'] = $result['nom_utilisateur'];
            $_SESSION['prenom'] = $result['prenom_utilisateur'];
            $_SESSION['mail'] = $result['email_utilisateur'];
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

function addTicket($jour, $heure, $nom, $prenom, $tarif1, $tarif2, $tarif3, $client=null){
    $db=dbConnect();
    $query="INSERT INTO ticket (jour_ticket, heure_ticket, ext_utilisateur, nom_ticket, prenom_ticket, nbplace_ticket) VALUES (:jour_ticket, :heure_ticket, :ext_utilisateur, :nom_ticket, :prenom_ticket, :nbplace_ticket)";

    $nbplace=$tarif1+$tarif2+$tarif3;
    $stmt=$db->prepare($query);
    $stmt->bindParam(':jour_ticket', $jour);
    $stmt->bindParam(':heure_ticket', $heure);
    $stmt->bindParam(':ext_utilisateur', $client);
    $stmt->bindParam(':nom_ticket', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':prenom_ticket', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':nbplace_ticket', $nbplace, PDO::PARAM_INT);
    $stmt->execute();
    $insertedId=$db->lastInsertId();

    $query='SELECT * FROM ticket WHERE id_ticket=:id';
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
    $query="SELECT * FROM ticket WHERE ext_utilisateur = :id";
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

function reinitMdp($selector,$date,$token,$mdp){
    $db=dbConnect();
    $query=$db->prepare("SELECT * FROM reinit_mdp WHERE selector_reinit_mdp=:selector AND exp_reinit_mdp>=:exp");

    $query->bindParam(':selector', $selector , PDO::PARAM_STR); 
    $query->bindParam(':exp', $current_time , PDO::PARAM_STR); 
    $query->execute();
    $result=$query->fetch(PDO::FETCH_ASSOC);

    // S'il y a bien le selector, on vérifie le token hashé associé
    if($result){
        $token_bin = hex2bin($token);
        $token_check = password_verify($token_bin, $result["token"]);

        if($token_check === true){
            $token_mail = $result["email"];
            $query=$db->prepare("SELECT * FROM utilisateurs WHERE email_utilisateur=:email");
            $query->bindParam(':email', $token_mail , PDO::PARAM_STR);
            $query->execute();
            $result=$query->fetch(PDO::FETCH_ASSOC);

            // si l'email renseigné est bien dans la table des utilisateurs, réinitialiser le mdp
            if($result){
                $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                $query=$db->prepare("UPDATE utilisateurs SET mdp=:mdp WHERE login=:email");
                $query->bindParam(':email', $token_mail, PDO::PARAM_STR);
                $query->bindParam(':mdp', $mdp, PDO::PARAM_STR);
                $query->execute();
                echo"c'est bon !!";
            }
        } else {
            echo "erreur : tocken invalide";
        }
    } else {
        echo "erreur : lien invalide/expiré";
    }
}

