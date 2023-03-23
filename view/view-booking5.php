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
            <a href="controller.php?page=booking4"><i class="fa-solid fa-arrow-left link-back"></i></a>
            <div>
                <h1 class="container__title">Billetterie</h1>
            </div>
            <p class="container__text text--center">Votre <span class="text--bold">réservation</span> a bien été <span class="text--bold">enregistrée</span> ! <br>
            Votre billet vous a été envoyé à cette adresse <span class="text--bold">monemail@gmail.com</span>. <br>
            Vous pouvez également télécharger votre billet en cliquant sur le bouton ci-dessous.</p>
            <a href="" class="btn btn--secondary">Télécharger mon billet en PDF</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 