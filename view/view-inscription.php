<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <script src="src/js/inscription.js" defer></script>
    <title>Inscription - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.php";
    ?>
    <main>
        <div class="container">
        <?php
            if (isset($_GET['status'])){
                switch($_GET['status']){
                    case "existing": 
                        echo("<div class='form__message--error'>Un compte associé à cette adresse mail existe déjà.</div>");
                        break;
                    case "error": 
                        echo("<div class='form__message--error'>Une erreur inattendue est survenue. Veuillez réessayez ultérieurement.</div>");
                        break;
                }
            }
            ?>
            <h1 class="container__title">S'incrire</h1>
            <p class="container__text">*Champs obligatoires</p>
            <form action="inscriptionClient.php" class="form" method="post">
                <div class="form__container">
                    <div class="form__field">
                        <label for="nom" class="form__label">Nom*</label>
                        <input type="text" name='nom' class="form__input" id="nom" required>
                    </div>
                    <div class="form__field">
                        <label for="prenom" class="form__label">Prénom*</label>
                        <input type="text" name='prenom' class="form__input" id="prenom" required>
                    </div>
                    <div class="form__field">
                        <label for="mail" class="form__label">Email*</label>
                        <input type="email" name='mail' class="form__input" id="mail" onKeyUp="checkMailAndPass()" required>
                    </div>
                    <div class="form__field">
                        <label for="mail-conf" class="form__label">Confirmation mail*</label>
                        <input type="email"  name='mail-conf' class="form__input" id="mail-conf" onKeyUp="checkMailAndPass()" required>
                    </div>
                    <div class="form__message--error hidden" id="mail-error">Les adresses mail ne correspondent pas.</div>
                    <div class="form__field">
                        <label for="password" class="form__label">Mot de passe*</label>
                        <div class="pos-relative">
                            <input type="password" name="mdp" class="form__input" id="password" onKeyUp="onKeyUp()" required>
                            <i class="far fa-eye input__icon" id="eyeIcon"></i>
                        </div>
                        <div>Le mot de passe doit contenir au minimum <span id="char" class="form__message--error">10 caractères,</span> <span id="maj" class="form__message--error">1 majuscule</span> et <span id="num" class="form__message--error">2 chiffres</span></div>
                    </div>
                    <div class="form__field">
                        <label for="passwordConf" class="form__label">Confirmation mot de passe*</label>
                        <div class="pos-relative">
                            <input type="password" name="mdp-conf" class="form__input" id="passwordConf" onKeyUp="checkMailAndPass()" required>
                            <i class="far fa-eye input__icon" id="eyeIconConf"></i>
                            <div class="form__message--error hidden" id="pass-error">Les mots de passe ne correspondent pas.</div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn--secondary" value="S'inscrire" id="submit">
            </form>
            <p class="container__text container__text-form"><span class="text--semi-bold">Vous avez déjà un compte ? </span><a href="controller.php?page=connection" class="container__link">Connectez-vous !</a></p>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 