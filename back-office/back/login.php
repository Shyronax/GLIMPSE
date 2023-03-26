<?php
require('api/db.php');
require('api/model.php');

if($_SERVER["REQUEST_METHOD"] === 'POST' || $_SERVER["REQUEST_METHOD"] === 'OPTIONS') {
    // Décodage du corps de la requête JSON
    $data = json_decode(file_get_contents('php://input'), true);

     // Vérification de l'existence des données
     if(isset($data['pseudo']) && isset($data['mdp'])) {
        $pseudo = $data['pseudo'];
        $mdp = $data['mdp'];

        if(loginAndJWT($pseudo, $mdp) === "ok") {
            // Création du JWT
            require('jwt/create.php');

            // Envoi du JWT au client
            setcookie('jwt', $jwt, $expire, '/', null, false, true);

            require('jwt/verify.php');

            if($jwtValide == 1) {
                $response=array(
                    'status'=> 1,
                    'status_message'=>"Connexion réussie"
                );
            } else {
                $response=array(
                    'status'=> 0,
                    'status_message'=>"Erreur : connexion échouée"
                );
            }
            sendJSON($response);
        }
    } else {
        $response=array(
            'status'=> 0,
            'status_message'=>"Erreur : vous n'avez pas renseigné le pseudo ou le mot de passe"
        );
        sendJSON($response);
    }
} else {
    header('Location: http://localhost:5173/connexion');
}