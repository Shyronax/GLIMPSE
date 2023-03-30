<?php

require_once('vendor/autoload.php');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Décoder le payload
$decode = JWT::jsonDecode(JWT::urlsafeB64Decode(explode('.', $jwt)[1]));

// Clé secrète utilisée pour signer le jeton
$secret_key = 'admincmoihehe345';
try {
    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
    $jwtValide = 1;
} catch (Exception $e) {
    $jwtValide = 0;
}