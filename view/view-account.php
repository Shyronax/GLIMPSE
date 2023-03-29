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
                    <a href="selfDeleteClient.php?id=<?=$_SESSION['id']?>" class="btn btn--quaternary">Supprimer mon compte</a>
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
                            <th scope="col">Nombre de billets</th>
                            <th scope="col">Facture</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        <?php foreach($tickets as $ticket){ ?>
                        <tr class="table__row">
                            <th data-label="Référence" scope='row'>#<?=$ticket['id_ticket']?></th>
                            <td data-label="Date" class="table__cell"><?=$ticket['jour_ticket']?></td>
                            <td data-label="Heure" class="table__cell"><?=$ticket['heure_ticket']?></td>
                            <td data-label="Nombre de billets" class="table__cell"><?=$ticket['nbplace_ticket']?></td>
                            <td data-label="Facture" class="table__cell">
                                <a href="downloadFacture?id=<?=$ticket['id_ticket']?>" class="table__link">Télécharger la facture (PDF)</a>
                            </td>
                        </tr class="table__row">
                        <?php
                    } ?>
                    </tbody>
                </table>
            </div>
            <a href="logout.php" class="btn btn--tertiary">Se déconnecter</a>    
        </div>
    </main>
    <?php 
        include "src/element/footer.html";
    ?>
</body>
</html> 