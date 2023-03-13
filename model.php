<?php
function login($login, $pass)
{
    $query = "SELECT * FROM user WHERE pseudo = :pseudo";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($pass, $result['mdp'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function addUser($pseudo, $mdp, $email, $nom, $prenom)
{
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    $query = "INSERT INTO user (pseudo, mdp, email, nom, prenom) VALUES (:pseudo, :mdp, :email, :nom, :prenom)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    $stmt->bindValue(":mdp", $hash, PDO::PARAM_STR);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":prenom", $nom, PDO::PARAM_STR);
    $stmt->bindValue(":nom", $prenom, PDO::PARAM_STR);
    $stmt->execute();
}

function ticket(){
    
}

function logout()
{
    session_destroy();
}
?>