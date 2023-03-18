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
                   throw new Exception ("Vous n'avez pas renseigné le numéro du ticket");
                }
            break;
            case "utilisateurs" : 
                getAll('utilisateur');
            break;
            case "utilisateur" : 
                if(!empty($url[1])){
                    getOneById('utilisateur',$url[1]);
                } else {
                   throw new Exception ("Vous n'avez pas renseigné l'identifiant de l'utilisateur");
                }
            break;
            default : throw new Exception ("La demande n'est pas valide, vérifiez l'url");
        }
    break;
    case 'POST':
        switch($url[0]){
            case "tickets" : 
                addTicket($_POST);
            break;
            case "utilisateurs" : 
                addUser($_POST);
            break;
            default : throw new Exception ("La demande n'est pas valide, vérifiez l'url");
        }
    break;
    case 'PUT':
        switch($url[0]){
        case "ticket" : 
            if(!empty($url[1])){
                parse_str(file_get_contents('php://input'), $_PUT);
                updateTicket($_PUT,($url[1]));
            } else {
               throw new Exception ("Vous n'avez pas renseigné le numéro du ticket à modifier");
            }
        break;
        case "utilisateur" : 
            if(!empty($url[1])){
                parse_str(file_get_contents('php://input'), $_PUT);
                updateUser($_PUT,($url[1]));
            } else {
               throw new Exception ("Vous n'avez pas renseigné le numéro du utilisateur à modifier");
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
               throw new Exception ("Vous n'avez pas renseigné le numéro du ticket à supprimer");
            }
        break;
        case "utilisateur" : 
            if(!empty($url[1])){
                delete('utilisateur',$url[1]);
            } else {
               throw new Exception ("Vous n'avez pas renseigné l'identifiant de l'utilisateur");
            }
        break;
        }
    break;
}