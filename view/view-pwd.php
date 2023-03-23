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
            <h1 class="container__title">Bienvenue Ponito !</h1>
            <p class="container__text">*Champs obligatoire</p>
            <p class="container__text">Renseigner une adresse email et validez pour recevoir un lien de réinitialisation du mot de passe.</p>
            <form action="" class="form" method="post">
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