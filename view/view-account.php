<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "src/element/head.html";
    ?>
    <title>Mon compte - Mille Cultures, Une Origine</title>
</head>
<body>
    <?php 
        include "src/element/nav.html";
    ?>
    <main>
        <div class="container">
            <h1 class="container__title">Bienvenue Ponito !</h1>
            <div class="section">
                <h2 class="section__title">Informations personnelles</h2>
                <div>
                    <p class="section__text"><span class="text--bold">Login</span> : ddzd</p>
                    <p class="section__text"><span class="text--bold">Adresse mail</span> : dnjzdn</p>
                </div>
                <div class="section__buttons">
                    <a href="" class="btn btn--secondary">Modifier</a>
                    <a href="" class="btn btn--secondary">Supprimer mon compte</a>
                </div>
            </div>
            <div class="section">
                <table class="table">
                    <caption class="table__caption">Mes réservations</caption>
                    <thead class="table__header">
                        <tr class="table__row">
                            <th scope="col">Référence</th>
                            <th scope="col">Date</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Nombre de billet</th>
                            <th scope="col">Prix total</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        <tr>
                            <th scope="row">#001</th>
                            <td>31/03/2023</td>
                            <td>10h00</td>
                            <td>2</td>
                            <td>10€</td>
                        </tr>
                        <tr>
                            <th scope="row">#002</th>
                            <td>31/03/2023</td>
                            <td>10h00</td>
                            <td>2</td>
                            <td>10€</td>
                        </tr>
                    </tbody>
                </table>
                <h2 class="section__title">Mes réservations</h2>
                <div class="booking-card">
                    <h3 class="booking-card__title">Réservation #001</h3>
                    <div>
                        <p class="booking-card__text">Date : 30/04/23</p>
                        <p class="booking-card__text">Heure : 9h3à-10h30</p>
                    </div>
                    <div>
                        <p class="booking-card__text">Détails de la réservation : </p>
                        <ul class="booking-card__details">
                            <li class="booking-card__text">1 ticket plein tarifs (5€)</li>
                            <li class="booking-card__text">1 ticket moins de 26 ans (2€)</li>
                            <li class="booking-card__text">1 ticket moins de 10 ans (gratuit)</li>
                        </ul>
                    </div>
                </div>
                <div class="booking-card">
                    <h3 class="booking-card__title">Réservation #001</h3>
                    <p class="booking-card__text">Date : 30/04/23</p>
                    <p class="booking-card__text">Heure : 9h3à-10h30</p>
                    <ul class="booking-card__details">
                        <li class="booking-card__text">1 ticket plein tarifs (5€)</li>
                        <li class="booking-card__text">1 ticket moins de 26 ans (2€)</li>
                        <li class="booking-card__text">1 ticket moins de 10 ans (gratuit)</li>
                    </ul>
                </div>
            </div>
            <a href="" class="btn btn--secondary">Se déconnecter</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 