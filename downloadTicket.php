<?php
include('model.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml("<html>
<head>
    <title>
        BILLET_{$_SESSION['nom']}_{$_SESSION['prenom']}_{$_SESSION['date']}_{$_SESSION['heure']}
    </title>
</head>
<body>
    <h1>Mille Cultures, Une Origine</h1>
    <div>Billet pour {$_SESSION['nom']}</div>
</body>
</html>");
$dompdf->render();
$dompdf->stream(); 
?>