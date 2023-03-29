<?php
include('model.php');
if($_SESSION['id'] === $_GET['id']){
    deleteClient($_GET['id']);
    session_destroy();
    header('Location: controller.php?page=home&status=deleted');
}