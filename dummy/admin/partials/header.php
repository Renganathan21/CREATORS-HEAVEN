<?php
require '../partials/header.php';
//fetch current user from db
if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_url . 'signin.php');
    die();
}
?>


