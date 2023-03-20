<?php
require('db.php');
require('model.php');

$request_method = $_SERVER["REQUEST_METHOD"];
$url = explode("/", filter_var($_GET['action'],FILTER_SANITIZE_URL));

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
            // Récupération du corps de la requête
            $body = file_get_contents('php://input');
            // Décodage du corps de la requête JSON
            $data = json_decode($body, true);
            
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
                    addTicket($_POST);
                break;
                case "utilisateurs" : 
                    addUser($_POST);
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
                        parse_str(file_get_contents('php://input'), $_PUT);
                        updateTicket($_PUT,($url[1]));
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
                        parse_str(file_get_contents('php://input'), $_PUT);
                        updateUser($_PUT,($url[1]));
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

