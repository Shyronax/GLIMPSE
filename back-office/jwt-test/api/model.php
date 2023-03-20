<?php
session_start();
function dbConnexion(){
    require('db.php');
    return $db;
}

function sendJSON($data){
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}

function login($login,$mdp){
    $db=dbConnect();
    $db->query('SET NAMES utf8');
    $requete="SELECT * FROM utilisateurs WHERE email=:login";

    $stmt=$db->prepare($requete);
    $stmt->bindParam(':login',$login , PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if ($result){
        if(password_verify($_POST['mdp'], $result["mdp"])){
            // genere JWT
            $_SESSION["login"]=$result["pseudo"];
            $_SESSION["id"] = $result["id_utilisateur"];
            header("Location:index.php");
        }
        else {
            // erreur : mot de passe incorrect
        }
    } else {
        // erreur : login incorrect
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
    $query="INSERT INTO utilisateur VALUES (NULL, :pseudo, :mdp, :email)";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':pseudo',$data["pseudo"], PDO::PARAM_STR); 
    $stmt->bindParam(':email',$data["email"], PDO::PARAM_STR); 

    $hash= password_hash($mdp, PASSWORD_DEFAULT);
    $stmt->bindParam(':mdp', $hash , PDO::PARAM_STR); 
    $stmt->execute();

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
    $query="UPDATE utilisateur SET pseudo_utilisateur=:pseudo, mdp_utilisateur=:mdp, email_utilisateur=:email WHERE id_utilisateur=:id";

    $stmt= $db->prepare($query);
    $stmt->bindParam(':pseudo',$data["pseudo"], PDO::PARAM_STR); 
    $stmt->bindParam(':mdp',$data["mdp"], PDO::PARAM_STR); 
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