<?php

if(isset($_POST['changepwd-submit'])){
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['mdp'];
    $pwdConf = $_POST['mdp-conf'];

    if(empty($pwd) || empty($pwdConf)){
        header("Location: index.php?page=pwdchange&selector=".$selector."&validator=".$validator."&err=emptypwd");
        die();
    } elseif($pwd != $pwdConf){
        header("Location: index.php?page=pwdchange&selector=".$selector."&validator=".$validator."&err=pwdnotmatch");
        die();
    }

    $date = date("U");
    require "model.php";

} else {
    header("Location: index.php");
}