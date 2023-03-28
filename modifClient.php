<?php
include('model.php');
updateClient($_SESSION['id'],$_POST['login'], $_POST['mail']);
header("Location: controller.php?page=account");