<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Réinitialisation du mot de passe - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.html";
    ?>
    <main>
        <?php
        if(isset($_GET["err"]) && $_GET["err"] != ""){
            if($_GET["err"] == "emptypwd" ){
                echo "<div class='error'>Veuillez remplir les champs obligatoires.</div>";
            } elseif($_GET["err"] == "pwdnotmatch"){
                echo "<div class='error'>Les mots de passe ne correspondent pas.</div>";
            }
        }
        ?>
        <div class="container">
            <h1 class="container__title">Réinitialisation du mot de passe</h1>
            <p class="container__text">*Champs obligatoire</p>
            <p class="container__text">Renseigner votre nouveau mot de passe.</p>
            <form action="changePwd.php" class="form" method="post">
                <input type="hidden" name="selector" value="<?=$selector?>">
                <input type="hidden" name="validator" value="<?=$validator?>">
                <div class="form__container form__container--center">
                <div class="form__field">
                        <label for="mdp" class="form__label">Nouveau mot de passe*</label>
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
                    <input type="submit" name="changepwd-submit" class="btn btn--secondary" value="Envoyer le lien"></input>
                </div>   
            </form>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 