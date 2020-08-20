<?php


include 'conn.php';

// sql to delete a record
$sql = "UPDATE tasks SET status = 'in process' WHERE task_id = '".$_GET["task_id"]."' ";

if ($mysqli->query($sql) === TRUE) {
  header ('Location: myTasks.php');
} else {
  echo "Error deleting record: " . $conn->error;
}




?>