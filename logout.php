<?php
include('model.php');
session_destroy();
header('Location: controller.php?page=home');
?>