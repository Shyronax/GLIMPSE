<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Mot de passe oublié - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.php";
    ?>
    <main>
        <div class="container">
        <?php
            if (isset($_GET['err'])){
                if ($_GET['err'] == 'mail'){
                    echo("<div class='form__message--error'>L'adresse mail n'est liée à aucun compte. Veuillez renseigner une adresse mail liée à un compte existant ou inscrivez-vous !</div>");
                } elseif($_GET['err'] == 'lien') {
                    echo("<div class='form__message--error'>Le lien est invalide/expiré. Veuillez refaire une demande ci-dessous.</div>");
                }
            }
            ?>
            <h1 class="container__title">Mot de passe oublié</h1>
            <p class="container__text">*Champs obligatoire</p>
            <p class="container__text">Renseigner votre adresse email et validez pour recevoir un lien de réinitialisation du mot de passe.</p>
            <form action="sendMailPwd.php" class="form" method="post">
                <div class="form__container form__container--center">
                    <div class="form__field">
                        <label for="mail" class="form__label">Email*</label>
                        <input type="email" name='mail' class="form__input" required>
                    </div>
                    <input type="submit" class="btn btn--secondary" value="Envoyer le lien"></input>
                </div>   
            </form>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 