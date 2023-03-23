<?php
session_start();

// require "model_blog.php";

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
        case "exhibition":
            include "view/view-exhibition.php";
            break;
        case "visit":
            include "view/view-visit.php";
            break;
        case "about":
            include "view/view-about.php";
            break;
        case "inscription":
            include "view/view-inscription.php";
            break;
        case "connection":
            include "view/view-connection.php";
            break;
        case "pass":
            include "view/view-pwd.php";
            break;
        case "account":
            include "view/view-account.php";
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

        case "mentions":
            include "view/view-mentions.php";
            break;
        case "faq":
            include "view/view-faq.php";
            break;
        case "sitemap":
            include "view/view-sitemap.php";
            break;
        case "error403":
            include "view/view-error403.php";
            break;
        case "error404":
            include "view/view-error404.php";
            break;
    }
};

?>