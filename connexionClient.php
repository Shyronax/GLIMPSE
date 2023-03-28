<?php
include('model.php');
if(loginClient($_POST['mail'], $_POST['mdp'])){
    header("Location: controller.php?page={$_SESSION['prev']}");
} else {
    header('Location: controller.php?page=connection&status=error');
}
?>