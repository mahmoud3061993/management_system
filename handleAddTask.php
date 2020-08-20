<?php
include'classes.php';

if(!isset($_POST['emp_id']))
{ header ('Location: addTask.php?message=11');} else{$emp_id = $_POST['emp_id'] ;}
$task_name = $_POST['task_name'];
$desc = $_POST['desc'];
if(!isset($_POST['status']))
{ header ('Location: addTask.php?message=14');} else{$status = $_POST['status'] ;}
$deadline = $_POST['deadline'];

$addtask = new addTask($emp_id,$task_name,$desc,$status,$deadline);
$addtask->setTask();



    





?>