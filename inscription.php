<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <form action="scriptInscription.php" method="post">
        <label for="nom">Nom
            <input type="text" name="nom" required>
        </label>
        <label for="prenom">Prénom
            <input type="text" name="prenom" required>
        </label>
        <label for="pseudo">Nom d'utilisateur
            <input type="text" name="pseudo" required>
        </label>
        <label for="mail">Adresse e-mail
            <input type="email" name="mail" required>
        </label>
        <label for="mdp">Mot de passe
            <input class="password" type="password" name="mdp" required>
        </label>
        <label for="mdp-conf">Confirmation du mot de passe
            <input type="password" name="mdp-conf" required>
        </label>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>