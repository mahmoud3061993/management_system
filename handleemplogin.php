<?php
session_start();
include 'classes.php';

$email = $_POST['email'];
$password = $_POST['password'];

$emplogin = new login($email,$password);
$emplogin->empLogin();

    





?>