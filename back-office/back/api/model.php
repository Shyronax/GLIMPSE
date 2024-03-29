<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');

function dbConnexion(){
    require('db.php');
    return $db;
}

function sendJSON($data){
    header('Content-Type: application/json, Charset=UTF-8');
    echo json_encode($data);
}

function login($email,$mdp){
    $db=dbConnexion();
    $db->query('SET NAMES utf8');
    $requete="SELECT * FROM utilisateur WHERE email_utilisateur=:email";

    $stmt=$db->prepare($requete);
    $stmt->bindParam(':email',$email , PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if ($result){
        if(password_verify($mdp, $result["mdp_utilisateur"])){
            return "ok";
        } else {
            $response=array(
                'status'=> 0,
                'status_message'=>'Mauvais login/mot de passe.'
            );
        sendJSON($response);
        }
    } else {
        $response=array(
                'status'=> 0,
                'status_message'=>'Mauvais login/mot de passe.'
            );
        sendJSON($response);
    }
    
};

function getAll($table){
    $db=dbConnexion();
    $query="SELECT * FROM $table";
    $stmt=$db->query($query);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    sendJSON($result);
}

function getOneById($table,$id){
    $db=dbConnexion();
    $query="SELECT * FROM $table WHERE id_$table=$id";
    $stmt=$db->query($query);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    sendJSON($result);
}

function addTicket($data){
    $db=dbConnexion();
    $query="INSERT INTO ticket VALUES (NULL, :jour, :heure, :utilisateur)";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':jour',$data["jour"], PDO::PARAM_STR); 
    $stmt->bindParam(':heure',$data["heure"], PDO::PARAM_STR); 
    $stmt->bindParam(':utilisateur',$data["utilisateur"], PDO::PARAM_INT); 

    if($stmt->execute()){
        $response=array(
            'status'=> 1,
            'status_message'=>'Ticket réservé avec succes.'
        );
    } else {
        $response=array(
            'status'=> 0,
            'status_message'=>'Erreur : ticket non réservé.'
        );
    }
    sendJSON($response);
}

function addUSer($data){
    $db=dbConnexion();
    $query="INSERT INTO utilisateur VALUES (NULL, :nom, :prenom, :mdp, :email)";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':nom',$data["nom"], PDO::PARAM_STR); 
    $stmt->bindParam(':prenom',$data["prenom"], PDO::PARAM_STR); 
    $stmt->bindParam(':email',$data["email"], PDO::PARAM_STR); 

    $hash= password_hash($data["mdp"], PASSWORD_DEFAULT);
    $stmt->bindParam(':mdp', $hash , PDO::PARAM_STR); 

    if($stmt->execute()){
        $response=array(
            'status'=> 1,
            'status_message'=>'Compte créé avec succes.'
        );
    } else {
        $response=array(
            'status'=> 0,
            'status_message'=>'Erreur : compte non créé.'
        );
    }
    sendJSON($response);
}

function updateTicket($data,$id){
	$db=dbConnexion();
    $query="UPDATE ticket SET jour_ticket=:jour, heure_ticket=:heure, ext_utilisateur=:utilisateur WHERE id_ticket=:id";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':jour',$data["jour"], PDO::PARAM_STR); 
    $stmt->bindParam(':heure',$data["heure"], PDO::PARAM_STR); 
    $stmt->bindParam(':utilisateur',$data["utilisateur"], PDO::PARAM_INT);
    $stmt->bindParam(':id',$id, PDO::PARAM_INT); 


    if($stmt->execute()){
        $response=array(
            'status'=> 1,
            'status_message'=>'Ticket modifié avec succès.'
        );
    } else {
        $response=array(
            'status'=> 0,
            'status_message'=>'Erreur : ticket non modifié.'
        );
    }
    sendJSON($response);
}

function updateUser($data,$id){
		$db=dbConnexion();
    $query="UPDATE utilisateur SET nom_utilisateur=:nom, prenom_utilisateur=:prenom, email_utilisateur=:email WHERE id_utilisateur=:id";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':nom',$data["nom"], PDO::PARAM_STR); 
    $stmt->bindParam(':prenom',$data["prenom"], PDO::PARAM_STR); 
    $stmt->bindParam(':email',$data["email"], PDO::PARAM_STR);
    $stmt->bindParam(':id',$id, PDO::PARAM_INT); 

    if($stmt->execute()){
        $response=array(
            'status'=> 1,
            'status_message'=>'Compte modifié avec succès.'
        );
    } else {
        $response=array(
            'status'=> 0,
            'status_message'=>'Erreur : compte non modifié.'
        );
    }
    sendJSON($response);
}

function updateAdmin($data){
    $db=dbConnexion();
    $query="UPDATE utilisateur SET email_utilisateur=:email, mdp_utilisateur=:mdp WHERE id_utilisateur=1";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':email',$data["email"], PDO::PARAM_STR); 

    $hash= password_hash($data["mdp"], PASSWORD_DEFAULT);
    $stmt->bindParam(':mdp', $hash , PDO::PARAM_STR); 
    $stmt->execute();

    if($stmt->execute()){
        $response=array(
            'status'=> 1,
            'status_message'=>'Compte administrateur modifié avec succès.'
        );
    } else {
        $response=array(
            'status'=> 0,
            'status_message'=>'Compte administrateur non modifié.'
        );
    }
    sendJSON($response);
}


function delete($table,$id){
	$db=dbConnexion();
    $query="DELETE FROM $table WHERE id_$table=:id";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':id',$id, PDO::PARAM_INT); 

    if($stmt->execute()){
        $response=array(
            'status'=> 1,
            'status_message'=>'Suppression réalisée.'
        );
    } else {
        $response=array(
            'status'=> 0,
            'status_message'=>'Erreur : suppression non réalisée.'
        );
    }
    sendJSON($response);
}

function searchUser($tosearch, $column){
    $db=dbConnexion();
    $query="SELECT * FROM utilisateur WHERE $column='$tosearch'";
    $stmt=$db->query($query);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return($result);
}