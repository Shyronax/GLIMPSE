<?php 

require_once('vendor/autoload.php');
use \Firebase\JWT\JWT; 

// Paramètres pour le JWT
$tokenId = base64_encode(random_bytes(32));
$issuedAt = time();
$notBefore = $issuedAt;
$expire = $issuedAt + 10800; // valide 2h

$keyid = 'decoded';

// Données à encoder dans le JWT (payload)
$payload = [
    'id' => '1', // user id dans la bdd, 1 car admin.
    'email' => $email, // email de l'admin
    'iat' => $issuedAt, // date de création du token
    'nbf' => $notBefore, // date de début de validité du token
    'exp' => $expire, // date d'expiration du token
];

// Clé secrète pour signer le JWT (signature)
$secretKey = 'admincmoihehe345';

// Algorithme de signature
$algorithm = 'HS256';

// Encodage du JWT
$jwt = JWT::encode($payload, $secretKey, $algorithm, $keyid);

