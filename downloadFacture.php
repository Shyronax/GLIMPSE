<?php
include('model.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$ticket = getOneById($_GET['id'], 'ticket');

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('chroot', './');
$dompdf = new Dompdf($options);

$dompdf->loadHtml('<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Megrim&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Facture</title>
    <style>
        body {
            position: relative; 
            padding: 50px 35px 0 35px;
            background-color: #75251A;
            font-family: "Montserrat", sans-serif;
            margin: 0;
        }

        .header {
            background-color: #420F10; 
            padding: 2rem;
            margin: 0;
            position: relative;
        }

        h1 {
            font-family: "Megrim"; 
            font-size: 2rem;
            color: #FAEFE4;
            text-transform: uppercase;
            position: absolute;
            left: 12%;
            top: 1rem;
        }

        h2 {
            margin: 0.5rem 0;
            text-transform: uppercase;
        }

        main {
            background-color: #FAEFE4;
            padding: 30px 70px;
            position: relative;
        }

        a {
            color: black;
        }

        hr {
            background-color: #E5BA63;
            height: 5px;
        }

        div {
            margin: 2rem 0;
        }

        p {
            margin: 0.5rem 0;
        }

        footer {
            background-color: #420F10;
            padding: 30px;
        }

        footer p {
            text-align: center;
            color: #FAEFE4;
        }

        footer p a {
            color: #FAEFE4;
        }

        .bold {
            font-weight: 700;
        }

    </style>
</head>
<body>
    <div class="header">
        <img src="src/img/logoTicket.png" alt="">
        <h1>Facture</h1>
    </div>
    <main>
        <div>
            <p><span class="bold">Numéro de la facture</span> : #'.$ticket['id_ticket'].'</p>
            <h2>Coordonnées</h2>
            <p><span class="bold">Nom :</span> '.$ticket['nom_ticket'].'</p>
            <p><span class="bold">Prénom :</span> '.$ticket['prenom_ticket'].'</p>
            <p><span class="bold">Mail :</span> '.$_SESSION['mail'].'</p>
        </div>
        <hr>
        <div>
            <h2>Réservation</h2>
            <p><span class="bold">Exposition : </span>“Mille Culture, une Origine - Les Pueblos”</p>
            <p><span class="bold">Date & heure : </span>Le <span class="bold">'.$ticket['jour_ticket'].'</span> à <span class="bold">'.$ticket['heure_ticket'].'</span></p>
            <p><span class="bold">Nombre de places : </span> '.$ticket['nbplace_ticket'].' place(s).</p>
        </div>
        <hr>
        <div>
            <h2>Prix</h2>
            <p>(Toutes les taxes sont comprises dans le prix)</p>
        </div>
        <hr>
        <div>
            <h2>Informations complémentaires</h2>
            <p>Paiement effectué par <span class="bold">carte bancaire</span></p>
            <br>
            <p>Si vous souhaitez consulter les conditions de vente, nous vous invitons à consulter notre site : <a href="https://milleculturesuneorigine.but-mmi-champs.fr/">Mille Cultures, Une Origine</a></p>
        </div>
    </main>
    <footer>
        <p>glimpse</p>
        <p><a href="mailto:milleculturesuneorigine@gmail.com">milleculturesuneorigine@gmail.com</a></p>
        <p><a href="tel:0160958585">01 60 95 85 85</a></p>
    </footer>
</body>
</html>');
$dompdf->render();
$dompdf->stream(); 
?>