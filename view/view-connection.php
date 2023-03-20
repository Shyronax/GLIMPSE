<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Connexion - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.html";
    ?>
    <main>
        <div class="container">
            <h1 class="container__title">Se connecter</h1>
            <p class="container__text">*Champs obligatoires</p>
            <form action="" class="form" method="post">
                <div class="form__container">
                    <div class="form__field">
                        <label for="pseudo" class="form__label">Login / Email*</label>
                        <input type="text" name='pseudo 'class="form__input" required>
                    </div>
                    <div class="form__field">
                        <label for="mdp" class="form__label">Mot de passe*</label>
                        <div class="pos-relative">
                            <input type="password" name="mdp" class="form__input" id="password">
                            <i class="far fa-eye input__icon" id="eyeIcon"></i>
                        </div>
                        <a href="" class="form__link">Mot de passe oublié ?</a>
                    </div>
                </div>
                <input type="submit" class="btn btn--secondary" value="Se connecter">
            </form>
            <p class="container__text"><span class="text--semi-bold">Vous n'avez pas de compte ? </span><a href="" class="container__link">Inscrivez-vous !</a></p>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 