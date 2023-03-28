<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Visiter - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.php";
        include "src/element/chatbot.html";
    ?>
    <main>
        <div class="main__banner">
            <img src="src/img/banner-visit.jpg" alt="" class="main__banner-img">
        </div>
        <div class="main__header">
            <h1 class="main__title">Visiter</h1>
        </div>
        <div class="container flex--start">
        <nav aria-label="Breadcrumb" class="breadcrumb">
            <ul class="breadcrumb__list">
                <li class="breadcrumb__list-item"><a href="controller.php?page=home" class="breadcrumb__list-item-link">Accueil</a></li>
                <li class="breadcrumb__list-item"><span aria-current="page">Visiter</span></li>
            </ul>
        </nav>
            <div class="flex">
                <div class="main-container">
                    <div class="section">
                        <div class="section__header">
                            <h2 class="section__title">Réservation</h2>
                        </div>
                        <p class="section__text">Pour accéder à l'exposition, la <span class="text--bold">réservation en ligne est obligatoire</span>.</p>
                        <a href="controller.php?page=booking1" class="btn btn--secondary">
                            <p class="text--bold">Réserver</p>
                            <!-- <i class="fa-solid fa-arrow-right btn__icon"></i> -->
                        </a>
                    </div>
                    <div class="section">
                        <div class="section__header">
                            <h2 class="section__title">Horaires et accès</h2>
                        </div>
                        <p class="section__text text--bold">L'IUT est ouvert du lundi au vendredi, de 8h à 18h. Fermeture durant les jours fériés.</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1153.0237163742015!2d2.5843720477426624!3d48.83721962462024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e60e33dd9a3fdd%3A0x7e5ced48ab7fc8df!2sIUT%20de%20Marne-la-Vall%C3%A9e%20-%20Universit%C3%A9%20Gustave%20Eiffel!5e0!3m2!1sfr!2sfr!4v1679320145226!5m2!1sfr!2sfr" width="700" height="470" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <p class="section__text text--bold">IUT de Marne-la-Vallée - Université Gustave Eiffel</p>
                        <p class="section__text">2, rue Albert Einstein <br>
                        77420 Champs-sur-Marne</p>
                        <div>
                            <p class="section__text text--bold">Entrées possibles :</p>
                            <ul class="section__list">
                                <li class="section__list-item">via la porte principale (en face du rond-point)</li>
                                <li class="section__list-item">via le parking (accessible à l'adresse de l'IUT)</li>
                            </ul>
                        </div>
                        <p class="section__text text--bold">! Pensez à vous munir de votre réservation (imprimée ou numérique) afin de la présenter à l'accueil.</p>
                    </div>
                    <div class="section">
                        <div class="section__header">
                            <h2 class="section__title">Règlement intérieur</h2>
                        </div>
                        <div>
                            <p class="section__text text--bold">Interdits</p>
                            <ul class="section__list">
                                <li class="section__list-item">Fumer ou vapoter au sein de l'établissement dans son entièreté</li>
                                <li class="section__list-item">Être sous état d'ivresse ou sous l'emprise de stupéfiants au sein de l'établissement</li>
                                <li class="section__list-item">Manger ou boire au sein de l'espace d'exposition sauf en cas d'urgence (problèmes de santé : hypoglycémie, etc.). Il est possible de se nourrir dans le reste de l'établissement qui propose une cafétéria, des fontaines à eau, ainsi que des distributeurs à café et snack.</li>
                                <li class="section__list-item">Amener des animaux de compagnie dans l'entièreté de l'établissement</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="deco-container">
                    <img src="src/img/drawing/symbols-direction.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 