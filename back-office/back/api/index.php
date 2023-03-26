<?php
require('db.php');
require('model.php');

$request_method = $_SERVER["REQUEST_METHOD"];
$url = explode("/", filter_var($_GET['action'],FILTER_SANITIZE_URL));

// vérification de l'existence du cookie avec jwt
if(isset($_COOKIE['jwt'])) {
    $jwt = $_COOKIE['jwt'];
    require('../jwt/verify.php');

    // vérification de la validité du jwt, si oui accès autorisé
    if($jwtValide === 1) {
        switch($request_method){
            case 'GET':
                switch($url[0]){
                    case "tickets" : 
                        getAll('ticket');
                    break;
                    case "ticket" : 
                        if(!empty($url[1])){
                            getOneById('ticket',$url[1]);
                        } else {
                            $response=array(
                            'status'=> 0,
                            'status_message'=>"Erreur : vous n'avez pas renseigné le numéro du ticket"
                            );
                            sendJSON($response);
                        }
                    break;
                    case "utilisateurs" : 
                        getAll('utilisateur');
                    break;
                    case "utilisateur" : 
                        if(!empty($url[1])){
                            getOneById('utilisateur',$url[1]);
                        } else {
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : vous n'avez pas renseigné l'identifiant de l'utilisateur"
                            );
                            sendJSON($response);
                        }
                    break;
                    default : 
                    header('Location: http://localhost:5173/connexion');
                    break;
                }
            break;
            case 'POST':
                // Décodage du corps de la requête JSON
                $data = json_decode(file_get_contents('php://input'), true);
                    
                switch($url[0]){
                    case "auth":
                        // Vérification de l'existence des données
                        if(isset($data['pseudo']) && isset($data['mdp'])) {
                            $pseudo = $data['pseudo'];
                            $mdp = $data['mdp'];
                            login($pseudo, $mdp);
                        } else {
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : vous n'avez pas renseigné le pseudo ou le mot de passe"
                            );
                            sendJSON($response);
                        }
                    break;
                    case "tickets" : 
                        addTicket($data);
                    break;
                    case "utilisateurs" : 
                        if(searchUser($data['pseudo'],'pseudo_utilisateur')){
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : le pseudo ". $data['pseudo'] ." est déjà pris."
                            );
                            sendJSON($response);
                        } else if(searchUser($data['email'],'email_utilisateur')){
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : l'email ". $data['email'] ." est déjà pris."
                            );
                            sendJSON($response);
                        } else {
                            addUser($data);
                        }
                    break;
                    default : 
                        $response=array(
                            'status'=> 0,
                            'status_message'=>"Erreur : url non valide"
                        );
                        sendJSON($response);
                }
            break;
            case 'PUT':
                switch($url[0]){
                    case "ticket" : 
                        if(!empty($url[1])){
                            $_PUT = json_decode(file_get_contents('php://input'), true);
                            updateUser($_PUT,($url[1]));
                        } else {
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : vous n'avez pas renseigné le numéro du ticket à modifier"
                            );
                            sendJSON($response);
                        }
                    break;
                    case "utilisateur" : 
                        if(!empty($url[1])){
                            $_PUT = json_decode(file_get_contents('php://input'), true);
                            if(isset($_PUT["mdp"]) && $url[1] == 1) {
                                updateAdmin($_PUT);
                            } else {
                                updateUser($_PUT,($url[1]));
                            }
                        } else {
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : vous n'avez pas renseigné le numéro de l'utilisateur à modifier"
                            );
                            sendJSON($response);
                        }
                    break;
                }
            break;
            case 'DELETE':
                switch($url[0]){
                    case "ticket" : 
                        if(!empty($url[1])){
                            delete('ticket',$url[1]);
                        } else {
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : vous n'avez pas renseigné le numéro du ticket à supprimer"
                            );
                            sendJSON($response);
                        }
                    break;
                    case "utilisateur" : 
                        if(!empty($url[1])){
                            delete('utilisateur',$url[1]);
                        } else {
                            $response=array(
                                'status'=> 0,
                                'status_message'=>"Erreur : vous n'avez pas renseigné l'identifiant de l'utilisateur à supprimer"
                            );
                            sendJSON($response);
                        }
                    break;
                }
            break;
        }
        } else {
            header('Location: http://localhost:5173/connexion');
        }        
} else {
    header('Location: http://localhost:5173/connexion');
}
