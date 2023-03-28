<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <script src="form.js" defer></script>
    <title>Réservation - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.php";
    ?>
    <main>
        <div class="container container--small container--center">
            <div>
            <?php
            if (isset($_GET['status'])){
                if($_GET['status'] == "error"){
                    echo("<div class='form__message--error'>Une erreur inattendue est survenue. Veuillez réessayez ultérieurement.</div>");
                }
            }
            ?>
                <h1 class="container__title">Billetterie</h1>
                <p class="container__subtitle">Choix de réservation (1/3)</p>
            </div>
            <p class="container__text text--center">Veuillez choisir une date de visite pour l'exposition.</p>
            <p class="container__text text--center">L'exposition commence le <span class="text--bold">26 mars</span> et se termine le <span class="text--bold">26 juillet</span>. Le bâtiment où se trouve l'exposition est ouvert au public du <span class="text--bold">lundi au vendredi</span> de <span class="text--bold">8h00 à 18h00</span>.</p>
            <p class="container__text text--center">Vous ne pouvez réserver que <span class="text--bold">10 places au maximum</span> par commande. Si vous souhaitez davantage de place pour un groupe, veuillez nous contacter par mail (<a href="mailto:milleculturesuneorigine@gmail.com" class="container__link">milleculturesuneorigine@gmail.com</a>) ou par téléphone (<a href="tel:0160958585" class="container__link">+33 (0)1 60 95 85 85</a>).</p>
            <form action="controller.php?page=booking3" class="form" method="post">
                <div class="form__container-slider">
                    <div class="form__container-sliderwindow">
                        <div class="form__container-date">
                        <h2 class="form__container-ticket-title">Date</h2>
                            <div class="form__field">
                                <label for="date" class="form__label">Date</label>
                                <input type="date" name='date' <?php if(isset($_SESSION['date'])){echo("value={$_SESSION['date']}");}?>  min="2023-03-31" max="2023-06-25"class="form__input" id="date" required>
                            </div>
                            <div class="form__field">
                                <label for="heure" class="form__label">Heure</label>

                                <input list="times" type="time" name="heure" min="10:00" max="17:00" step="3600" class="form__input" id="heure" required>

                                <datalist id="times">
                                    <option value="10:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="10:00"){echo("selected");}}?>>
                                    <option value="11:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="11:00"){echo("selected");}}?>>
                                    <option value="12:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="12:00"){echo("selected");}}?>>
                                    <option value="13:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="13:00"){echo("selected");}}?>>
                                    <option value="14:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="14:00"){echo("selected");}}?>>
                                    <option value="15:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="15:00"){echo("selected");}}?>>
                                    <option value="16:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="16:00"){echo("selected");}}?>>
                                    <option value="17:00:00" <?php if(isset($_SESSION['heure'])){if($_SESSION['heure']="17:00"){echo("selected");}}?>>
                                </datalist>


                            </div>
                        </div>
                        <div class="form__container-ticket">
                            <h2 class="form__container-ticket-title">Places</h2>
                            <div class="form__field">
                                <label for="price1" class="form__label">Plein tarif (5€)</label>
                                <input type="number" <?php if(isset($_SESSION['price1'])){echo("value={$_SESSION['price1']}");}?> name='price1' class="form__input" min="0" max="10" value="0" id="price1" required>
                            </div>
                            <div class="form__field">
                                <label for="price2" class="form__label">Moins de 26 ans (2€)</label>
                                <input type="number" <?php if(isset($_SESSION['price2'])){echo("value={$_SESSION['price2']}");}?> name='price2' class="form__input" min="0" max="10" value="0" id="price2" required>
                            </div>
                            <div class="form__field">
                                <label for="price3" class="form__label">Enfant de - 10ans (gratuit)</label>
                                <input type="number" <?php if(isset($_SESSION['price3'])){echo("value={$_SESSION['price3']}");}?> name='price3' class="form__input" min="0" max="10" value="0" id="price3" required>
                            </div>
                        </div>
                        <div class="form__container">
                        <h2 class="form__container-ticket-title">Informations personnelles</h2>
                            <div class="form__field">
                                <label for="nom" class="form__label">Nom*</label>
                                <input <?php if(isset($_SESSION['nom'])){echo("value={$_SESSION['nom']}");}?> type="text" name='nom' class="form__input" id="nom" required>
                            </div>
                            <div class="form__field">
                                <label for="prenom" class="form__label">Prénom*</label>
                                <input <?php if(isset($_SESSION['prenom'])){echo("value={$_SESSION['prenom']}");}?> type="text" name='prenom' class="form__input" id="prenom" required>
                            </div>
                            <div class="form__field">
                                <label for="mail" class="form__label">Email*</label>
                                <input <?php if(isset($_SESSION['mail'])){echo("value={$_SESSION['mail']}");}?> type="email" name='mail' class="form__input" id="mail" required>
                            </div>
                            <div class="form__field">
                                <label for="mail-conf" class="form__label">Confirmation mail*</label>
                                <input <?php if(isset($_SESSION['mail'])){echo("value={$_SESSION['mail']}");}?> type="email"  name='mail-conf' class="form__input" id="mail-conf" required>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <a class="btn btn--secondary btn--retour">Retour</a>    
            <a class="btn btn--secondary btn--confirmer">Confirmer</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 