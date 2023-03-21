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
            <div>
                <h1 class="container__title">Billetterie</h1>
                <p class="container__subtitle">Choix de réservation (1/4)</p>
            </div>
            <p class="container__text text--center">Veuillez choisir une date de visite pour l'exposition.</p>
            <p class="container__text text--center">L'exposition commence le <span class="text--bold">26 mars</span> et se termine le <span class="text--bold">26 juillet</span>. Le bâtiment où se trouve l'exposition est ouvert au public du <span class="text--bold">lundi au vendredi</span> de <span class="text--bold">8h00 à 18h00</span>.</p>
            <p class="container__text text--center">Vous ne pouvez réserver que <span class="text--bold">10 places au maximum</span> par commande. Si vous souhaitez davantage de place pour un groupe, veuillez nous contacter par mail (<a href="mailto:milleculturesuneorigine@gmail.com" class="container__link">milleculturesuneorigine@gmail.com</a>) ou par téléphone (<a href="tel:0160958585" class="container__link">+33 (0)1 60 95 85 85</a>).</p>
            <form action="" class="form" method="post">
                <div class="form__container">
                    <div class="form__container-date">
                        <div class="form__field">
                            <label for="date" class="form__label">Date</label>
                            <input type="date" name='date' value="2023-03-20"  min="2023-03-26" max="2023-07-26"class="form__input" required>
                        </div>
                        <div class="form__field">
                            <label for="time" class="form__label">Heure</label>

                            <input list="times" type="time" name="time" min="08:00" max="17:00" value="10:00" step="3600" class="form__input" required>

                            <datalist id="times">
                                <option value="08:00:00">
                                <option value="09:00:00">
                                <option value="10:00:00">
                                <option value="11:00:00">
                                <option value="12:00:00">
                                <option value="13:00:00">
                                <option value="14:00:00">
                                <option value="15:00:00">
                                <option value="16:00:00">
                                <option value="17:00:00">
                            </datalist>


                        </div>
                    </div>
                    <div class="form__container-ticket">
                        <h2 class="form__container-ticket-title">Places</h2>
                        <div class="form__field">
                            <label for="price1" class="form__label">Plein tarif (5€)</label>
                            <input type="number" name='price1' class="form__input" min="0" max="10" value="0" required>
                        </div>
                        <div class="form__field">
                            <label for="price2" class="form__label">Moins de 26 ans (2€)</label>
                            <input type="number" name='price2' class="form__input" min="0" max="10" value="0" required>
                        </div>
                        <div class="form__field">
                            <label for="price3" class="form__label">Enfant de - 10ans (gratuit)</label>
                            <input type="number" name='price3' class="form__input" min="0" max="10" value="0" required>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn--secondary" value="Confirmer">
            </form>
            <a href="" class="btn btn--secondary">Confirmer</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 