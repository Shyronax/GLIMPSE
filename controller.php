<?php
session_start();

require "model_blog.php";

if (isset($_SESSION["login"])) {
    verifyAdmin($_SESSION["login"]);
    verifyConnexion($_SESSION["login"]);
};

if (isset($_GET["page"])) {
    switch ($_GET["page"]) {
        case "home":
            // $_SESSION["url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            include "view/view-home.php";
            break;
        case "booking1":
            // $_SESSION["url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            include "view/view-booking1.php";
            break;
        case "booking2":
            // $_SESSION["url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            include "view/view-booking2.php";
            break;
        case "booking3":
            // $_SESSION["url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            include "view/view-booking3.php";
            break;
        case "booking4":
            // $_SESSION["url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            include "view/view-booking4.php";
            break;
        case "inscription":
            include "view/view-inscription.php";
            break;
        case "connection":
            include "view/view-connection.php";
            break;
        case "account":
            include "view/view-account.php";
            break;
        case "about":
            include "view/view-about.php";
            break;
    }
};

?>