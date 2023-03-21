<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Réservation - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.html";
    ?>
    <main>
        <div class="container container--small container--center">
            <a href="controller.php?page=booking1"><i class="fa-solid fa-arrow-left link-back"></i></a>
            <div>
                <h1 class="container__title">Billetterie</h1>
                <p class="container__subtitle">Informations personnelles (2/4)</p>
            </div>
            <p class="container__text text--center">Veuillez saisir vos informations personnelles afin qu'on puisse vous envoyez une confirmation de votre réservation et vérifier qu'il s'agisse bien de vous.</p>
            <form action="" class="form">
                <div class="form__container">
                    <div class="form__field">
                        <label for="pseudo" class="form__label">Login*</label>
                        <input type="text" name='pseudo' class="form__input" required>
                    </div>
                    <div class="form__field">
                        <label for="mail" class="form__label">Email*</label>
                        <input type="email" name='mail' class="form__input" required>
                    </div>
                    <div class="form__field">
                        <label for="mail-conf" class="form__label">Confirmation mail*</label>
                        <input type="email"  name='mail-conf' class="form__input" required>
                    </div>
                </div>
            </form>
            <p class="container__text text--center">Si vous avez un compte, <a href="" class="container__link text--bold">connectez-vous</a> et passez cette étape ! Si vous n'en avez pas et que vous le souhaitez, <a href="" class="container__link text--bold">inscrivez-vous</a>.</p>
            <a href="controller.php?page=booking3" class="btn btn--secondary">Confirmer</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 