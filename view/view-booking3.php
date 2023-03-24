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
        <div class="container container--medium container--center">
            <a href="controller.php?page=booking2"><i class="fa-solid fa-arrow-left link-back"></i></a>
            <div>
                <h1 class="container__title">Billetterie</h1>
                <p class="container__subtitle">Récapitulatif (3/4)</p>
            </div>
            <p class="container__text text--center">Veuillez vérifier que votre réservation est correcte. <br>Sinon vous pouvez encore la modifier.</p>
            <div class="review-card">
                <div class="flex">
                    <i class="fa-solid fa-ticket"></i>
                    <h2 class="review-card__title">Réservation</h2>
                </div>
                <ul class="list--none">
                    <li><span class="text--bold">Date :</span> le 11 avril 2023 de 8h30 à 10h30</li>
                    <li><span class="text--bold">Nombre de places :</span> 5 places</li>
                    <i><span class="text--bold">Total :</span> 12€</i>
                </ul>
            </div>  
            <p class="container__text text--center">Vous recevrez d'ici quelques minutes, votre billet à l'adresse mail que vous avez renseigné. <br>
            Vous pourrez également le télécharger en PDF à la fin de votre réservation.</p>
            <a href="controller.php?page=booking4" class="btn btn--secondary">Finaliser ma réservation</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 