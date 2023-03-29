<?php
require_once 'model.php';
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
    <title>Billet</title>
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
        }
        main {
            background-color: #FAEFE4;
            padding: 20px;
            position: relative;
        }
        .qr {
            position: absolute;
            width: 10rem;
            right: 10%;
            top: 5%;
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
        <h1>Billet</h1>
    </div>
    <main>
        <div>
            <p><span class="bold">Numéro du billet</span> : #'.$ticket['id_ticket'].'</p>
            <p><span class="bold">Au nom de</span> : '.$ticket['prenom_ticket'].' '.$ticket['nom_ticket'].'</p>
        </div>
        <img id="barcode" class="qr" src="https://barcodeapi.org/api/qr/'.$ticket['id_ticket'].'">
        <div>
            <h2>EXPOSITION</h2>
            <p>“Mille Culture, une Origine - Les Pueblos”</p>
        </div>
        <hr>
        <div>
            <h2>DATE & HEURE</h2>
            <p>Le <span class="bold">'.$ticket['jour_ticket'].'</span> à <span class="bold">'.$ticket['heure_ticket'].'</span></p>
        </div>
        <div>
            <h2>LIEU</h2>
            <p>IUT de Marne-la-Vallée - Université Gustave Eiffel <br>
                2, rue Albert Einstein <br>
                77420 Champs-sur-Marne <br>
                FRANCE</p>
        </div>
        <hr>
        <div>
            <h2>DETAILS DU BILLET</h2>
            <p>'.$ticket['nbplace_ticket'].' place(s)</p>
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