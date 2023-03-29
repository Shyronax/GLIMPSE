<?php
include('model.php');
if($_SESSION['id'] === $_POST['id']){
    deleteClient($_POST['id']);
    header('Location: controller.php?page=home&status=deleted');
}