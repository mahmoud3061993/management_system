<?php
include('conn.php');

$emp_id = $_POST['emp_id'];
$task_id = $_POST['task_id'];


$Query="UPDATE tasks SET emp_id = '$emp_id' WHERE task_id = $task_id ";

if(mysqli_query($mysqli, $Query) === true){
    header('Location: allTasks.php');
} else{
    echo "ERROR: Could not able to execute $Query. " . mysqli_error($mysqli);
}



// Close connection
mysqli_close($mysqli);



    





?>