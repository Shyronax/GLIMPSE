<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
<form action="scriptConnexion.php" method="post">
        <label for="pseudo">Nom d'utilisateur
            <input type="text" name="pseudo" required>
        </label>
        <label for="mdp">Mot de passe
            <input type="password" name="mdp" required>
        </label>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>