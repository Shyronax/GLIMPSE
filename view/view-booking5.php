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
            <div>
                <h1 class="container__title">Confirmation de la réservation</h1>
            </div>
            <p class="container__text text--center">Votre <span class="text--bold">réservation</span> a bien été <span class="text--bold">enregistrée</span> ! </p>
            <h2 class="container__subtitle">Récapitulatif de la commande</h2>
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
            <p class="container__text">Votre billet vous a été envoyé à cette adresse <span class="text--bold">monemail@gmail.com</span>. <br>
            Vous pouvez également télécharger votre billet en cliquant sur le bouton ci-dessous.</p>
            <a href="" class="btn btn--secondary">Télécharger mon billet en PDF</a>   
            <a href="controller.php?page=home" class="container__link">Retourner à l'accueil</a>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 