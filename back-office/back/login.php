<?php
require_once('vendor/autoload.php');
use \Firebase\JWT\JWT; 

// Paramètres pour le JWT
$tokenId = base64_encode(random_bytes(32));
$issuedAt = time();
$notBefore = $issuedAt + 60;
$expire = $issuedAt + 3600;

$keyid = 'decoded';

// Données à encoder dans le JWT (payload)
$payload = [
    'id' => '1234567890', // user id dans la bdd dont $_GET['id'] etc.
    'pseudo' => 'John Doe', // pseudo de l'utilisateur
    'iat' => $issuedAt, // date de création du token
    'nbf' => $notBefore, // date de début de validité du token
    'exp' => $expire, // date d'expiration du token
];

// Clé secrète pour signer le JWT (signature)
$secretKey = 'admin';

// Algorithme de signature
$algorithm = 'HS256';

// Encodage du JWT
$jwt = JWT::encode($payload, $secretKey, $algorithm, $keyid);

echo "JWT: " . $jwt;
