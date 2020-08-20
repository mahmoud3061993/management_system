<?php
session_start();
include 'classes.php';

$email = $_POST['email'];
$password = $_POST['password'];

$login = new login($email,$password);
$login->adminLogin();
?>