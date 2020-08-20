<?php

include'classes.php';

$emp_id = $_POST['emp_id'];
$task_name = $_POST['taskname'];
$task_id= $_POST['task_id'];
$desc = $_POST['desc'];
$status = $_POST['status'];
$deadline = $_POST['deadline'];

if(empty($task_name)){
    header('location:editTask.php?message=50&task_id='.$_POST['task_id'].'');
}
elseif(empty($desc)){
    header('location:editTask.php?message=60&task_id='.$_POST['task_id'].'');
}
else{
$update = new updateTask($emp_id,$task_name,$desc,$status,$deadline,$task_id);
$update->update();}





?>