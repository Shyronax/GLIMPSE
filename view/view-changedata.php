<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Modification des informations personnelles - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.php";
    ?>
    <main>
        <div class="container">
            <h1 class="container__title">Modification des informations personnelles</h1>
            <p class="container__text">*Champs obligatoire</p>
            <form action="" class="form" method="post">
                <div class="form__container form__container--center">
                    <div class="form__field">
                        <label for="mail" class="form__label">Email*</label>
                        <input type="email" name='mail' class="form__input" id="mail" required>
                    </div>
                    <input type="submit" class="btn btn--secondary" value="Enregistrer"></input>
                </div>   
            </form>
            <a href="controller.php?page=pwdreinit" class="container__link">Réinitialiser mon mot de passe</a>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 