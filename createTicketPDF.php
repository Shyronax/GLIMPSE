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


$dompdf->render();