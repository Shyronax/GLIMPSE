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
        include "src/element/nav.php";
    ?>
    <main>
        <div class="container">
            <h1 class="container__title">Bienvenue <?=$client['prenom_utilisateur']?> !</h1>
            <div class="section">
                <h2 class="section__title">Informations personnelles</h2>
                <div>
                    <p class="section__text"><span class="text--bold">Adresse mail</span> : <?=$client['email_utilisateur']?></p>
                </div>
                <div class="section__buttons">
                    <a href="controller.php?page=changedata" class="btn btn--secondary">Modifier</a>
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
                        <?php foreach($tickets as $ticket){?>
                        <tr>
                            <th scope="row">#<?=$ticket["id_ticket"]?></th>
                            <td><?=$ticket["jour_ticket"]?></td>
                            <td><?=$ticket["heure_ticket"]?></td>
                            <td><?=$ticket["nbplace_ticket"]?></td>
                            <td>10€</td>
                        </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
                <h2 class="section__title">Mes réservations</h2>
                <?php foreach($tickets as $ticket){?>
                <div class="booking-card">
                    <h3 class="booking-card__title">Réservation #<?=$ticket["id_ticket"]?></h3>
                    <div>
                        <p class="booking-card__text">Date : <?=$ticket["jour_ticket"]?></p>
                        <p class="booking-card__text">Heure : <?=$ticket["heure_ticket"]?></p>
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
                <?php
                } ?>
            </div>
            <a href="logout.php" class="btn btn--secondary">Se déconnecter</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 