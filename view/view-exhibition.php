<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
        include "src/element/chatbot.html";
    ?>
    <title>Exposition - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.php";
    ?>
    <main>
        <div class="main__banner">
            <img src="src/img/img-hero.jpg" alt="" class="main__banner-img">
        </div>
        <div class="main__header">
            <h1 class="main__title">L'exposition</h1>
        </div>
        <div class="container flex--start">
        <nav aria-label="Breadcrumb" class="breadcrumb">
            <ul class="breadcrumb__list">
                <li class="breadcrumb__list-item"><a href="controller.php?page=home" class="breadcrumb__list-item-link">Accueil</a></li>
                <li class="breadcrumb__list-item"><span aria-current="page">Exposition</span></li>
            </ul>
        </nav>
            <div class="flex">
                <div class="main-container">
                    <div class="section">
                        <p class="section__text text--bold">Épisode de la série « Mille Cultures, une Origine », l'exposition “Les Pueblos” a pour objectif de <span class="text--highlight">démystifier les origines amérindiennes</span>.</p>
                        <p class="section__text">Cette exposition est une présentation de l'histoire fascinante, de la culture et de la vie quotidienne des peuples Pueblos amérindiens qui habitent les villages traditionnels du Sud-Ouest des États-Unis.</p>
                        <iframe src="https://www.youtube.com/embed/Pm5RqJt3seU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="card__video"></iframe>
                        <p class="section__text">Vous serez plongé dans une immersion complète de l'univers des Pueblos, mettant en lumière leur riche patrimoine culturel, leur artisanat renommé, leur architecture unique, leur agriculture durable et leur spiritualité profonde. Des artefacts et des objets d'art exceptionnels vous permettront d'explorer leurs traditions artistiques, notamment leurs célèbres poteries, tissages et bijoux.</p>
                        <p class="section__text">Nous espérons que cette exposition vous offrira un aperçu authentique de la culture et de l'histoire des Pueblos, et qu'elle vous inspirera à en apprendre davantage sur ces communautés !</p>
                    </div>
                    <div class="section">
                        <div class="section__header">
                            <h2 class="section__title">Plan du parcours</h2>
                        </div>
                        <p class="section__text">Vous trouverez ci-dessous le plan du parcours de l'exposition qui n'attend que vous !</p>
                        <img src="src/img/plan-expo-fr.png" alt="">
                    </div>
                    <div class="section">
                        <div class="section__header">
                            <h2 class="section__title">Dispositif interactif</h2>
                        </div>
                        <p class="section__text text--bold">Au moyen d'une tablette tactile, et guidés par nos mascottes Ponito et Kohana, vous aurez l'occasion durant l'exposition de dessiner des symboles de la culture Pueblos et de découvrir ce qu'ils représentent.</p>
                        <p class="section__text"></p>
                        <iframe src="https://www.youtube.com/embed/qe-pbJm3T-Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="card__video"></iframe>
                        <p class="section__text">Ponito & Kohana doivent décorer le vase avec des symboles, mais ils ne s'en souviennent plus. Ils ont besoin de ton aide pour dessiner les symboles ! </p>

                        <p class="section__text">Pour cela, vous devrez relier les points entre eux dans le bon ordre afin de reconstituer les symboles que vous verrez durant l'exposition.</p>
                    </div>
                </div>
                <div class="deco-container">
                    <img src="src/img/drawing/symbols-sphere.png" alt="">
                    <img src="src/img/drawing/symbols-cup.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 