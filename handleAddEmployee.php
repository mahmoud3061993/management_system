<?php
include 'classes.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];




$insert = new addEmployee($name,$email,$password,$city,$gender,$phone,$birthday);
$insert->setInfo();




?>