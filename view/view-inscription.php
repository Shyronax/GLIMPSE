<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Inscription - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.html";
    ?>
    <main>
        <div class="container">
            <h1 class="container__title">S'incrire</h1>
            <p class="container__text">*Champs obligatoires</p>
            <form action="" class="form" method="post">
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
                    <div class="form__field">
                        <label for="mdp" class="form__label">Mot de passe*</label>
                        <div class="pos-relative">
                            <input type="password" name="mdp" class="form__input" id="password">
                            <i class="far fa-eye input__icon" id="eyeIcon"></i>
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="mdp-conf" class="form__label">Confirmation mot de passe*</label>
                        <div class="pos-relative">
                            <input type="password" name="mdp-conf" class="form__input" id="passwordConf">
                            <i class="far fa-eye input__icon" id="eyeIconConf"></i>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn--secondary" value="S'inscrire">
            </form>
            <p class="container__text"><span class="text--semi-bold">Vous avez déjà un compte ? </span><a href="" class="container__link">Connectez-vous !</a></p>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 