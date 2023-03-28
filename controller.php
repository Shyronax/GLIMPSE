<?php
require "model.php";

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
        case "accountconf":
            include "view/view-accountconf.php";
            break;
        case "connection":
            include "view/view-connection.php";
            break;
        case "pwdreinit":
            include "view/view-pwdreinit.php";
            break;
        case "pwdchange":
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];
            if(empty($selector) || empty($validator)){
                header("Location: index.php?page=pwdreinit");
            } else {
                if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                    include "view/view-pwdchange.php";
                }
            }
            break;
        case "mailconf":
            include "view/view-mailconf.php";
            break;
        case "account":
            $client = getOneById($_SESSION["id"], "utilisateur");
            $tickets = getClientTickets($_SESSION["id"]);
            include "view/view-account.php";
            break;
        case "changedata":
            $client = getOneById($_SESSION["id"], "utilisateur");
            include "view/view-changedata.php";
            break;
        case "pwdreinit":
            include "view/view-pwdreinit.php";
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
        case "booking5":
            // $_SESSION["url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            include "view/view-booking5.php";
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