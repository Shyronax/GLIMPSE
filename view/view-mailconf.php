<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Mail envoyé - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.html";
    ?>
    <main>
        <div class="container">
            <h1 class="container__title">Email envoyé !</h1>
            <p class="container__text">Vérifier votre boîte de réception ou vos spam, nous vous avons envoyé un email contenant le lien de réinitialisation.</p>
            <a href="controller.php?page=home" class="btn btn--secondary">Retourner à la page d'accueil</a>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 