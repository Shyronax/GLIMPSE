<?php

if(isset($_POST['changepwd-submit'])){
    $selector = $_POST['selector'];
    $token = $_POST['token'];
    $pwd = $_POST['mdp'];
    $pwdConf = $_POST['mdp-conf'];
    $date = date("U");
    
    if($pwd === $pwdConf){
        require "model.php";
        reinitMdp($selector,$date,$token,$pwd);
    } elseif(empty($pwd) || empty($pwdConf)){
        header("Location: controller.php?page=pwdchangeform&selector=".$selector."&token=".$token."&err=emptypwd");
    } else {
        header("Location: controller.php?page=pwdchangeform&selector=".$selector."&token=".$token."&err=pwdnotmatch");
        die();
    }

} else {
    header("Location: controller.php?page=pwdreinit");
}