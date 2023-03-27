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
            <a href="controller.php?page=booking3"><i class="fa-solid fa-arrow-left link-back"></i></a>
            <div>
                <h1 class="container__title">Billetterie</h1>
                <p class="container__subtitle">Paiement (3/3)</p>
            </div>
            <p class="container__text text--bold text--center">Attention, avant de procéder à votre paiement, nous vous informons que les tickets ne sont ni remboursables, ni échangeables, ni modifiables.</p>
            <p class="container__text text--center">
            Le paiement s'effectue via carte bancaire.</p>
            <a href="" class="btn btn--secondary">Réserver</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 