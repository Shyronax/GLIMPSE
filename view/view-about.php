<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Notre histoire - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.php";
        include "src/element/chatbot.html";
    ?>
    <main>
        <div class="main__banner">
            <img src="src/img/banner-about.jpg" alt="" class="main__banner-img">
        </div>
        <div class="main__header">
            <h1 class="main__title">Notre histoire</h1>
        </div>
        <div class="container container-info flex--start">
        <nav aria-label="Breadcrumb" class="breadcrumb">
            <ul class="breadcrumb__list">
                <li class="breadcrumb__list-item"><a href="controller.php?page=home" class="breadcrumb__list-item-link">Accueil</a></li>
                <li class="breadcrumb__list-item"><span aria-current="page">Notre histoire</span></li>
            </ul>
        </nav>
            <div class="main-container">
                <div class="section">
                    <div class="section__header">
                        <h2 class="section__title">Création de l'exposition</h2>
                    </div>
                    <p class="section__text">L'exposition “Mille Cultures, une Origine - Les Pueblos” a débuté son parcours en <span class="text--highlight">janvier 2023</span>, date à laquelle le département BUT MMI de l'IUT de Marne-la-Vallée (Université Gustave Eiffel - Champs-sur-Marne) a commandé l'exposition à l'agence <span class="text--highlight">glimpse</span>, un groupe de 7 étudiants MMI de deuxième année.</p>

                    <p class="section__text">Pour <span class="text--highlight">plus d'infos sur l'agence</span>, visitez le <a href="https://glimpse.but-mmi-champs.fr/" class="section__link" target="_blank">site de glimpse</a>.</p>
                </div>
                <div class="section">
                    <div class="section__header">
                        <h2 class="section__title">L'équipe glimpse</h2>
                    </div>
                    <div class="section-gallery">
                        <div class="section-gallery__row">
                            <div class="section-gallery__col">
                                <img src="src/img/member/valerie-lapeyre.jpg" alt="" class="section-gallery__col-img">
                                <p class="section-gallery__col-name">Valérie LAPEYRE</p>
                                <p class="section-gallery__col-text">Développeuse back</p>
                            </div>
                            <div class="section-gallery__col">
                                <img src="src/img/member/clara-many.jpg" alt="" class="section-gallery__col-img">
                                <p class="section-gallery__col-name">Clara MANY</p>
                                <p class="section-gallery__col-text">Cheffe de projet, développeuse front-end, & UX designer</p>
                            </div>
                            <div class="section-gallery__col">
                                <img src="src/img/member/samuel-enriquez.jpg" alt="" class="section-gallery__col-img">
                                <p class="section-gallery__col-name">Samuel ENRIQUEZ-SARANO</p>
                                <p class="section-gallery__col-text">Développeur front-end & UX designer</p>
                            </div>
                            <div class="section-gallery__col">
                                <img src="src/img/member/oscar-poisson.jpg" alt="" class="section-gallery__col-img">
                                <p class="section-gallery__col-name">Oscar POISSON</p>
                                <p class="section-gallery__col-text">Développeur full-stack</p>
                            </div>
                        </div>
                        <div class="section-gallery__row">
                            <div class="section-gallery__col">
                                <img src="src/img/member/yanis-choucha.jpg" alt="" class="section-gallery__col-img">
                                <p class="section-gallery__col-name">Yanis CHOUCHA</p>
                                <p class="section-gallery__col-text">Graphiste, vidéaste & sound designer</p>
                            </div>
                            <div class="section-gallery__col">
                                <img src="src/img/member/samuel-miguel.jpg" alt="" class="section-gallery__col-img">
                                <p class="section-gallery__col-name">Samuel MIGUEL</p>
                                <p class="section-gallery__col-text">Graphiste, UI designer & vidéaste</p>
                            </div>
                            <div class="section-gallery__col">
                                <img src="src/img/member/timothe-bureau.jpg" alt="" class="section-gallery__col-img">
                                <p class="section-gallery__col-name">Timothé BUREAU</p>
                                <p class="section-gallery__col-text">Chef de projet, directeur artistique, illustrateur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 