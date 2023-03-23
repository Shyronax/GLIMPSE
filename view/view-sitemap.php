<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Mon compte - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.html";
    ?>
    <main>
        <div class="container">
            <h1 class="container__title">Plan du site</h1>
            <div class="section">
                <h2 class="section__title">Pages</h2>
                <ul class="section__list">
                    <li class="section__list-item"><a href="controller.php?page=home" class="section__list-item-link">Accueil</a></li>
                    <li class="section__list-item"><a href="controller.php?page=exhibition" class="section__list-item-link">Exposition</a></li>
                    <li class="section__list-item"><a href="controller.php?page=visit" class="section__list-item-link">Visiter</a></li>
                    <li class="section__list-item"><a href="controller.php?page=about" class="section__list-item-link">Notre histoire</a></li>
                    <li class="section__list-item"><a href="controller.php?page=booking1" class="section__list-item-link">Billeterie</a></li>
                    <li class="section__list-item"><a href="controller.php?page=faq" class="section__list-item-link">FAQ</a></li>
                    <li class="section__list-item"><a href="controller.php?page=mentions" class="section__list-item-link">Mentions légales</a></li>
                </ul>
            </div>
            <div class="section">
                <h2 class="section__title">Compte</h2>
                <ul class="section__list">
                    <li class="section__list-item"><a href="controller.php?page=connection" class="section__list-item-link">Se connecter</a></li>
                    <li class="section__list-item"><a href="controller.php?page=inscription" class="section__list-item-link">S'inscrire</a></li>
                </ul>
            </div>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 